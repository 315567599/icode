<?php
 $request = new FacebookRequest(
	 FacebookSession::newAppSession($targetAppId, $targetAppSecret),
	 'GET',
	 $endpoint,
	 $params
 );
return $request->execute();
################################################################################
throw FacebookRequestException::create(
	$response->getRawResponse(),
	$data,
	401
);
################################################################################
/**
	* * Returns a property from the signed request data if available.
	* *
	* * @param string $key
	* * @param mixed|null $default
	* *
	* * @return mixed|null
	* */
public function get($key, $default = null)
{
	if (isset($this->payload[$key])) {
		return $this->payload[$key];
	}
	return $default;
}
################################################################################

/**
	* * Decodes a raw valid signed request.
	* *
	* * @param string $signedRequest
	* *
	* * @returns array
	* */
public static function split($signedRequest)
{
	static::validateFormat($signedRequest);
	return explode('.', $signedRequest, 2);
}

 list($encodedSig, $encodedPayload) = static::split($signedRequest);


################################################################################
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
	'appId'  => '344617158898614',
	'secret' => '6dc8ac871858b34798bc2488200e503d',
));

      $e = new FacebookApiException(array(
        'error_code' => curl_errno($ch),
        'error' => array(
        'message' => curl_error($ch),
        'type' => 'CurlException',
        ),
      ));
      curl_close($ch);
      throw $e;
################################################################################
//

    if (!$signed_request || strpos($signed_request, '.') === false) {
        self::errorLog('Signed request was invalid!');
        return null;
    }

    list($encoded_sig, $payload) = explode('.', $signed_request, 2);

    // decode the data
    $sig = self::base64UrlDecode($encoded_sig);
    $data = json_decode(self::base64UrlDecode($payload), true);

  /**
   * Makes a signed_request blob using the given data.
   *
   * @param array $data The data array.
   *
   * @return string The signed request.
   */
  protected function makeSignedRequest($data) {
    if (!is_array($data)) {
      throw new InvalidArgumentException(
        'makeSignedRequest expects an array. Got: ' . print_r($data, true));
    }
    $data['algorithm'] = self::SIGNED_REQUEST_ALGORITHM;
    $data['issued_at'] = time();
    $json = json_encode($data);
    $b64 = self::base64UrlEncode($json);
    $raw_sig = hash_hmac('sha256', $b64, $this->getAppSecret(), $raw = true);
    $sig = self::base64UrlEncode($raw_sig);
    return $sig.'.'.$b64;
  }

  /**
   * Base64 encoding that doesn't need to be urlencode()ed.
   * Exactly the same as base64_encode except it uses
   *   - instead of +
   *   _ instead of /
   *   No padded =
   *
   * @param string $input base64UrlEncoded input
   *
   * @return string The decoded string
   */
  protected static function base64UrlDecode($input) {
    return base64_decode(strtr($input, '-_', '+/'));
  }

  /**
   * Base64 encoding that doesn't need to be urlencode()ed.
   * Exactly the same as base64_encode except it uses
   *   - instead of +
   *   _ instead of /
   *
   * @param string $input The input to encode
   * @return string The base64Url encoded input, as a string.
   */
  protected static function base64UrlEncode($input) {
    $str = strtr(base64_encode($input), '+/', '-_');
    $str = str_replace('=', '', $str);
    return $str;
  }

  /**
   * getHttpClientHandler - Returns an instance of the HTTP client
   * data handler
   *
   * @return FacebookHttpable
   */
  public static function getHttpClientHandler()
  {
    if (static::$httpClientHandler) {
      return static::$httpClientHandler;
    }
    return function_exists('curl_init') ? new FacebookCurlHttpClient() : new FacebookStreamHttpClient();
  }

  /**
   * execute - Makes the request to Facebook and returns the result.
   *
   * @return FacebookResponse
   *
   * @throws FacebookSDKException
   * @throws FacebookRequestException
   */
  public function execute()
  {
    $url = $this->getRequestURL();
    $params = $this->getParameters();

    if ($this->method === "GET") {
      $url = self::appendParamsToUrl($url, $params);
      $params = array();
    }

    $connection = self::getHttpClientHandler();
    $connection->addRequestHeader('User-Agent', 'fb-php-' . self::VERSION);
    $connection->addRequestHeader('Accept-Encoding', '*'); // Support all available encodings.

    // ETag
    if (isset($this->etag)) {
      $connection->addRequestHeader('If-None-Match', $this->etag);
    }

    // Should throw `FacebookSDKException` exception on HTTP client error.
    // Don't catch to allow it to bubble up.
    $result = $connection->send($url, $this->method, $params);

    static::$requestCount++;

    $etagHit = 304 == $connection->getResponseHttpStatusCode();

    $headers = $connection->getResponseHeaders();
    $etagReceived = isset($headers['ETag']) ? $headers['ETag'] : null;

    $decodedResult = json_decode($result);
    if ($decodedResult === null) {
      $out = array();
      parse_str($result, $out);
      return new FacebookResponse($this, $out, $result, $etagHit, $etagReceived);
    }
    if (isset($decodedResult->error)) {
      throw FacebookRequestException::create(
        $result,
        $decodedResult->error,
        $connection->getResponseHttpStatusCode()
      );
    }

    return new FacebookResponse($this, $decodedResult, $result, $etagHit, $etagReceived);
  }

  /**
   * Return proper header size
   *
   * @return integer
   */
  private function getHeaderSize()
  {
    $headerSize = self::$facebookCurl->getinfo(CURLINFO_HEADER_SIZE);
    // This corrects a Curl bug where header size does not account
    // for additional Proxy headers.
    if ( self::needsCurlProxyFix() ) {
      // Additional way to calculate the request body size.
      if (preg_match('/Content-Length: (\d+)/', $this->rawResponse, $m)) {
          $headerSize = mb_strlen($this->rawResponse) - $m[1];
      } elseif (stripos($this->rawResponse, self::CONNECTION_ESTABLISHED) !== false) {
          $headerSize += mb_strlen(self::CONNECTION_ESTABLISHED);
      }
    }

    return $headerSize;
  }

