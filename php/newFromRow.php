<?php

/**
 * Constructs new LogEntry from database result row.
 * Supports rows from both logging and recentchanges table.
 * @param stdClass|array $row
 * @return DatabaseLogEntry
 */
public static function newFromRow( $row ) {
    $row = (object)$row;
    if ( isset( $row->rc_logid ) ) {
        return new RCDatabaseLogEntry( $row );
    } else {
        return new self( $row );
    }
}


/** @var stdClass Database result row. */
protected $row;


protected function __construct( $row ) {
    $this->row = $row;
}


/**
 * Returns the unique database id.
 * @return int
 */
public function getId() {
    return (int)$this->row->log_id;
}

/**
 * Returns whatever is stored in the database field.
 * @return string
 */
protected function getRawParameters() {
    return $this->row->log_params;
}

public function getTarget() {
    $namespace = $this->row->log_namespace;
    $page = $this->row->log_title;
    $title = Title::makeTitle( $namespace, $page );

    return $title;
}

$types = ( $types === '' ) ? array() : (array)$types;



$html .= $this->getTypeMenu( $types ) . "\n";
$html .= $this->getUserInput( $user ) . "\n";
$html .= $this->getTitleInput( $page ) . "\n";
$html .= $this->getExtraInputs( $types ) . "\n";


public function setAudience( $audience ) {
    $this->audience = ( $audience == self::FOR_THIS_USER )
        ? self::FOR_THIS_USER
        : self::FOR_PUBLIC;
}




$dbw->onTransactionIdle(
    function () use ( $dbw, $timestamp, $watchers, $title, $fname ) {
        $dbw->update( 'watchlist',
            array( /* SET */
                'wl_notificationtimestamp' => $dbw->timestamp( $timestamp )
            ), array( /* WHERE */
                'wl_user' => $watchers,
                'wl_namespace' => $title->getNamespace(),
                'wl_title' => $title->getDBkey(),
            ), $fname
        );
    }
);

$res = $dbw->select( array( 'watchlist' ),
    array( 'wl_user' ),
    array(
        'wl_user != ' . intval( $editor->getID() ),
        'wl_namespace' => $title->getNamespace(),
        'wl_title' => $title->getDBkey(),
        'wl_notificationtimestamp IS NULL',
    ), __METHOD__
);


$this->actuallyNotifyOnPageChange(
    $editor,
    $title,
    $timestamp,
    $summary,
    $minorEdit,
    $oldid,
    $watchers,
    $pageStatus
);


public function notifyOnPageChange( $editor, $title, $timestamp, $summary)


    //    User::selectFields()

    /**
     * @param array $ids
     * @return UserArrayFromResult
     */
    static function newFromIDs( $ids ) {
        $ids = array_map( 'intval', (array)$ids ); // paranoia
        if ( !$ids ) {
            // Database::select() doesn't like empty arrays
            return new ArrayIterator( array() );
        }
        $dbr = wfGetDB( DB_SLAVE );
        $res = $dbr->select(
            'user',
            User::selectFields(),
            array( 'user_id' => array_unique( $ids ) ),
            __METHOD__
        );
        return self::newFromResult( $res );
    }

	protected static function newFromResult_internal( $res ) {
		return new UserArrayFromResult( $res );
	}



	/**
	 * Does the per-user customizations to a notification e-mail (name,
	 * timestamp in proper timezone, etc) and sends it out.
	 * Returns true if the mail was sent successfully.
	 *
	 * @param User $watchingUser
	 * @return bool
	 * @private
	 */
	function sendPersonalised( $watchingUser ) {
		global $wgContLang, $wgEnotifUseRealName;
		// From the PHP manual:
		//   Note: The to parameter cannot be an address in the form of
		//   "Something <someone@example.com>". The mail command will not parse
		//   this properly while talking with the MTA.
		$to = MailAddress::newFromUser( $watchingUser );

		# $PAGEEDITDATE is the time and date of the page change
		# expressed in terms of individual local time of the notification
		# recipient, i.e. watching user
		$body = str_replace(
			array( '$WATCHINGUSERNAME',
				'$PAGEEDITDATE',
				'$PAGEEDITTIME' ),
			array( $wgEnotifUseRealName && $watchingUser->getRealName() !== ''
				? $watchingUser->getRealName() : $watchingUser->getName(),
				$wgContLang->userDate( $this->timestamp, $watchingUser ),
				$wgContLang->userTime( $this->timestamp, $watchingUser ) ),
			$this->body );

		return UserMailer::send( $to, $this->from, $this->subject, $body, $this->replyto );
	}



	/**
	 * Get the last error number
	 * @see http://www.php.net/mysql_errno
	 *
	 * @return int
	 */
	function lastErrno();

	/**
	 * Get a description of the last error
	 * @see http://www.php.net/mysql_error
	 *
	 * @return string
	 */
	function lastError();


	/**
	 * mysql_fetch_field() wrapper
	 * Returns false if the field doesn't exist
	 *
	 * @param string $table Table name
	 * @param string $field Field name
	 *
	 * @return Field
	 */
	function fieldInfo( $table, $field );

	/**
	 * Get information about an index into an object
	 * @param string $table Table name
	 * @param string $index Index name
	 * @param string $fname Calling function name
	 * @return mixed Database-specific index description class or false if the index does not exist
	 */
	function indexInfo( $table, $index, $fname = __METHOD__ );


