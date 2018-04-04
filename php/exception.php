<?php
namespace Illuminate\Http\Exception;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
class HttpResponseException extends RuntimeException
{
    /**
     * The underlying response instance.
     *
     * @var \Symfony\Component\HttpFoundation\Response
     */
    protected $response;
    /**
     * Create a new HTTP response exception instance.
     *
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return void
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
    /**
     * Get the underlying response instance.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}

/*********************sample**********************************8
 */

    /**
     * Get the segments of a template with a named path.
     *
     * @param  string  $name
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    protected function getNamespaceSegments($name)
    {
        $segments = explode(static::HINT_PATH_DELIMITER, $name);
        if (count($segments) != 2) {
            throw new InvalidArgumentException("View [$name] has an invalid name.");
        }
        if (!isset($this->hints[$segments[0]])) {
            throw new InvalidArgumentException("No hint path defined for [{$segments[0]}].");
        }
        return $segments;
    }



        /*********************other**********************************/

<?php

namespace PayPal\Exception;

/**
 * Class PayPalInvalidCredentialException
 *
 * @package PayPal\Exception
 */
class PayPalInvalidCredentialException extends \Exception
{

    /**
     * Default Constructor
     *
     * @param string|null $message
     * @param int  $code
     */
    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }

    /**
     * prints error message
     *
     * @return string
     */
    public function errorMessage()
    {
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            . ': <b>' . $this->getMessage() . '</b>';
        return $errorMsg;
    }

}


protected function throwDBException( DBError $e ) {
    throw new JobQueueError( get_class( $e ) . ": " . $e->getMessage() );
}



/**
	 * This method outputs status information only if a debug handler was set.
	 * Any exceptions are caught and logged, but are not reported as output.
     *
	 *    - throttle : whether to respect job backoff configuration
     * */
