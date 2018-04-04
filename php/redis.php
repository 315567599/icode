<?php


/**
 * Helper class to handle automatically marking connectons as reusable (via RAII pattern)
 *
 * This class simply wraps the Redis class and can be used the same way
 *
 * @ingroup Redis
 * @since 1.21
 */
class RedisConnRef {
	/** @var RedisConnectionPool */
	protected $pool;
	/** @var Redis */
	protected $conn;

	protected $server; // string
	protected $lastError; // string

	/**
	 * @param RedisConnectionPool $pool
	 * @param string $server
	 * @param Redis $conn
	 */
	public function __construct( RedisConnectionPool $pool, $server, Redis $conn ) {
		$this->pool = $pool;
		$this->server = $server;
		$this->conn = $conn;
	}

	/**
	 * @return string
	 * @since 1.23
	 */
	public function getServer() {
		return $this->server;
	}

	public function getLastError() {
		return $this->lastError;
	}

	public function clearLastError() {
		$this->lastError = null;
	}

	public function __call( $name, $arguments ) {
		$conn = $this->conn; // convenience

		// Work around https://github.com/nicolasff/phpredis/issues/70
		$lname = strtolower( $name );
		if ( ( $lname === 'blpop' || $lname == 'brpop' )
			&& is_array( $arguments[0] ) && isset( $arguments[1] )
		) {
			$this->pool->resetTimeout( $conn, $arguments[1] + 1 );
		} elseif ( $lname === 'brpoplpush' && isset( $arguments[2] ) ) {
			$this->pool->resetTimeout( $conn, $arguments[2] + 1 );
		}

		$conn->clearLastError();
		try {
			$res = call_user_func_array( array( $conn, $name ), $arguments );
			if ( preg_match( '/^ERR operation not permitted\b/', $conn->getLastError() ) ) {
				$this->pool->reauthenticateConnection( $this->server, $conn );
				$conn->clearLastError();
				$res = call_user_func_array( array( $conn, $name ), $arguments );
				wfDebugLog( 'redis', "Used automatic re-authentication for method '$name'." );
			}
		} catch ( RedisException $e ) {
			$this->pool->resetTimeout( $conn ); // restore
			throw $e;
		}

		$this->lastError = $conn->getLastError() ?: $this->lastError;

		$this->pool->resetTimeout( $conn ); // restore

		return $res;
	}

	/**
	 * @param string $script
	 * @param array $params
	 * @param int $numKeys
	 * @return mixed
	 * @throws RedisException
	 */
	public function luaEval( $script, array $params, $numKeys ) {
		$sha1 = sha1( $script ); // 40 char hex
		$conn = $this->conn; // convenience
		$server = $this->server; // convenience

		// Try to run the server-side cached copy of the script
		$conn->clearLastError();
		$res = $conn->evalSha( $sha1, $params, $numKeys );
		// If we got a permission error reply that means that (a) we are not in
		// multi()/pipeline() and (b) some connection problem likely occurred. If
		// the password the client gave was just wrong, an exception should have
		// been thrown back in getConnection() previously.
		if ( preg_match( '/^ERR operation not permitted\b/', $conn->getLastError() ) ) {
			$this->pool->reauthenticateConnection( $server, $conn );
			$conn->clearLastError();
			$res = $conn->eval( $script, $params, $numKeys );
			wfDebugLog( 'redis', "Used automatic re-authentication for Lua script $sha1." );
		}
		// If the script is not in cache, use eval() to retry and cache it
		if ( preg_match( '/^NOSCRIPT/', $conn->getLastError() ) ) {
			$conn->clearLastError();
			$res = $conn->eval( $script, $params, $numKeys );
			wfDebugLog( 'redis', "Used eval() for Lua script $sha1." );
		}

		if ( $conn->getLastError() ) { // script bug?
			wfDebugLog( 'redis', "Lua script error on server $server: " . $conn->getLastError() );
		}

		$this->lastError = $conn->getLastError() ?: $this->lastError;

		return $res;
	}

