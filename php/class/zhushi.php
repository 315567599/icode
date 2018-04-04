<?php
	/**
	 * Create an instance.
	 * @param mixed $value The user-supplied value
	 * @param CacheDependency|CacheDependency[] $deps A dependency or dependency
	 *   array. All dependencies must be objects implementing CacheDependency.
	 */
	function __construct( $value = false, $deps = array() ) {
		$this->value = $value;

		if ( !is_array( $deps ) ) {
			$deps = array( $deps );
		}

		$this->deps = $deps;
	}

	/**
	 * Attempt to get a value from the cache. If the value is expired or missing,
	 * it will be generated with the callback function (if present), and the newly
	 * calculated value will be stored to the cache in a wrapper.
	 *
	 * @param BagOStuff $cache A cache object such as $wgMemc
	 * @param string $key The cache key
	 * @param int $expiry The expiry timestamp or interval in seconds
	 * @param bool|callable $callback The callback for generating the value, or false
	 * @param array $callbackParams The function parameters for the callback
	 * @param array $deps The dependencies to store on a cache miss. Note: these
	 *    are not the dependencies used on a cache hit! Cache hits use the stored
	 *    dependency array.
	 *
	 * @return mixed The value, or null if it was not present in the cache and no
	 *    callback was defined.
	 */
	static function getValueFromCache( $cache, $key, $expiry = 0, $callback = false,
		$callbackParams = array(), $deps = array()
	) {
		$obj = $cache->get( $key );

		if ( is_object( $obj ) && $obj instanceof DependencyWrapper && !$obj->isExpired() ) {
			$value = $obj->value;
		} elseif ( $callback ) {
			$value = call_user_func_array( $callback, $callbackParams );
			# Cache the newly-generated value
			$wrapper = new DependencyWrapper( $value, $deps );
			$wrapper->storeToCache( $cache, $key, $expiry );
		} else {
			$value = null;
		}

		return $value;
	}

	/**
	 * @return bool
	 */
	function isExpired() {
		if ( !file_exists( $this->filename ) ) {
			if ( $this->timestamp === false ) {
				# Still nonexistent
				return false;
			} else {
				# Deleted
				wfDebug( "Dependency triggered: {$this->filename} deleted.\n" );

				return true;
			}
		} else {
			$lastmod = filemtime( $this->filename );
			if ( $lastmod > $this->timestamp ) {
				# Modified or created
				wfDebug( "Dependency triggered: {$this->filename} changed.\n" );

				return true;
			} else {
				# Not modified
				return false;
			}
		}
	}

	public function execute() {
		if ( $this->hasOption( "user" ) ) {
			$user = User::newFromName( $this->getOption( 'user' ) );
		} elseif ( $this->hasOption( "userid" ) ) {
			$user = User::newFromId( $this->getOption( 'userid' ) );
		} else {
			$this->error( "A \"user\" or \"userid\" must be set to change the password for", true );
		}
		if ( !$user || !$user->getId() ) {
			$this->error( "No such user: " . $this->getOption( 'user' ), true );
		}
		try {
			$user->setPassword( $this->getOption( 'password' ) );
			$user->saveSettings();
			$this->output( "Password set for " . $user->getName() . "\n" );
		} catch ( PasswordError $pwe ) {
			$this->error( $pwe->getText(), true );
		}
	}

}
?>

<?php

<?php
function foo()
{
    $numargs = func_num_args();
    echo "Number of arguments: $numargs<br />\n";
    if ($numargs >= 2) {
        echo "Second argument is: " . func_get_arg(1) . "<br />\n";
    }
    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
        echo "Argument $i is: " . $arg_list[$i] . "<br />\n";
    }
}

foo(1, 2, 3);
/**
以上例程会输出：

Number of arguments: 3<br />
Second argument is: 2<br />
Argument 0 is: 1<br />
Argument 1 is: 2<br />
Argument 2 is: 3<br />
 */

?>

<?php
function wfMemcKey( /*...*/ ) {
	global $wgCachePrefix;
	$prefix = $wgCachePrefix === false ? wfWikiID() : $wgCachePrefix;
	$args = func_get_args();
	$key = $prefix . ':' . implode( ':', $args );
	$key = str_replace( ' ', '_', $key );
	return $key;
}
?>
