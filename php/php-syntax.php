<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$visitor = array();

$visitor['agent'] = $_SERVER['HTTP_USER_AGENT'];

list($visitor['month'], $visitor['week'], $visitor['hour']) = explode("\t", dgmdate(TIMESTAMP, "Ym\tw\tH"));

if(strexists($visitor['agent'], 'Netscape')) {
	$visitor['browser'] = 'Netscape';
} elseif(strexists($visitor['agent'], 'Lynx')) {
	$visitor['browser'] = 'Lynx';
} elseif(strexists($visitor['agent'], 'Opera')) {
	$visitor['browser'] = 'Opera';
} elseif(strexists($visitor['agent'], 'Konqueror')) {
	$visitor['browser'] = 'Konqueror';
} elseif(strexists($visitor['agent'], 'MSIE')) {
	$visitor['browser'] = 'MSIE';
} elseif(strexists($visitor['agent'], 'Firefox')) {
	$visitor['browser'] = 'Firefox';
} elseif(strexists($visitor['agent'], 'Safari')) {
	$visitor['browser'] = 'Safari';
} elseif(substr($visitor['agent'], 0, 7) == 'Mozilla') {
	$visitor['browser'] = 'Mozilla';
} else {
	$visitor['browser'] = 'Other';
}



-----
	$cid = empty($_GET['cid'])?0:intval($_GET['cid']);
	$isupload = empty($_GET['cam']) && empty($_GET['doodle']) ? true : false;

---
if($uid && isemail($email) && $time > TIMESTAMP - 86400) {

--------
if('a string' === 0) echo 'but you will never see this' . PHP_EOL;

-------
$special = isset($_GET['special']) ? intval($_GET['special']) : null;

if(!$special) {
--------
foreach($commonfids as $k => $fid) {
		if($_G['cache']['forums'][$fid]['type'] == 'sub') {
			$commonfids[] = $_G['cache']['forums'][$fid]['fup'];
			unset($commonfids[$k]);
		}
	}
---------
		$commonlist .= '<li fid="'.$fid.'">'.$_G['cache']['forums'][$fid]['name'].'</li>';
---------
$cols['login'] = array('login','mobilelogin','connectlogin','register','invite','appinvite');

--------
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}
// $arr is now array(2, 4, 6, 8)
unset($value); // 最后取消掉引用

--------------
/* foreach example 3: key and value */

$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);

foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
}
-------------------
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a, $b)) {
    // $a contains the first element of the nested array,
    // and $b contains the second element.
    echo "A: $a; B: $b\n";
}

/*
A: 1; B: 2
A: 3; B: 4

*/
----------------------
//list不是真正的函数，而是语言结构。list() 用一步操作给一组变量进行赋值
--------------
$info = array('coffee', 'brown', 'caffeine');

// 列出所有变量
list($drink, $color, $power) = $info;
// 列出他们的其中一个
list($drink, , $power) = $info;
// 或者让我们跳到仅第三个
list( , , $power) = $info;
-----------------
//range — 建立一个包含指定范围单元的数组

// array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12)
foreach (range(0, 12) as $number) {
    echo $number;
}

// The step parameter was introduced in 5.0.0
// array(0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100)
foreach (range(0, 100, 10) as $number) {
    echo $number;
}

// Use of character sequences introduced in 4.1.0
// array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i');
foreach (range('a', 'i') as $letter) {
    echo $letter;
}
// array('c', 'b', 'a');
foreach (range('c', 'a') as $letter) {
    echo $letter;
}
------------------------
/* example 1 */

for ($i = 1; $i <= 10; $i++) {
    echo $i;
}

/* example 2 */

for ($i = 1; ; $i++) {
    if ($i > 10) {
        break;
    }
    echo $i;
}

/* example 3 */

$i = 1;
for (;;) {
    if ($i > 10) {
        break;
    }
    echo $i;
    $i++;
}

/* example 4 */

for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);
--------------
/*
 * 此数组将在遍历的过程中改变其中某些单元的值
 */
$people = Array(
        Array('name' => 'Kalle', 'salt' => 856412), 
        Array('name' => 'Pierre', 'salt' => 215863)
        );

for($i = 0; $i < sizeof($people); ++$i)
{
    $people[$i]['salt'] = rand(000000, 999999);
}

/*以上代码可能执行很慢，因为每次循环时都要计算一遍数组的长度。由于数组的长度始终不变，可以用一个中间变量来储存数组长度以优化而不是不停调用 count()：

*/
$people = Array(
        Array('name' => 'Kalle', 'salt' => 856412), 
        Array('name' => 'Pierre', 'salt' => 215863)
        );

