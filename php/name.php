<?php

private $tokenExpiresIn;

private $accessToken;

private $clientSecret;

private $tokenCreateTime;

private $cipher;

$this->logger = PayPalLoggingManager::getInstance(__CLASS__);

/**
 * Default Constructor
 *
 * You can pass data as a json representation or array object. This argument eliminates the need
 * to do $obj->fromJson($data) later after creating the object.
 *
 * @param null $data
 * @throws \InvalidArgumentException
 */
public function __construct($data = null)
{
    switch (gettype($data)) {
    case "NULL":
        break;
    case "string":
        JsonValidator::validate($data);
        $this->fromJson($data);
        break;
    case "array":
        $this->fromArray($data);
        break;
    default:
    }
}


/**
 * Returns a list of Object from Array or Json String. It is generally used when your json
 * contains an array of this object
 *
 * @param mixed $data Array object or json string representation
 * @return array
 */
public static function getList($data)
{
    // Return Null if Null
    if ($data === null) { return null; }

if (is_a($data, get_class(new \stdClass()))) {
    //This means, root element is object
    return new static(json_encode($data));
}

$list = array();

if (is_array($data)) {
    $data = json_encode($data);
}

if (JsonValidator::validate($data)) {
    // It is valid JSON
    $decoded = json_decode($data);
    if ($decoded === null) {
        return $list;
    }
    if (is_array($decoded)) {
        foreach ($decoded as $k => $v) {
            $list[] = self::getList($v);
        }
    }
    if (is_a($decoded, get_class(new \stdClass()))) {
        //This means, root element is object
        $list[] = new static(json_encode($decoded));
    }
}

return $list;
}



$cachePath = self::cachePath($config);
if (!is_dir(dirname($cachePath))) {
    if (mkdir(dirname($cachePath), 0755, true) == false) {
        throw new \Exception("Failed to create directory at $cachePath");
    }
}


class FormatConverter

    /**
     * Class PayPalConfigManager
     *
     * PayPalConfigManager loads the SDK configuration file and
     * hands out appropriate config params to other classes
     *
     * @package PayPal\Core
     */
    class PayPalConfigManager


        /**
         * Add Configuration from configuration.ini files
         *
         * @param string $fileName
         * @return $this
         */
        public function addConfigFromIni($fileName)
        {
            if ($configs = parse_ini_file($fileName)) {
                $this->addConfigs($configs);
            }
            return $this;
        }



/**
 * Removes a Header
 *
 * @param $name
 */
public function removeHeader($name)
{
    unset($this->headers[$name]);
}






/**
 * Set ssl parameters for certificate based client authentication
 *
 * @param      $certPath
 * @param null $passPhrase
 */
public function setSSLCert($certPath, $passPhrase = null)
{
    $this->curlOptions[CURLOPT_SSLCERT] = realpath($certPath);
    if (isset($passPhrase) && trim($passPhrase) != "") {
        $this->curlOptions[CURLOPT_SSLCERTPASSWD] = $passPhrase;
    }
}








    /**
     * End Point
     *
     * @param array $config
     *
     * @return string
     * @throws \PayPal\Exception\PayPalConfigurationException
     */
    private function _getEndpoint($config)




    /**
     * Generates a unique per request id that
     * can be used to set the PayPal-Request-Id header
     * that is used for idempotency
     *
     * @return string
     */
    private function generateRequestId()
    {
        static $pid = -1;
        static $addr = -1;

        if ($pid == -1) {
            $pid = getmypid();
        }

        if ($addr == -1) {
            if (array_key_exists('SERVER_ADDR', $_SERVER)) {
                $addr = ip2long($_SERVER['SERVER_ADDR']);
            echo $addr;
            } else {
                $addr = php_uname('n');
                echo $addr;
            }
        }

        return $addr . $pid . $_SERVER['REQUEST_TIME'] . mt_rand(0, 0xffff);
    }





// Retrieving the Plan object from Create Plan Sample
/** @var Plan $createdPlan */
$createdPlan = require 'CreatePlan.php';

use PayPal\Api\Plan;

