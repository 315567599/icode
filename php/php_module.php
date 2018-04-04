<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require __DIR__ . '/../../vendor/autoload.php';

use LightService\Server\Service;

class UserModule
{
    public function login($user, $passwd)
    {
        if ($user != 'foo') {
            return 'illegal user';
        }

        if ($passwd != 'bar') {
            return 'wrong passwd, ' . $passwd;
        }

        return array('hello world!', 'pass');
    }
}

class HashitModule
{
    public function hash($data)
    {
        return array($data, md5($data));
    }
}

class FooModule
{
    public function bar()
    {
        return 'bar';
    }
}

class Foo2Module
{
    public function bar2()
    {
        return 'bar2';
    }
}

class Foo3Module
{

    public function bar3()
    {
        return 'bar3';
    }
}

class Foo4Module
{
    public function bar4()
    {
        return 'bar4';
    }
}

// $sl = new \LightService\Server\Helper\ServiceLocator();
// $sl->init(array(
    // 'auto_lookup' => true,
    // 'module'      => array(
        // 'user' => array(
            // 'class' => 'user'
        // )
    // ),
    // 'method'      => array(
    // )
// ));

function myecho($msg) {
    return $msg;
}

$s = Service::create('lsrpc', function($module, $method) {
    if (!isset($module) && function_exists($method)) {
        return $method;
    }

    $class = $module . 'Module';

    if (class_exists($class)) {
        error_log($class);
        $callable = array(new $class, $method);
        return is_callable($callable) ? $callable : NULL;
    }
});

echo $s->respond($_REQUEST['!']);