for($i = 0, $size = sizeof($people); $i < $size; ++$i)
{
    $people[$i]['salt'] = rand(000000, 999999);
}
-------------------------
$arr = array("orange", "banana", "apple", "raspberry");

$i = 0;
while ($i < count($arr)) {
   $a = $arr[$i];
   echo $a ."\n";
   $i++;
}

// or
$i = 0;
$c = count($arr);
while ($i < $c) {
   $a = $arr[$i];
   echo $a ."\n";
   $i++;
}
--------------------------
do {
    if ($i < 5) {
        echo "i is not big enough";
        break;
    }
    $i *= $factor;
    if ($i < $minimum_limit) {
        break;
    }
    echo "i is ok";

    /* process i */

} while(0);

------------------------
$i = 0;
echo 'This code will run at least once because i default value is 0.<br/>';

do {
echo 'i value is ' . $i . ', so code block will run. <br/>';
++$i;
} while ($i < 10);

----------------------
//If you want $type to only have a value of 0 or 1, you can do this: 

do { 
    echo 'Choose a type, 0 or 1: '; 
    $type = trim(fgets(STDIN)); 
    if ($type == 0) { 
        /* do stuff */ 
    } elseif ($type == 1) { 
        /* do stuff */    
    } 
} while ($type != 0 && $type != 1); 

---------------------
//在一个 case 中的语句也可以为空，这样只不过将控制转移到了下一个 case 中的语句。

switch ($i) {
    case 0:
    case 1:
    case 2:
        echo "i is less than 3 but not negative";
        break;
    case 3:
        echo "i is 3";
}

-------------------
function getChineseZodiac($year){

    switch ($year % 12) :
        case  0: return 'Monkey';  // Years 0, 12, 1200, 2004...
        case  1: return 'Rooster';
        case  2: return 'Dog';
        case  3: return 'Boar';
        case  4: return 'Rat';
        case  5: return 'Ox';
        case  6: return 'Tiger';
        case  7: return 'Rabit';
        case  8: return 'Dragon';
        case  9: return 'Snake';
        case 10: return 'Horse';
        case 11: return 'Lamb';
    endswitch;
}
-----------------------
$mixed = 0;
switch($mixed){
   case NULL: echo "NULL";  break;
   case 0: echo "zero";  break;
   default: echo "other"; break;
}
-------------
$arr_month = array(
'January' => 1,
'February' => 2,
'March' => 3,
'April' => 4,
'May' => 5,
'June' => 6,
'July' => 7,
'August' => 8,
'September' => 9,
'October' => 10,
'November' => 11,
'December' => 12);
foreach($arr_month as $k => $v) {$arr_month[substr($k,0,3)] = $v;} // autogen a 3 letter version
-------------------
//php  分离术
/*

<?php if ($expression == true): ?>
  This will show if the expression is true.
<?php else: ?>
  Otherwise this will show.
<?php endif; ?>

*/
------------------------
//php注释
echo microtime(), "<br />"; // 0.25163600 1292450508

echo "This is a test"; // This is a one-line c++ style comment
    /* This is a multi line comment
       yet another line of comment */
    echo "This is yet another test";
    echo 'One Final Test'; # This is a one-line shell-style comment
------------------------
// == 是一个操作符，它检测两个变量是否相等，并返回一个布尔值
if ($action == "show_version") {
    echo "The version is 1.23";
}

// 这样做是不必要的...
if ($show_separators == TRUE) {
    echo "<hr>\n";
}

// ...因为可以使用下面这种简单的方式：
if ($show_separators) {
    echo "<hr>\n";
}

---------------------

/*

当转换为 boolean 时，以下值被认为是 FALSE：

布尔值 FALSE 本身
整型值 0（零）
浮点型值 0.0（零）
空字符串，以及字符串 "0"
不包括任何元素的数组
不包括任何成员变量的对象（仅 PHP 4.0 适用）
特殊类型 NULL（包括尚未赋值的变量）
从空标记生成的 SimpleXML 对象

所有其它值都被认为是 TRUE（包括任何资源）。

*/
--------------------
/*
要使用八进制表达，数字前必须加上 0（零）。要使用十六进制表达，数字前必须加上 0x。要使用二进制表达，数字前必须加上 0b。
*/
$a = 1234; // 十进制数
$a = -123; // 负数
$a = 0123; // 八进制数 (等于十进制 83)
$a = 0x1A; // 十六进制数 (等于十进制 26)
-----------------------
// 取得字符串的第一个字符
$str = 'This is a test.';
$first = $str[0];

// 取得字符串的第三个字符
$third = $str[2];

// 取得字符串的最后一个字符
$str = 'This is still a test.';
$last = $str[strlen($str)-1]; 

// 修改字符串的最后一个字符
$str = 'Look at the sea';
$str[strlen($str)-1] = 'e';