?>
<?php
################################################################################
  $imageinfo = @getimagesize($target)) {
  list($width, $height, $type) = !empty($imageinfo) ? $imageinfo : array('', '', '');

  protected function get_full_url() {
	  $https = !empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'on') === 0 ||
		  !empty($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
		  strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;
	  return
		  ($https ? 'https://' : 'http://').
		  (!empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
		  (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
		  ($https && $_SERVER['SERVER_PORT'] === 443 ||
		  $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).
		  substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
  }

?>

<?php
  protected function get_file_object($file_name) {
	  if ($this->is_valid_file_object($file_name)) {
		  $file = new \stdClass();
		  $file->name = $file_name;
		  $file->size = $this->get_file_size(
			  $this->get_upload_path($file_name)
		  );
		  $file->url = $this->get_download_url($file->name);
		  foreach($this->options['image_versions'] as $version => $options) {
			  if (!empty($version)) {
				  if (is_file($this->get_upload_path($file_name, $version))) {
					  $file->{$version.'Url'} = $this->get_download_url(
						  $file->name,
						  $version
					  );
				  }
			  }
		  }
		  $this->set_additional_file_properties($file);
		  return $file;
	  }
	  return null;
  }
?>

<?php
  protected function get_error_message($error) {
	  return isset($this->error_messages[$error]) ?
		  $this->error_messages[$error] : $error;
  }
?>

<?php
  function get_config_bytes($val) {
	  $val = trim($val);
	  //php 字符串转数组
	  $last = strtolower($val[strlen($val)-1]);
	  switch($last) {
	  case 'g':
		  $val *= 1024;
	  case 'm':
		  $val *= 1024;
	  case 'k':
		  $val *= 1024;
	  }
	  return $this->fix_integer_overflow($val);
  }
?>

<?php
  /**
   * 	 * Create a new queue worker.
   * 	 	 *
   * 	 	 	 * @param  \Illuminate\Queue\QueueManager  $manager
   * 	 	 	 	 * @param  \Illuminate\Queue\Failed\FailedJobProviderInterface  $failer
   * 	 	 	 	 	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
   * 	 	 	 	 	 	 * @return void
   * 	 	 	 	 	 	 	 */
  public function __construct(QueueManager $manager,
	  FailedJobProviderInterface $failer = null,
	  Dispatcher $events = null)
  {
	  $this->failer = $failer;
	  $this->events = $events;
	  $this->manager = $manager;
  }
  /**
   * 	 * Listen to the given queue in a loop.
   * 	 	 *
   * 	 	 	 * @param  string  $connectionName
   * 	 	 	 	 * @param  string  $queue
   * 	 	 	 	 	 * @param  int     $delay
   * 	 	 	 	 	 	 * @param  int     $memory
   * 	 	 	 	 	 	 	 * @param  int     $sleep
   * 	 	 	 	 	 	 	 	 * @param  int     $maxTries
   * 	 	 	 	 	 	 	 	 	 * @return array
   * 	 	 	 	 	 	 	 	 	 	 */
  public function daemon($connectionName, $queue = null, $delay = 0, $memory = 128, $sleep = 3, $maxTries = 0)
  {
	  $lastRestart = $this->getTimestampOfLastQueueRestart();
	  while (true)
	  {
		  if ($this->daemonShouldRun())
		  {
			  $this->runNextJobForDaemon(
				  $connectionName, $queue, $delay, $sleep, $maxTries
			  );
		  }
		  else
		  {
			  $this->sleep($sleep);
		  }
		  if ($this->memoryExceeded($memory) || $this->queueShouldRestart($lastRestart))
		  {
			  $this->stop();
		  }
	  }
  }
?>

<?php
  protected function replaceNamespace(&$stub, $name)
  {
	  $stub = str_replace(
		  '{{namespace}}', $this->getNamespace($name), $stub
	  );
	  $stub = str_replace(
		  '{{rootNamespace}}', $this->getAppNamespace(), $stub
	  );
	  return $this;
  }
?>
