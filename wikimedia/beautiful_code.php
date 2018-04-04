<?php

/**
 * Detemine if any master connection has pending changes.
 * @since 1.23
 * @return bool
 */
function hasMasterChanges() {
    $ret = false;
    $this->forEachLB( function ( $lb ) use ( &$ret ) {
        $ret = $ret || $lb->hasMasterChanges();
    } );
    return $ret;
}

function forEachLB( $callback, $params = array() ) {
    foreach ( $this->extLBs as $lb ) {
        call_user_func_array( $callback, array_merge( array( $lb ), $params ) );
    }
}


/**
 * Get error (as code, string) from a Status object.
 *
 * @since 1.23
 * @param Status $status
 * @return array Array of code and error string
 */
public function getErrorFromStatus( $status ) {
    $code = array_shift( $errors[0] );
    $msg = wfMessage( $code, $errors[0] );
    return array( $code, $msg->inLanguage( 'en' )->useDatabase( false )->plain() );
    //

    $error = (array)$error; // It seems strings sometimes make their way in here
    $key = array_shift( $error );
}


public static $messageMap = array(
    // This one MUST be present, or dieUsageMsg() will recurse infinitely
    'unknownerror' => array( 'code' => 'unknownerror', 'info' => "Unknown error: \"\$1\"" ),
    'unknownerror-nocode' => array( 'code' => 'unknownerror', 'info' => 'Unknown error' ),

    // Messages from Title::getUserPermissionsErrors()
    'ns-specialprotected' => array(
        'code' => 'unsupportednamespace',
        'info' => "Pages in the Special namespace can't be edited"
    ),
    'protectedinterface' => array(
        'code' => 'protectednamespace-interface',
        'info' => "You're not allowed to edit interface messages"
    ),
)
