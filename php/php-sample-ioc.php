<?php
class App {

	private static $instances = [];

	public static function set($name, $instance)
	{
		if (is_string($instance)) {
			$instance = new $instance();
		}

		static::$instances[$name] = $instance;
	}

	public static function get($name)
	{
		$instance = static::$instances[$name];

		if ($instance instanceof Closure) {
			$instance = $instance();
		}

		return $instance;
	}

}
?>


<?php
interface MessageInterface {

	public function greeting();

}

class EnglishMessage implements MessageInterface {

	public function greeting() { return 'Hello!'; }

}

App::set('message', function() { return new EnglishMessage(); });
// or
App::set('message', 'EnglishMessage');

echo App::get('message')->greeting(); // Hello!
?>

<?php
/*
Facades
*/

abstract class Facade {

    protected static function getName()
    {
        throw new Exception('Facade does not implement getName method.');
    }

    public static function __callStatic($method, $args)
    {
        $instance = App::get(static::getName());

        if ( ! method_exists($instance, $method)) {
            throw new Exception(get_called_class() . ' does not implement ' . $method . ' method.');
        }

        return call_user_func_array([ $instance, $method ], $args);
    }

}
?>

<?php

class Message extends Facade {

	protected static function getName() { return 'message'; }

}

echo Message::greeting(); // Hello!

App::set('message', 'FrenchMessage');

echo Message::greeting(); // Bonjour!

try {
	echo Message::goodbye();
} catch (Exception $ex) {
	echo $ex->getMessage();
} // Message does not implement goodbye method.
?>