------------------
//php 定义常量
define("CONSTANT", "Hello world.");
echo CONSTANT; // outputs "Hello world."
echo Constant; // 输出 "Constant" 并发出一个提示级别错误信息

-----------------
//基本的赋值运算符是“=”。一开始可能会以为它是“等于”，其实不是的。它实际上意味着把右边表达式的值赋给左边的运算数。

$a = ($b = 4) + 5; // $a 现在成了 9，而 $b 成了 4。
---------------------
/*
Assignment    Same as:
$a += $b     $a = $a + $b    Addition
$a -= $b     $a = $a - $b     Subtraction
$a *= $b     $a = $a * $b     Multiplication
$a /= $b     $a = $a / $b    Division
$a %= $b     $a = $a % $b    Modulus

$a .= $b     $a = $a . $b       Concatenate

a &= $b     $a = $a & $b     Bitwise And
$a |= $b     $a = $a | $b      Bitwise Or
$a ^= $b     $a = $a ^ $b       Bitwise Xor
$a <<= $b     $a = $a << $b     Left shift
$a >>= $b     $a = $a >> $b      Right shift
*/
-------------------
/*
位运算符 ¶

$a & $b	And（按位与）	将把 $a 和 $b 中都为 1 的位设为 1。
$a | $b	Or（按位同或）	将把 $a 和 $b 中任何一个为 1 的位设为 1。
$a ^ $b	Xor（按位异或）	将把 $a 和 $b 中一个为 1 另一个为 0 的位设为 1。
~ $a	Not（按位取反）	将 $a 中为 0 的位设为 1，反之亦然。
$a << $b	Shift left（左移）	将 $a 中的位向左移动 $b 次（每一次移动都表示“乘以 2”）。
$a >> $b	Shift right（右移）	将 $a 中的位向右移动 $b 次（每一次移动都表示“除以 2”）。


位移在 PHP 中是数学运算。向任何方向移出去的位都被丢弃。左移时右侧以零填充，符号位被移走意味着正负号不被保留。右移时左侧以符号位填充，意味着正负号被保留。

要注意数据类型的转换。如果左右参数都是字符串，则位运算符将对字符的 ASCII 值进行操作。

PHP 的 ini 设定 error_reporting 使用了按位的值，
提供了关闭某个位的真实例子。要显示除了提示级别
之外的所有错误，php.ini 中是这样用的：
E_ALL & ~E_NOTICE
      
具体运作方式是先取得 E_ALL 的值：
00000000000000000111011111111111
再取得 E_NOTICE 的值：
00000000000000000000000000001000
然后通过 ~ 将其取反：
11111111111111111111111111110111
最后再用按位与 AND（&）得到两个值中都设定了（为 1）的位：
00000000000000000111011111110111
      
另外一个方法是用按位异或 XOR（^）来取得只在
其中一个值中设定了的位：
E_ALL ^ E_NOTICE
      
error_reporting 也可用来演示怎样置位。只显示错误和可恢复
错误的方法是：
E_ERROR | E_RECOVERABLE_ERROR
      
也就是将 E_ERROR
00000000000000000000000000000001
和 E_RECOVERABLE_ERROR
00000000000000000001000000000000
用按位或 OR（|）运算符来取得在任何一个值中被置位的结果：
00000000000000000001000000000001

*/

--------------
/*
LEFT SHIFT 
<?php echo 8 << 3; //64 ?> 

//same as 
<?php echo 8 * 2 * 2 * 2; ?> 

RIGHT SHIFT 
<?php echo 8 >> 3; //1 ?> 

//same as 
<?php echo ((8/2)/2)/2; //1 ?> 

*/
----------------
/*
PHP 支持一个执行运算符：反引号（``）。注意这不是单引号！PHP 将尝试将反引号中的内容作为外壳命令来执行，并将其输出信息返回（即，可以赋给一个变量而不是简单地丢弃到标准输出）。使用反引号运算符“`”的效果与函数 shell_exec() 相同。

*/
$output = `ls -al`;
echo "<pre>$output</pre>";
-----------------
/*
++$a	前加	$a 的值加一，然后返回 $a。
$a++	后加	返回 $a，然后将 $a 的值加一。
--$a	前减	$a 的值减一， 然后返回 $a。
$a--	后减	返回 $a，然后将 $a 的值减一。

$a = 5;
echo "Should be 5: " . $a++ . "<br />\n";
echo "Should be 6: " . $a . "<br />\n";

echo "<h3>Preincrement</h3>";
$a = 5;
echo "Should be 6: " . ++$a . "<br />\n";
echo "Should be 6: " . $a . "<br />\n";

echo "<h3>Postdecrement</h3>";
$a = 5;
echo "Should be 5: " . $a-- . "<br />\n";
echo "Should be 4: " . $a . "<br />\n";

echo "<h3>Predecrement</h3>";
$a = 5;
echo "Should be 4: " . --$a . "<br />\n";
echo "Should be 4: " . $a . "<br />\n";
*/

