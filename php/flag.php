<?php

/**@{
 * Database related constants
 */
define( 'DBO_DEBUG', 1 );
define( 'DBO_NOBUFFER', 2 );
define( 'DBO_IGNORE', 4 );
define( 'DBO_TRX', 8 ); // automatically start transaction on first query
define( 'DBO_DEFAULT', 16 );
define( 'DBO_PERSISTENT', 32 );
define( 'DBO_SYSDBA', 64 ); //for oracle maintenance
define( 'DBO_DDLMODE', 128 ); // when using schema files: mostly for Oracle
define( 'DBO_SSL', 256 );
define( 'DBO_COMPRESS', 512 );

		# If DBO_TRX is set, start a transaction
		if ( ( $this->mFlags & DBO_TRX ) && !$this->mTrxLevel &&
			$sql != 'BEGIN' && $sql != 'COMMIT' && $sql != 'ROLLBACK'
		) {
	/**
	 * Set a flag for this connection
	 *
	 * @param int $flag DBO_* constants from Defines.php:
	 *   - DBO_DEBUG: output some debug info (same as debug())
	 *   - DBO_NOBUFFER: don't buffer results (inverse of bufferResults())
	 *   - DBO_TRX: automatically start transactions
	 *   - DBO_DEFAULT: automatically sets DBO_TRX if not in command line mode
	 *       and removes it in command line mode
	 *   - DBO_PERSISTENT: use persistant database connection
	 */
	public function setFlag( $flag ) {
		global $wgDebugDBTransactions;
		$this->mFlags |= $flag;
		if ( ( $flag & DBO_TRX ) && $wgDebugDBTransactions ) {
			wfDebug( "Implicit transactions are now enabled.\n" );
		}
	}

	/**
	 * Clear a flag for this connection
	 *
	 * @param int $flag DBO_* constants from Defines.php:
	 *   - DBO_DEBUG: output some debug info (same as debug())
	 *   - DBO_NOBUFFER: don't buffer results (inverse of bufferResults())
	 *   - DBO_TRX: automatically start transactions
	 *   - DBO_DEFAULT: automatically sets DBO_TRX if not in command line mode
	 *       and removes it in command line mode
	 *   - DBO_PERSISTENT: use persistant database connection
	 */
	public function clearFlag( $flag ) {
		global $wgDebugDBTransactions;
		$this->mFlags &= ~$flag;
		if ( ( $flag & DBO_TRX ) && $wgDebugDBTransactions ) {
			wfDebug( "Implicit transactions are now disabled.\n" );
		}
	}

	/**
	 * Return a path to the DBMS-specific SQL file if it exists,
	 * otherwise default SQL file
	 *
	 * @param string $filename
	 * @return string
	 */
	private function getSqlFilePath( $filename ) {
		global $IP;
		$dbmsSpecificFilePath = "$IP/maintenance/" . $this->getType() . "/$filename";
		if ( file_exists( $dbmsSpecificFilePath ) ) {
			return $dbmsSpecificFilePath;
        } else {
            return "$IP/maintenance/$filename";
        }
    }


    return $this->getSqlFilePath( 'update-keys.sql' );


	/**
	 * Constructor.
	 *
	 * FIXME: It is possible to construct a Database object with no associated
	 * connection object, by specifying no parameters to __construct(). This
	 * feature is deprecated and should be removed.
	 *
	 * DatabaseBase subclasses should not be constructed directly in external
	 * code. DatabaseBase::factory() should be used instead.
	 *
	 * @param array $params Parameters passed from DatabaseBase::factory()
	 */
	function __construct( $params = null ) {
		global $wgDBprefix, $wgDBmwschema, $wgCommandLineMode, $wgDebugDBTransactions;

		$this->mTrxAtomicLevels = new SplStack;

		if ( is_array( $params ) ) { // MW 1.22
			$server = $params['host'];
			$user = $params['user'];
			$password = $params['password'];
			$dbName = $params['dbname'];
			$flags = $params['flags'];
			$tablePrefix = $params['tablePrefix'];
			$schema = $params['schema'];
			$foreign = $params['foreign'];
		} else { // legacy calling pattern
			wfDeprecated( __METHOD__ . " method called without parameter array.", "1.23" );
			$args = func_get_args();
			$server = isset( $args[0] ) ? $args[0] : false;
			$user = isset( $args[1] ) ? $args[1] : false;
			$password = isset( $args[2] ) ? $args[2] : false;
			$dbName = isset( $args[3] ) ? $args[3] : false;
			$flags = isset( $args[4] ) ? $args[4] : 0;
			$tablePrefix = isset( $args[5] ) ? $args[5] : 'get from global';
			$schema = 'get from global';
			$foreign = isset( $args[6] ) ? $args[6] : false;
        }
    }



    $class = 'Database' . ucfirst( strtolower( $dbType ) );


    $class = 'Database' . ucfirst( $driver );
    if ( class_exists( $class ) && is_subclass_of( $class, 'DatabaseBase' ) ) {
    }

			$error = preg_replace( '!\[<a.*</a>\]!', '', $this->mPHPError );
			$error = preg_replace( '!^.*?:\s?(.*)$!', '$1', $error );


	/**
	 * @param string $error Fallback error message, used if none is given by DB
	 * @throws DBConnectionError
	 */
	function reportConnectionError( $error = 'Unknown error' ) {
		$myError = $this->lastError();
		if ( $myError ) {
			$error = $myError;
		}

        # New method
        throw new DBConnectionError( $this, $error );
    }


    $elapsed = round( microtime( true ) - $wgRequestTime, 3 );
