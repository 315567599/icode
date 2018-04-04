<?php
if(!$fp = fsockopen($mail_setting['mailserver'], $mail_setting['mailport'], $errno, $errstr, 30)) {
	return false;
}

stream_set_blocking($fp, true);

$lastmessage = fgets($fp, 512);
if(substr($lastmessage, 0, 3) != '220') {
	return false;
}

fputs($fp, ($mail_setting['mailauth'] ? 'EHLO' : 'HELO')." discuz\r\n");
$lastmessage = fgets($fp, 512);
if(substr($lastmessage, 0, 3) != 220 && substr($lastmessage, 0, 3) != 250) {
	return false;
}
?>

<?php
 $machineId = $machineId ?: $this->machineId;

$appIdIsValid = $tokenInfo->getAppId() == $targetAppId;
$machineIdIsValid = $tokenInfo->getProperty('machine_id') == $machineId;
$accessTokenIsValid = $tokenInfo->isValid();

 if ($tokenInfo->getExpiresAt() instanceof \DateTime) {
	 $accessTokenIsStillAlive = $tokenInfo->getExpiresAt()->getTimestamp() >= time();
 } else {
	 $accessTokenIsStillAlive = true;
 }
return $appIdIsValid && $machineIdIsValid && $accessTokenIsValid && $accessTokenIsStillAlive;

?>