------------------------
/*
php 通过引用传递参数 ¶
*/

function add_some_extra(&$string)
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
echo $str;    // outputs 'This is a string, and something extra.'

------------------------

?>

<?php
//当定义一个常量时，通常使用类似如下代码来定义：

defined('YII_DEBUG') or define('YII_DEBUG', true);
//上面的代码等同于:

if (!defined('YII_DEBUG')) {
    define('YII_DEBUG', true);
}
//显然第一段代码更加简洁易懂。
//常量定义应该在入口脚本的开头，这样包含其他 PHP 文件时，常量就能生效。
?>

<?php
//Anonymous functions are great for events!

<?php

class Event {

  public static $events = array();
  
  public static function bind($event, $callback, $obj = null) {
    if (!self::$events[$event]) {
      self::$events[$event] = array();
    }
    
    self::$events[$event][] = ($obj === null)  ? $callback : array($obj, $callback);
  }
  
  public static function run($event) {
    if (!self::$events[$event]) return;
    
    foreach (self::$events[$event] as $callback) {
      if (call_user_func($callback) === false) break;
    }
  }

}

function hello() {
  echo "Hello from function hello()\n";
}

class Foo {
  function hello() {
    echo "Hello from foo->hello()\n";
  }
}

class Bar {
  function hello() {
    echo "Hello from Bar::hello()\n";
  }
}

$foo = new Foo();

// bind a global function to the 'test' event
Event::bind("test", "hello");

// bind an anonymous function
Event::bind("test", function() { echo "Hello from anonymous function\n"; });

// bind an class function on an instance
Event::bind("test", "hello", $foo);

// bind a static class function
Event::bind("test", "Bar::hello");

Event::run("test");

/* Output
Hello from function hello()
Hello from anonymous function
Hello from foo->hello()
Hello from Bar::hello()
*/

?>

<?php
class Cart
{
    const PRICE_BUTTER  = 1.00;
    const PRICE_MILK    = 3.00;
    const PRICE_EGGS    = 6.95;

    protected $products = array();
    
    public function add($product, $quantity)
    {
        $this->products[$product] = $quantity;
    }
}
?>

<?php
if (file_exists($compiled = __DIR__.'/compiled.php'))
{
	require $compiled;
}

if (null !== self::$loader) {
	return self::$loader;
}

$includePaths = require __DIR__ . '/include_paths.php';
array_push($includePaths, get_include_path());
set_include_path(join(PATH_SEPARATOR, $includePaths));
------------
 if ($this->useIncludePath && $file = stream_resolve_include_path($logicalPathPsr0)) {
            return $file;
        }
-----------
  if (file_exists($file = $dir . DIRECTORY_SEPARATOR . substr($logicalPathPsr4, $length))) {
                            return $file;
                        }
-----------
protected function registerBaseServiceProviders()
	{
		foreach (array('Event', 'Exception', 'Routing') as $name)
		{
			$this->{"register{$name}Provider"}();
		}
	}

--------------
$file = "{$path}/{$group}.php";
----------
/**
 * Load the given configuration group.
 *
 * @param  string  $environment
 * @param  string  $group
 * @param  string  $namespace
 * @return array
 */

/**
 * All of the registered packages.
 *
 * @var array
 */
class Counter
{
	//定义属性，包括一个静态变量
	private static $firstCount = 0;
	private $lastCount;

	//构造函数
	function __construct()
	{
		$this->lastCount = ++selft::$firstCount; //使用self来调用静态变量,使用self调用必须使用::(域运算符号)
	}
}
?>

<?php
public function __construct(ResponsePreparerInterface $responsePreparer,
                                ExceptionDisplayerInterface $plainDisplayer,
                                ExceptionDisplayerInterface $debugDisplayer,
                                $debug = true)
	{
		$this->debug = $debug;
		$this->plainDisplayer = $plainDisplayer;
		$this->debugDisplayer = $debugDisplayer;
		$this->responsePreparer = $responsePreparer;
	}
?>

<?php
public function get($path)
{
	if ($this->isFile($path)) return file_get_contents($path);

	throw new FileNotFoundException("File does not exist at path {$path}");
}
//
public function put($path, $contents)
{
	return file_put_contents($path, $contents);
}
//
public function delete($paths)
{
	$paths = is_array($paths) ? $paths : func_get_args();

	$success = true;

	foreach ($paths as $path) { if ( ! @unlink($path)) $success = false; }

	return $success;
}
if ( ! extension_loaded('mcrypt'))
{
	echo 'Mcrypt PHP extension required.'.PHP_EOL;

	exit(1);
}
	if (file_exists($routes)) require $routes;

