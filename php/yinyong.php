<?php

function &wfGetDB( $db, $groups = array(), $wiki = false ) {
	return wfGetLB( $wiki )->getConnection( $db, $groups, $wiki );
}

/**
 * Get a load balancer object.
 *
 * @param string|bool $wiki Wiki ID, or false for the current wiki
 * @return LoadBalancer
 */
function wfGetLB( $wiki = false ) {
	return wfGetLBFactory()->getMainLB( $wiki );
}

/**
 * Get the load balancer factory object
 *
 * @return LBFactory
 */
function &wfGetLBFactory() {
	return LBFactory::singleton();
}


/**
 * Recursively converts the parameter (an object) to an array with the same data
 *
 * @param object|array $objOrArray
 * @param bool $recursive
 * @return array
 */
function wfObjectToArray( $objOrArray, $recursive = true ) {
	$array = array();
	if ( is_object( $objOrArray ) ) {
		$objOrArray = get_object_vars( $objOrArray );
	}
	foreach ( $objOrArray as $key => $value ) {
		if ( $recursive && ( is_object( $value ) || is_array( $value ) ) ) {
			$value = wfObjectToArray( $value );
		}

		$array[$key] = $value;
	}

	return $array;
}


static function &singleton() {
    global $wgLBFactoryConf;

    if ( is_null( self::$instance ) ) {
        $class = self::getLBFactoryClass( $wgLBFactoryConf );

        self::$instance = new $class( $wgLBFactoryConf );
    }

    return self::$instance;
}



