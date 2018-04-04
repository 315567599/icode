<?php
/*
 * static 变量测试是否获取的标志
 */
class ComposerAutoloaderInit0b68f512f3a52b1e53d9e32d0ab9f055
{
    private static $loader;

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }
    }	

?>

<?php
public function loadClass($class)
{
    if ($file = $this->findFile($class)) {
	    includeFile($file);
	    return true;
    }
}

public function findFile($class)
{
	// work around for PHP 5.3.0 - 5.3.2 https://bugs.php.net/50731
	if ('\\' == $class[0]) {
		$class = substr($class, 1);
	}

	// class map lookup
	if (isset($this->classMap[$class])) {
		return $this->classMap[$class];
	}

	$file = $this->findFileWithExtension($class, '.php');

	// Search for Hack files if we are running on HHVM
	if ($file === null && defined('HHVM_VERSION')) {
		$file = $this->findFileWithExtension($class, '.hh');
	}

	if ($file === null) {
		// Remember that this class does not exist.
		return $this->classMap[$class] = false;
	}

	return $file;
}

?>

<?php
/**
 *循环执行多个函数 
 */
protected function registerBaseServiceProviders()
	{
		foreach (array('Event', 'Exception', 'Routing') as $name)
		{
			$this->{"register{$name}Provider"}();
		}
	}
?>

<?php
/**
 * classload 载入整个目录
 */
ClassLoader::addDirectories(array(
	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

$routes = $app['path'].'/routes.php';

	if (file_exists($routes)) require $routes;

$path = $app['path']."/start/{$env}.php";

	if (file_exists($path)) require $path;


$path = $app['path'].'/start/global.php';

	if (file_exists($path)) require $path;


?>

<?
/**
     * Sends HTTP headers and content.
     *
     * @return Response
     *
     * @api
     */
    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();

        // fastcgi_finish_request :php-fpm返回浏览器数据，php-fpm继续执行
        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        } elseif ('cli' !== PHP_SAPI) {
            static::closeOutputBuffers(0, true);
        }

        return $this;
    }

?>

<?php
/**
 * 闭包使用
 *  The third is a Closure allowing you to specify various options on the e-mail message.
 */
Route::get('/', function()
	{
		$user = User::find(1);
		$data = [ 'user' => $user ];

		Mail::send('emails/welcome', $data, function($message) use($user)
	{
		$message
			->to($user->email)
			->subject('Welcome Bieber Fan!')
			->attach('images/bieberPhoto.jpg');
	});

		return 'Welcome email sent!'; }); 

/**
 * 	 * Call the provided message builder.
 * 	 	 *
 * 	 	 	 * @param  \Closure|string  $callback
 * 	 	 	 	 * @param  \Illuminate\Mail\Message  $message
 * 	 	 	 	 	 * @return mixed
 * 	 	 	 	 	 	 *
 * 	 	 	 	 	 	 	 * @throws \InvalidArgumentException
 * 	 	 	 	 	 	 	 	 */
protected function callMessageBuilder($callback, $message)
{
	if ($callback instanceof Closure)
	{
		return call_user_func($callback, $message);
	}
	elseif (is_string($callback))
	{
		return $this->container[$callback]->mail($message);
	}
	throw new \InvalidArgumentException("Callback is not valid.");
}

?>

<?php
//闭包可以从父作用域中继承变量。 任何此类变量都应该用 use 语言结构传递进去。
	/**
		* 	 * Register the service provider.
		* 	 	 *
		* 	 	 	 * @return void
		* 	 	 	 	 */
public function register()
{
	$me = $this;
	$this->app->bindShared('mailer', function($app) use ($me)
{
	$me->registerSwiftMailer();
	// Once we have create the mailer instance, we will set a container instance
	// 			// on the mailer. This allows us to resolve mailer classes via containers
	// 						// for maximum testability on said classes instead of passing Closures.
	$mailer = new Mailer(
		$app['view'], $app['swift.mailer'], $app['events']
	);
	$this->setMailerDependencies($mailer, $app);
	// If a "from" address is set, we will set it on the mailer so that all mail
	// messages sent by the applications will utilize the same "from" address
	// on each one, which makes the developer's life a lot more convenient.
	$from = $app['config']['mail.from'];
	if (is_array($from) && isset($from['address']))
	{
		$mailer->alwaysFrom($from['address'], $from['name']);
	}
	// Here we will determine if the mailer should be in "pretend" mode for this
	// environment, which will simply write out e-mail to the logs instead of
	// sending it over the web, which is useful for local dev environments.
	$pretend = $app['config']->get('mail.pretend', false);
	$mailer->pretend($pretend);
	return $mailer;
});
}

?>

<?php
/**
	* 	 * Determine if we are running in the console.
	* 	 	 *
	* 	 	 	 * @return bool
	* 	 	 	 	 */
public function runningInConsole()
{
	return php_sapi_name() == 'cli';
}
?>

<?php
        $this->input = ProcessUtils::validateInput(sprintf('%s::%s', __CLASS__, __FUNCTION__), $input);
?>