?>

<?php
$string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);
//
public function url()
	{
		return rtrim(preg_replace('/\?.*/', '', $this->getUri()), '/');
	}
?>
<?php
public function segments()
	{
		$segments = explode('/', $this->path());

		return array_values(array_filter($segments, function($v) { return $v != ''; }));
	}
?>
<?php
/**
 * Flash a piece of data to the session.
 *
 * @param  string  $key
 * @param  mixed   $value
 * @return \Illuminate\Http\RedirectResponse
 */
public function with($key, $value = null)
{
	if (is_array($key))
	{
		foreach ($key as $k => $v) $this->with($k, $v);
	}
	else
	{
		$this->session->flash($key, $value);
	}

	return $this;
}
?>

<?php
	public function setContent($content)
	{
		$this->original = $content;

		// If the content is "JSONable" we will set the appropriate header and convert
		// the content to JSON. This is useful when returning something like models
		// from routes that will be automatically transformed to their JSON form.
		if ($this->shouldBeJson($content))
		{
			$this->headers->set('Content-Type', 'application/json');

			$content = $this->morphToJson($content);
		}

		// If this content implements the "RenderableInterface", then we will call the
		// render method on the object so we will avoid any "__toString" exceptions
		// that might be thrown and have their errors obscured by PHP's handling.
		elseif ($content instanceof RenderableInterface)
		{
			$content = $content->render();
		}

		return parent::setContent($content);
	}
?>

<?php
/**
	 * Determine if the given content should be turned into JSON.
	 *
	 * @param  mixed  $content
	 * @return bool
	 */
	protected function shouldBeJson($content)
	{
		return $content instanceof JsonableInterface ||
			   $content instanceof ArrayObject ||
			   is_array($content);
	}
?>

<?php
 const HTTP_CONTINUE = 100;
    const HTTP_SWITCHING_PROTOCOLS = 101;
    const HTTP_PROCESSING = 102;            // RFC2518
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_ACCEPTED = 202;
    const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
    const HTTP_NO_CONTENT = 204;
    const HTTP_RESET_CONTENT = 205;
    const HTTP_PARTIAL_CONTENT = 206;
    const HTTP_MULTI_STATUS = 207;          // RFC4918
    const HTTP_ALREADY_REPORTED = 208;      // RFC5842
    const HTTP_IM_USED = 226;               // RFC3229
    const HTTP_MULTIPLE_CHOICES = 300;
    const HTTP_MOVED_PERMANENTLY = 301;
    const HTTP_FOUND = 302;
    const HTTP_SEE_OTHER = 303;
    const HTTP_NOT_MODIFIED = 304;
    const HTTP_USE_PROXY = 305;
    const HTTP_RESERVED = 306;
    const HTTP_TEMPORARY_REDIRECT = 307;
 /**
     * Status codes translation table.
     *
     * The list of codes is complete according to the
     * {@link http://www.iana.org/assignments/http-status-codes/ Hypertext Transfer Protocol (HTTP) Status Code Registry}
     * (last updated 2012-02-13).
     *
     * Unless otherwise noted, the status code is defined in RFC2616.
     *
     * @var array
     */
    public static $statusTexts = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',            // RFC2518
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',          // RFC4918
        208 => 'Already Reported',      // RFC5842
        226 => 'IM Used',               // RFC3229
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Reserved',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',    // RFC7238
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',                                               // RFC2324
        422 => 'Unprocessable Entity',                                        // RFC4918
        423 => 'Locked',                                                      // RFC4918
        424 => 'Failed Dependency',                                           // RFC4918
        425 => 'Reserved for WebDAV advanced collections expired proposal',   // RFC2817
        426 => 'Upgrade Required',                                            // RFC2817
        428 => 'Precondition Required',                                       // RFC6585
        429 => 'Too Many Requests',                                           // RFC6585
        431 => 'Request Header Fields Too Large',                             // RFC6585
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates (Experimental)',                      // RFC2295
        507 => 'Insufficient Storage',                                        // RFC4918
        508 => 'Loop Detected',                                               // RFC5842
        510 => 'Not Extended',                                                // RFC2774
        511 => 'Network Authentication Required',                             // RFC6585
    );
?>


<?php

 /**
     * Returns the Response as an HTTP string.
     *
     * The string representation of the Response is the same as the
     * one that will be sent to the client only if the prepare() method
     * has been called before.
     *
     * @return string The Response as an HTTP string
     *
     * @see prepare()
     */
    public function __toString()
    {
        return
            sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText)."\r\n".
            $this->headers."\r\n".
            $this->getContent();
    }
?>

