<?php
public static function validateAccessToken(GraphSessionInfo $tokenInfo,
					   $appId = null, $machineId = null)
{
	$targetAppId = FacebookSession::_getTargetAppId($appId);
	$appIdIsValid = $tokenInfo->getAppId() == $targetAppId;
	$machineIdIsValid = $tokenInfo->getProperty('machine_id') == $machineId;

	$accessTokenIsValid = $tokenInfo->isValid();
	// Not all access tokens return an expiration. E.g. an app access token.
	if ($tokenInfo->getExpiresAt() instanceof \DateTime) {
		$accessTokenIsStillAlive = $tokenInfo->getExpiresAt()->getTimestamp() >= time();
	} else {
		$accessTokenIsStillAlive = true;
	}

	return $appIdIsValid && $machineIdIsValid && $accessTokenIsValid && $accessTokenIsStillAlive;
}

?>

<?php
public static function requestCode(array $params, $appId = null, $appSecret = null)
{
	$response = static::request('/oauth/client_code', $params, $appId, $appSecret);
	$data = $response->getResponse();
	if (isset($data->code)) {
		return (string) $data->code;
	}
	throw FacebookRequestException::create(
		$response->getRawResponse(),
		$data,
		401
	);
}
?>

<?php
 public function hasOAuthData()
 {
	 return isset($this->payload['oauth_token']) || isset($this->payload['code']);
 }
?>
