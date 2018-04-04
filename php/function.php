<?php
/**
 * Provide a simple HTTP error.
 *
 * @param int|string $code
 * @param string $label
 * @param string $desc
 */
function wfHttpError( $code, $label, $desc ) {
	global $wgOut;
	$wgOut->disable();
	header( "HTTP/1.0 $code $label" );
	header( "Status: $code $label" );
	$wgOut->sendCacheControl();

	header( 'Content-type: text/html; charset=utf-8' );
	print "<!doctype html>" .
		'<html><head><title>' .
		htmlspecialchars( $label ) .
		'</title></head><body><h1>' .
		htmlspecialchars( $label ) .
		'</h1><p>' .
		nl2br( htmlspecialchars( $desc ) ) .
		"</p></body></html>\n";
}

/**
 * A wrapper around the PHP function var_export().
 * Either print it or add it to the regular output ($wgOut).
 *
 * @param mixed $var A PHP variable to dump.
 */
function wfVarDump( $var ) {
	global $wgOut;
	$s = str_replace( "\n", "<br />\n", var_export( $var, true ) . "\n" );
	if ( headers_sent() || !isset( $wgOut ) || !is_object( $wgOut ) ) {
		print $s;
	} else {
		$wgOut->addHTML( $s );
	}
}

	/**
	 * Obtain the recent change with a given rc_id value
	 *
	 * @param int $rcid The rc_id value to retrieve
	 * @return RecentChange
	 */
	public static function newFromId( $rcid ) {
		return self::newFromConds( array( 'rc_id' => $rcid ), __METHOD__ );
	}

	/**
	 * Find the first recent change matching some specific conditions
	 *
	 * @param array $conds Array of conditions
	 * @param mixed $fname Override the method name in profiling/logs
	 * @param array $options Query options
	 * @return RecentChange
	 */
	public static function newFromConds( $conds, $fname = __METHOD__, $options = array() ) {
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectRow( 'recentchanges', self::selectFields(), $conds, $fname, $options );
		if ( $row !== false ) {
			return self::newFromRow( $row );
		} else {
			return null;
		}
	}
?>

<?php
	/**
	 * Parsing text to RC_* constants
	 * @since 1.24
	 * @param string|array $type
	 * @throws MWException
	 * @return int|array RC_TYPE
	 */
	public static function parseToRCType( $type ) {
		if ( is_array( $type ) ) {
			$retval = array();
			foreach ( $type as $t ) {
				$retval[] = RecentChange::parseToRCType( $t );
			}

			return $retval;
		}

		switch ( $type ) {
			case 'edit':
				return RC_EDIT;
			case 'new':
				return RC_NEW;
			case 'log':
				return RC_LOG;
			case 'external':
				return RC_EXTERNAL;
			default:
				throw new MWException( "Unknown type '$type'" );
		}
	}
?>

<?php
    # Notify extensions
    wfRunHooks( 'RecentChange_save', array( &$this ) );

			throw new MWException( __FUNCTION__ . ": Invalid stream logger URI: '$uri'" );
?>

<?php

	/**
	 * Makes an entry in the database corresponding to page creation
	 * Note: the title object must be loaded with the new id using resetArticleID()
	 *
	 * @param string $timestamp
	 * @param Title $title
	 * @param bool $minor
	 * @param User $user
	 * @param string $comment
	 * @param bool $bot
	 * @param string $ip
	 * @param int $size
	 * @param int $newId
	 * @param int $patrol
	 * @return RecentChange
	 */
	public static function notifyNew( $timestamp, &$title, $minor, &$user, $comment, $bot,
		$ip = '', $size = 0, $newId = 0, $patrol = 0 ) {
		$rc = new RecentChange;
		$rc->mTitle = $title;
		$rc->mPerformer = $user;
		$rc->mAttribs = array(
			'rc_timestamp' => $timestamp,
			'rc_namespace' => $title->getNamespace(),
			'rc_title' => $title->getDBkey(),
			'rc_type' => RC_NEW,
			'rc_source' => self::SRC_NEW,
			'rc_minor' => $minor ? 1 : 0,
			'rc_cur_id' => $title->getArticleID(),
			'rc_user' => $user->getId(),
			'rc_user_text' => $user->getName(),
			'rc_comment' => $comment,
			'rc_this_oldid' => $newId,
			'rc_last_oldid' => 0,
			'rc_bot' => $bot ? 1 : 0,
			'rc_ip' => self::checkIPAddress( $ip ),
			'rc_patrolled' => intval( $patrol ),
			'rc_new' => 1, # obsolete
			'rc_old_len' => 0,
			'rc_new_len' => $size,
			'rc_deleted' => 0,
			'rc_logid' => 0,
			'rc_log_type' => null,
			'rc_log_action' => '',
			'rc_params' => ''
		);

		$rc->mExtra = array(
			'prefixedDBkey' => $title->getPrefixedDBkey(),
			'lastTimestamp' => 0,
			'oldSize' => 0,
			'newSize' => $size,
			'pageStatus' => 'created'
		);
		$rc->save();

		return $rc;
	}
?>

<?php
	/**
	 * @param string $timestamp
	 * @param Title $title
	 * @param User $user
	 * @param string $actionComment
	 * @param string $ip
	 * @param string $type
	 * @param string $action
	 * @param Title $target
	 * @param string $logComment
	 * @param string $params
	 * @param int $newId
	 * @param string $actionCommentIRC
	 * @return bool
	 */
	public static function notifyLog( $timestamp, &$title, &$user, $actionComment, $ip, $type,
		$action, $target, $logComment, $params, $newId = 0, $actionCommentIRC = ''
	) {
		global $wgLogRestrictions;

		# Don't add private logs to RC!
		if ( isset( $wgLogRestrictions[$type] ) && $wgLogRestrictions[$type] != '*' ) {
			return false;
		}
		$rc = self::newLogEntry( $timestamp, $title, $user, $actionComment, $ip, $type, $action,
			$target, $logComment, $params, $newId, $actionCommentIRC );
		$rc->save();

		return true;
	}
?>

<?php

    wfDebugLog( 'gitinfo',
        "Computed cacheFile={$this->cacheFile} for {$repoDir}"
    );

    wfDebugLog( 'gitinfo',
        "Failed to compute GitInfo for \"{$this->basedir}\""
    );
    $this->basedir = $repoDir . DIRECTORY_SEPARATOR . '.git';

    $headFile = "{$this->basedir}/HEAD";

    if ( substr( $url, -4 ) !== '.git' ) {
        $url .= '.git';
    }

    $replacements = array(
        '%h' => substr( $headSHA1, 0, 7 ),
        '%H' => $headSHA1,
        '%r' => urlencode( $matches[1] ),
    );
    return strtr( $viewerUrl, $replacements );
?>

<?php
    $map = [-1,1,2,4,-2];
    $map = array_filter( $map, function ( $w ) {
        return $w > 0;
    } );
    var_dump($map);
?>