<?php
 /**
     * Sends HTTP headers.
     *
     * @return Response
     */
    public function sendHeaders()
    {
        // headers have already been sent by the developer
        if (headers_sent()) {
            return $this;
        }

        // status
        header(sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText), true, $this->statusCode);

        // headers
        foreach ($this->headers->allPreserveCase() as $name => $values) {
            foreach ($values as $value) {
                header($name.': '.$value, false, $this->statusCode);
            }
        }

        // cookies
        foreach ($this->headers->getCookies() as $cookie) {
            setcookie($cookie->getName(), $cookie->getValue(), $cookie->getExpiresTime(), $cookie->getPath(), $cookie->getDomain(), $cookie->isSecure(), $cookie->isHttpOnly());
        }

        return $this;
    }

?>


<?php
/*
* array_diff() 函数返回两个数组的差集数组。该数组包括了所有在被比较的数组中，但是不在任何其他参数数组中的键值。
在返回的数组中，键名保持不变。
*
*/
$a1=array(0=>"Cat",1=>"Dog",2=>"Horse");
$a2=array(3=>"Horse",4=>"Dog",5=>"Fish");
print_r(array_diff($a1,$a2));
/*
Array ( [0] => Cat )

*/
?>

<?php
 /**
     * Sets the response's cache headers (validation and/or expiration).
     *
     * Available options are: etag, last_modified, max_age, s_maxage, private, and public.
     *
     * @param array $options An array of cache options
     *
     * @return Response
     *
     * @throws \InvalidArgumentException
     *
     * @api
     */
    public function setCache(array $options)
    {
        if ($diff = array_diff(array_keys($options), array('etag', 'last_modified', 'max_age', 's_maxage', 'private', 'public'))) {
            throw new \InvalidArgumentException(sprintf('Response does not support the following options: "%s".', implode('", "', array_values($diff))));
        }

        if (isset($options['etag'])) {
            $this->setEtag($options['etag']);
        }

        if (isset($options['last_modified'])) {
            $this->setLastModified($options['last_modified']);
        }

        if (isset($options['max_age'])) {
            $this->setMaxAge($options['max_age']);
        }

        if (isset($options['s_maxage'])) {
            $this->setSharedMaxAge($options['s_maxage']);
        }

        if (isset($options['public'])) {
            if ($options['public']) {
                $this->setPublic();
            } else {
                $this->setPrivate();
            }
        }

        if (isset($options['private'])) {
            if ($options['private']) {
                $this->setPrivate();
            } else {
                $this->setPublic();
            }
        }

        return $this;
    }

?>

<?php
 /**
     * Is response invalid?
     *
     * @return bool
     *
     * @api
     */
    public function isInvalid()
    {
        return $this->statusCode < 100 || $this->statusCode >= 600;
    }
?>

<?php
 /**
     * Is the response OK?
     *
     * @return bool
     *
     * @api
     */
    public function isOk()
    {
        return 200 === $this->statusCode;
    }

    /**
     * Is the response forbidden?
     *
     * @return bool
     *
     * @api
     */
    public function isForbidden()
    {
        return 403 === $this->statusCode;
    }

    /**
     * Is the response a not found error?
     *
     * @return bool
     *
     * @api
     */
    public function isNotFound()
    {
        return 404 === $this->statusCode;
    }

?>
<?php
/**
     * Is the response empty?
     *
     * @return bool
     *
     * @api
     */
    public function isEmpty()
    {
        return in_array($this->statusCode, array(204, 304));
    }
?>


<?php

/**
     * Pushes a handler on to the stack.
     *
     * @param HandlerInterface $handler
     */
    public function pushHandler(HandlerInterface $handler)
    {
        array_unshift($this->handlers, $handler);
    }

    /**
     * Pops a handler from the stack
     *
     * @return HandlerInterface
     */
    public function popHandler()
    {
        if (!$this->handlers) {
            throw new \LogicException('You tried to pop from an empty handler stack.');
        }

        return array_shift($this->handlers);
    }
?>