	/**
	 * @param Redis $conn
	 * @return bool
	 */
	public function isConnIdentical( Redis $conn ) {
		return $this->conn === $conn;
	}

	function __destruct() {
		$this->pool->freeConnection( $this->server, $this->conn );
	}
}






	public function getConnection( $server ) {
		// Check the listing "dead" servers which have had a connection errors.
		// Servers are marked dead for a limited period of time, to
		// avoid excessive overhead from repeated connection timeouts.
		if ( isset( $this->downServers[$server] ) ) {
			$now = time();
			if ( $now > $this->downServers[$server] ) {
				// Dead time expired
				unset( $this->downServers[$server] );
			} else {
				// Server is dead
				wfDebug( "server $server is marked down for another " .
					( $this->downServers[$server] - $now ) . " seconds, can't get connection\n" );

				return false;
			}
		}

		// Check if a connection is already free for use
		if ( isset( $this->connections[$server] ) ) {
			foreach ( $this->connections[$server] as &$connection ) {
				if ( $connection['free'] ) {
					$connection['free'] = false;
					--$this->idlePoolSize;

					return new RedisConnRef( $this, $server, $connection['conn'] );
				}
			}
		}

		if ( substr( $server, 0, 1 ) === '/' ) {
			// UNIX domain socket
			// These are required by the redis extension to start with a slash, but
			// we still need to set the port to a special value to make it work.
			$host = $server;
			$port = 0;
		} else {
			// TCP connection
			$hostPort = IP::splitHostAndPort( $server );
			if ( !$hostPort ) {
				throw new MWException( __CLASS__ . ": invalid configured server \"$server\"" );
			}
			list( $host, $port ) = $hostPort;
			if ( $port === false ) {
				$port = 6379;
			}
		}

		$conn = new Redis();
		try {
			if ( $this->persistent ) {
				$result = $conn->pconnect( $host, $port, $this->connectTimeout );
			} else {
				$result = $conn->connect( $host, $port, $this->connectTimeout );
			}
			if ( !$result ) {
				wfDebugLog( 'redis', "Could not connect to server $server" );
				// Mark server down for some time to avoid further timeouts
				$this->downServers[$server] = time() + self::SERVER_DOWN_TTL;

				return false;
			}
			if ( $this->password !== null ) {
				if ( !$conn->auth( $this->password ) ) {
					wfDebugLog( 'redis', "Authentication error connecting to $server" );
				}
			}
		} catch ( RedisException $e ) {
			$this->downServers[$server] = time() + self::SERVER_DOWN_TTL;
			wfDebugLog( 'redis', "Redis exception connecting to $server: " . $e->getMessage() );

			return false;
		}

		if ( $conn ) {
			$conn->setOption( Redis::OPT_READ_TIMEOUT, $this->readTimeout );
			$conn->setOption( Redis::OPT_SERIALIZER, $this->serializer );
			$this->connections[$server][] = array( 'conn' => $conn, 'free' => false );

			return new RedisConnRef( $this, $server, $conn );
		} else {
			return false;
		}
	}



	/**
	 * Get a Redis object with a connection suitable for fetching the specified key
	 * @param string $key
	 * @return array (server, RedisConnRef) or (false, false)
	 */
	protected function getConnection( $key ) {
		if ( count( $this->servers ) === 1 ) {
			$candidates = $this->servers;
		} else {
			$candidates = $this->servers;
			ArrayUtils::consistentHashSort( $candidates, $key, '/' );
			if ( !$this->automaticFailover ) {
				$candidates = array_slice( $candidates, 0, 1 );
			}
		}

		foreach ( $candidates as $server ) {
			$conn = $this->redisPool->getConnection( $server );
			if ( $conn ) {
				return array( $server, $conn );
			}
		}
		$this->setLastError( BagOStuff::ERR_UNREACHABLE );
		return array( false, false );
	}