try {
    $result = $createdPlan->delete($apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 	ResultPrinter::printError("Deleted a Plan", "Plan", $createdPlan->getId(), null, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 ResultPrinter::printResult("Deleted a Plan", "Plan", $createdPlan->getId(), null, null);

return $createdPlan;



    /**
     * Date when token expires.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;


    /**
     * Checks the expiration of the access token.
     *
     * @return boolean|null
     */
    public function isExpired()






    /**
     * Setter for expires_at.
     *
     * @param int $timeStamp
     */
    protected function setExpiresAtFromTimeStamp($timeStamp)
    {
        $dt = new \DateTime();
        $dt->setTimestamp($timeStamp);
        $this->expiresAt = $dt;
    }




    /**
     * Returns a value from the metadata.
     *
     * @param string $field   The property to retrieve.
     * @param mixed  $default The default to return if the property doesn't exist.
     *
     * @return mixed
     */
    public function getField($field, $default = null)
    {
        if (isset($this->metadata[$field])) {
            return $this->metadata[$field];
        }

        return $default;
    }




    public function getProperty($field, $default = null)
    {
        return $this->getField($field, $default);
    }






    public function getAuthorizationUrl($redirectUrl, $state, array $scope = [], array $params = [], $separator = '&')
    {
        $params += [
            'client_id' => $this->app->getId(),
            'state' => $state,
            'response_type' => 'code',
            'sdk' => 'php-sdk-' . Facebook::VERSION,
            'redirect_uri' => $redirectUrl,
            'scope' => implode(',', $scope)
        ];

        return static::BASE_AUTHORIZATION_URL . '/' . $this->graphVersion . '/dialog/oauth?' . http_build_query($params, null, $separator);
    }




    /**
     * Returns the OAuth 2.0 client service.
     *
     * @return OAuth2Client
     */
    public function getOAuth2Client()
    {
        if (!$this->oAuth2Client instanceof OAuth2Client) {
            $app = $this->getApp();
            $client = $this->getClient();
            $this->oAuth2Client = new OAuth2Client($app, $client, $this->defaultGraphVersion);
        }

        return $this->oAuth2Client;
    }






    /**
     * Returns the URL detection handler.
     *
     * @return UrlDetectionInterface
     */
    public function getUrlDetectionHandler()
    {
        if (!$this->urlDetectionHandler instanceof UrlDetectionInterface) {
            $this->urlDetectionHandler = new FacebookUrlDetectionHandler();
        }

        return $this->urlDetectionHandler;
    }



    /**
     * Returns the JavaScript helper.
     *
     * @return FacebookJavaScriptHelper
     */
    public function getJavaScriptHelper()
    {
        return new FacebookJavaScriptHelper($this->app, $this->client, $this->defaultGraphVersion);
    }




    /**
     * Validates the signature used in a signed request.
     *
     * @param string $hashedSig
     * @param string $sig
     *
     * @throws FacebookSDKException
     */
    protected function validateSignature($hashedSig, $sig)
    {
        if (mb_strlen($hashedSig) === mb_strlen($sig)) {
            $validate = 0;
            for ($i = 0; $i < mb_strlen($sig); $i++) {
                $validate |= ord($hashedSig[$i]) ^ ord($sig[$i]);
            }
            if ($validate === 0) {
                return;
            }
        }

        throw new FacebookSDKException('Signed request has an invalid signature.', 602);
    }



    /**
     * Base64 decoding which replaces characters:
     *   + instead of -
     *   / instead of _
     *
     * @link http://en.wikipedia.org/wiki/Base64#URL_applications
     *
     * @param string $input base64 url encoded input
     *
     * @return string decoded string
     */
    public function base64UrlDecode($input)
    {
        $urlDecodedBase64 = strtr($input, '-_', '+/');
        $this->validateBase64($urlDecodedBase64);

        return base64_decode($urlDecodedBase64);
    }



    /**
     * Get the version of Graph that returned this response.
     *
     * @return string|null
     */
    public function getGraphVersion()
    {
        return isset($this->headers['Facebook-API-Version']) ? $this->headers['Facebook-API-Version'] : null;
    }




    /**
     * Instantiates an exception to be thrown later.
     */
    public function makeException()
    {
        $this->thrownException = FacebookResponseException::create($this);
    }

    /**
     * Convenience method for creating a GraphAlbum collection.
     *
     * @return \Facebook\GraphNodes\GraphAlbum
     *
     * @throws FacebookSDKException
     */
    public function getGraphAlbum()
    {
        $factory = new GraphNodeFactory($this);

        return $factory->makeGraphAlbum();
    }


        $className = static::BASE_GRAPH_EDGE_CLASS;

        return new $className($this->response->getRequest(), $dataList, $metaData, $parentGraphEdgeEndpoint, $subclassName);


    /**
     * Convenience method for creating a GraphPage collection.
     *
     * @return GraphPage
     *
     * @throws FacebookSDKException
     */
    public function makeGraphPage()
    {
        return $this->makeGraphNode(static::BASE_GRAPH_OBJECT_PREFIX . 'GraphPage');
    }



<!---------------->
public function onKernelRequest(GetResponseEvent $event)
public function onKernelFinishRequest(FinishRequestEvent $event)