<?php
/**
     * Adds a log record at an arbitrary level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  mixed   $level   The log level
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public function log($level, $message, array $context = array())
    {
        if (is_string($level) && defined(__CLASS__.'::'.strtoupper($level))) {
            $level = constant(__CLASS__.'::'.strtoupper($level));
        }

        return $this->addRecord($level, $message, $context);
    }

?>

<?php
    'mysql' => array(
	    		'driver'    => 'mysql',
	    		'host'      => 'localhost',
	    		'database'  => 'homestead',
	    		'username'  => 'homestead',
	    		'password'  => '',
	    		'charset'   => 'utf8',
	    		'collation' => 'utf8_unicode_ci',
	    		'prefix'    => '',
	    	    ),
    
    	    'pgsql' => array(
	    		'driver'   => 'pgsql',
	    		'host'     => 'localhost',
	    		'database' => 'homestead',
	    		'username' => 'homestead',
	    		'password' => '',
	    		'charset'  => 'utf8',
	    		'prefix'   => '',
	    		'schema'   => 'public',
	    	    ),
?>

<?php

    if (!defined('PHP_INT_SIZE')) {
	    define('PHP_INT_SIZE', 4);
    }

    if (!defined('MATH_BIGINTEGER_BASE') && MATH_BIGINTEGER_MODE == MATH_BIGINTEGER_MODE_INTERNAL) {
	    switch (PHP_INT_SIZE) {
	    case 8: // use 64-bit integers if int size is 8 bytes
		    define('MATH_BIGINTEGER_BASE',       31);
		    define('MATH_BIGINTEGER_BASE_FULL',  0x80000000);
		    define('MATH_BIGINTEGER_MAX_DIGIT',  0x7FFFFFFF);
		    define('MATH_BIGINTEGER_MSB',        0x40000000);
		    define('MATH_BIGINTEGER_MAX10',      1000000000);
		    define('MATH_BIGINTEGER_MAX10_LEN',  9);
		    // the largest digit that may be used in addition / subtraction
		    define('MATH_BIGINTEGER_MAX_DIGIT2', pow(2, 62));
		    break;
		    //case 4: // use 64-bit floats if int size is 4 bytes
	    default:
		    define('MATH_BIGINTEGER_BASE',       26);
		    define('MATH_BIGINTEGER_BASE_FULL',  0x4000000);
		    define('MATH_BIGINTEGER_MAX_DIGIT',  0x3FFFFFF);
		    define('MATH_BIGINTEGER_MSB',        0x2000000);
		    // 10**7 is the closest to 2**26 without passing it
		    define('MATH_BIGINTEGER_MAX10',      10000000);
		    define('MATH_BIGINTEGER_MAX10_LEN',  7);
		    // the largest digit that may be used in addition / subtraction
		    // we do pow(2, 52) instead of using 4503599627370496 directly because some
		    // PHP installations will truncate 4503599627370496.
		    define('MATH_BIGINTEGER_MAX_DIGIT2', pow(2, 52));
	    }
    }
?>


<?php

    function _trim($value)
    {
	    for ($i = count($value) - 1; $i >= 0; --$i) {
		    if ( $value[$i] ) {
			    break;
		    }
		    unset($value[$i]);
	    }

	    return $value;
    }

?>

<?php
    $hash = array(
	    0x6a09e667, 0xbb67ae85, 0x3c6ef372, 0xa54ff53a, 0x510e527f, 0x9b05688c, 0x1f83d9ab, 0x5be0cd19
    );
    // Initialize table of round constants
    // (first 32 bits of the fractional parts of the cube roots of the first 64 primes 2..311)
    static $k = array(
	    0x428a2f98, 0x71374491, 0xb5c0fbcf, 0xe9b5dba5, 0x3956c25b, 0x59f111f1, 0x923f82a4, 0xab1c5ed5,
	    0xd807aa98, 0x12835b01, 0x243185be, 0x550c7dc3, 0x72be5d74, 0x80deb1fe, 0x9bdc06a7, 0xc19bf174,
	    0xe49b69c1, 0xefbe4786, 0x0fc19dc6, 0x240ca1cc, 0x2de92c6f, 0x4a7484aa, 0x5cb0a9dc, 0x76f988da,
	    0x983e5152, 0xa831c66d, 0xb00327c8, 0xbf597fc7, 0xc6e00bf3, 0xd5a79147, 0x06ca6351, 0x14292967,
	    0x27b70a85, 0x2e1b2138, 0x4d2c6dfc, 0x53380d13, 0x650a7354, 0x766a0abb, 0x81c2c92e, 0x92722c85,
	    0xa2bfe8a1, 0xa81a664b, 0xc24b8b70, 0xc76c51a3, 0xd192e819, 0xd6990624, 0xf40e3585, 0x106aa070,
	    0x19a4c116, 0x1e376c08, 0x2748774c, 0x34b0bcb5, 0x391c0cb3, 0x4ed8aa4a, 0x5b9cca4f, 0x682e6ff3,
	    0x748f82ee, 0x78a5636f, 0x84c87814, 0x8cc70208, 0x90befffa, 0xa4506ceb, 0xbef9a3f7, 0xc67178f2
    );
?>

<?php
    if (!$this->seedUpdated && $this->seedLastUpdatedAt < time() - mt_rand(1, 10)) {
	    file_put_contents($this->seedFile, json_encode(array($this->seed, microtime(true))));
    }
?>

<?php
    /**
     *      * Compares two strings.
     *           *
     *                * This method implements a constant-time algorithm to compare strings.
     *                     * Regardless of the used implementation, it will leak length information.
     *                          *
     *                               * @param string $knownString The string of known length to compare against
     *                                    * @param string $userInput   The string that the user can control
     *                                         *
     *                                              * @return bool true if the two strings are the same, false otherwise
     *                                                   */

    public static function equals($knownString, $userInput)
    {
	    $knownString = (string) $knownString;
	    $userInput = (string) $userInput;

	    if (function_exists('hash_equals')) {
		    return hash_equals($knownString, $userInput);
	    }

	    $knownLen = strlen($knownString);
	    $userLen = strlen($userInput);

	    // Extend the known string to avoid uninitialized string offsets
	    $knownString .= $userInput;

	    // Set the result to the difference between the lengths
	    $result = $knownLen - $userLen;

	    // Note that we ALWAYS iterate over the user-supplied length
	    // This is to mitigate leaking length information
	    for ($i = 0; $i < $userLen; $i++) {
		    $result |= (ord($knownString[$i]) ^ ord($userInput[$i]));
	    }

	    // They are only identical strings if $result is exactly 0...
	    return 0 === $result;
    }
?>

<?php
class Tokenizer
{
	/**
	 * @var Handler\HandlerInterface[]
	 */
	private $handlers;

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		$patterns = new TokenizerPatterns();
		$escaping = new TokenizerEscaping($patterns);

		$this->handlers = array(
				new Handler\WhitespaceHandler(),
				new Handler\IdentifierHandler($patterns, $escaping),
				new Handler\HashHandler($patterns, $escaping),
				new Handler\StringHandler($patterns, $escaping),
				new Handler\NumberHandler($patterns),
				new Handler\CommentHandler(),
				);
	}

	/**
	 * Tokenize selector source code.
	 *
	 * @param Reader $reader
	 *
	 * @return TokenStream
	 */
	public function tokenize(Reader $reader)
	{
		$stream = new TokenStream();

		while (!$reader->isEOF()) {
			foreach ($this->handlers as $handler) {
				if ($handler->handle($reader, $stream)) {
					continue 2;
				}
			}

			$stream->push(new Token(Token::TYPE_DELIMITER, $reader->getSubstring(1), $reader->getPosition()));
			$reader->moveForward(1);
		}

		return $stream
			->push(new Token(Token::TYPE_FILE_END, null, $reader->getPosition()))
			->freeze();
	}
}
?>

<?php
if (class_exists('Swift', false)) {
	return;
}

// Load Swift utility class
require dirname(__FILE__).'/classes/Swift.php';

if (!function_exists('_swiftmailer_init')) {
	function _swiftmailer_init()
	{
		require dirname(__FILE__).'/swift_init.php';
	}
}
?>

<?php
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
		$vendorDir . '/ircmaxell/password-compat/lib/password.php',
		$vendorDir . '/swiftmailer/swiftmailer/lib/swift_required.php',
		$vendorDir . '/phpseclib/phpseclib/phpseclib/Crypt/Random.php',
		$vendorDir . '/laravel/framework/src/Illuminate/Support/helpers.php',
		$vendorDir . '/paf_util/paf_util/src/util_url.php',
	    );

?>

<?php

// 一个基本的购物车，包括一些已经添加的商品和每种商品的数量。
// 其中有一个方法用来计算购物车中所有商品的总价格，该方法使
// 用了一个 closure 作为回调函数。
class Cart
{
	const PRICE_BUTTER  = 1.00;
	const PRICE_MILK    = 3.00;
	const PRICE_EGGS    = 6.95;

	protected   $products = array();

	public function add($product, $quantity)
	{
		$this->products[$product] = $quantity;
	}

	public function getQuantity($product)
	{
		return isset($this->products[$product]) ? $this->products[$product] :
			FALSE;
	}

	public function getTotal($tax)
	{
		$total = 0.00;

		$callback =
			function ($quantity, $product) use ($tax, &$total)
			{
				$pricePerItem = constant(__CLASS__ . "::PRICE_" .
						strtoupper($product));
				$total += ($pricePerItem * $quantity) * ($tax + 1.0);
			};

		array_walk($this->products, $callback);
		return round($total, 2);;
	}
}

$my_cart = new Cart;

// 往购物车里添加条目
$my_cart->add('butter', 1);
$my_cart->add('milk', 3);
$my_cart->add('eggs', 6);

// 打出出总价格，其中有 5% 的销售税.
print $my_cart->getTotal(0.05) . "\n";
// 最后结果是 54.29
?>

<?php

 (new bll_auth())->setPassword($aUser['iAutoID'], $sPassword);
 (new bll_auth())->logoutAllDevice($aUser['iAutoID'], 2);

?>


