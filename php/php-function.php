<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: config_global_default.php 34020 2013-09-22 05:48:16Z nemohou $
 */

// ----------------------------  CONFIG DB  ----------------------------- //
// ----------------------------  数据库相关设置---------------------------- //

/**
 * 数据库主服务器设置, 支持多组服务器设置, 当设置多组服务器时, 则会根据分布式策略使用某个服务器
 * @example
 * $_config['db']['1']['dbhost'] = 'localhost'; // 服务器地址
 * $_config['db']['1']['dbuser'] = 'root'; // 用户
 * $_config['db']['1']['dbpw'] = 'root';// 密码
 * $_config['db']['1']['dbcharset'] = 'gbk';// 字符集
 * $_config['db']['1']['pconnect'] = '0';// 是否持续连接
 * $_config['db']['1']['dbname'] = 'x1';// 数据库
 * $_config['db']['1']['tablepre'] = 'pre_';// 表名前缀
 *
 * $_config['db']['2']['dbhost'] = 'localhost';
 * ...
 *
 */
?>
<?php
	//shuffle — 将数组打乱

//bool shuffle ( array &$array )

$numbers = range(1, 20);
shuffle($numbers);
foreach ($numbers as $number) {
    echo "$number ";
}
//-------------
/*
int crc32 ( string $str )
生成 str 的 32 位循环冗余校验码多项式。这通常用于检查传输的数据是否完整。
*/

?>
//--------------
<?php 
$data = "hello"; 

foreach (hash_algos() as $v) { 
        $r = hash($v, $data, false); 
        printf("%-12s %3d %s\n", $v, strlen($r), $r); 
} 
?> 
/*
which produce (long hashes are cropped) 

md2           32 a9046c73e00331af68917d3804f70655                   
md4           32 866437cb7a794bce2b727acc0362ee27 
md5           32 5d41402abc4b2a76b9719d911017c592 
sha1          40 aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d 
sha256        64 2cf24dba5fb0a30e26e83b2ac5b9e29e1b161e5c1fa7425e730 
sha384        96 59e1748777448c69de6b800d7a33bbfb9ff1b463e44354c3553 
sha512       128 9b71d224bd62f3785d96d46ad3ea3d73319bfbc2890caadae2d 
ripemd128     32 789d569f08ed7055e94b4289a4195012 
ripemd160     40 108f07b8382412612c048d07d13f814118445acd 
ripemd256     64 cc1d2594aece0a064b7aed75a57283d9490fd5705ed3d66bf9a 
ripemd320     80 eb0cf45114c56a8421fbcb33430fa22e0cd607560a88bbe14ce 
whirlpool    128 0a25f55d7308eca6b9567a7ed3bd1b46327f0f1ffdc804dd8bb 
tiger128,3    32 a78862336f7ffd2c8a3874f89b1b74f2 
tiger160,3    40 a78862336f7ffd2c8a3874f89b1b74f2f27bdbca 
tiger192,3    48 a78862336f7ffd2c8a3874f89b1b74f2f27bdbca39660254 
tiger128,4    32 1c2a939f230ee5e828f5d0eae5947135 
tiger160,4    40 1c2a939f230ee5e828f5d0eae5947135741cd0ae 
tiger192,4    48 1c2a939f230ee5e828f5d0eae5947135741cd0aefeeb2adc 
snefru        64 7c5f22b1a92d9470efea37ec6ed00b2357a4ce3c41aa6e28e3b 
gost          64 a7eb5d08ddf2363f1ea0317a803fcef81d33863c8b2f9f6d7d1 
adler32        8 062c0215 
crc32          8 3d653119 
crc32b         8 3610a686 
haval128,3    32 85c3e4fac0ba4d85519978fdc3d1d9be 
haval160,3    40 0e53b29ad41cea507a343cdd8b62106864f6b3fe 
haval192,3    48 bfaf81218bbb8ee51b600f5088c4b8601558ff56e2de1c4f 
haval224,3    56 92d0e3354be5d525616f217660e0f860b5d472a9cb99d6766be 
haval256,3    64 26718e4fb05595cb8703a672a8ae91eea071cac5e7426173d4c 
haval128,4    32 fe10754e0b31d69d4ece9c7a46e044e5 
haval160,4    40 b9afd44b015f8afce44e4e02d8b908ed857afbd1 
haval192,4    48 ae73833a09e84691d0214f360ee5027396f12599e3618118 
haval224,4    56 e1ad67dc7a5901496b15dab92c2715de4b120af2baf661ecd92 
haval256,4    64 2d39577df3a6a63168826b2a10f07a65a676f5776a0772e0a87 
haval128,5    32 d20e920d5be9d9d34855accb501d1987 
haval160,5    40 dac5e2024bfea142e53d1422b90c9ee2c8187cc6 
haval192,5    48 bbb99b1e989ec3174019b20792fd92dd67175c2ff6ce5965 
haval224,5    56 aa6551d75e33a9c5cd4141e9a068b1fc7b6d847f85c3ab16295 
haval256,5    64 348298791817d5088a6de6c1b6364756d404a50bd64e645035f
*/

<?php
$foo = 'hello world!';
$foo = ucfirst($foo);             // Hello world!

$bar = 'HELLO WORLD!';
$bar = ucfirst($bar);             // HELLO WORLD!
$bar = ucfirst(strtolower($bar)); // Hello world!

/*
lcfirst() - 使一个字符串的第一个字符小写
strtolower() - 将字符串转化为小写
strtoupper() - 将字符串转化为大写
ucwords() - 将字符串中每个单词的首字母转换为大写
*/
?>

<?php
//strpos — 查找字符串首次出现的位置
?>
<?php
/*
If search and replace are arrays, then str_replace() takes a value from each array and uses them to search and replace on subject. If replace has fewer values than search, then an empty string is used for the rest of replacement values. If search is an array and replace is a string, then this replacement string is used for every value of search. The converse would not make sense, though.


*/

function durlencode($url) {
	static $fix = array('%21', '%2A','%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
	static $replacements = array('!', '*', ';', ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
	return str_replace($fix, $replacements, urlencode($url));
}
?>

<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: config_global_default.php 34020 2013-09-22 05:48:16Z nemohou $
 */

$_config = array();

// ----------------------------  CONFIG DB  ----------------------------- //
// ----------------------------  数据库相关设置---------------------------- //

/**
 * 数据库主服务器设置, 支持多组服务器设置, 当设置多组服务器时, 则会根据分布式策略使用某个服务器
 * @example
 * $_config['db']['1']['dbhost'] = 'localhost'; // 服务器地址
 * $_config['db']['1']['dbuser'] = 'root'; // 用户
 * $_config['db']['1']['dbpw'] = 'root';// 密码
 * $_config['db']['1']['dbcharset'] = 'gbk';// 字符集
 * $_config['db']['1']['pconnect'] = '0';// 是否持续连接
 * $_config['db']['1']['dbname'] = 'x1';// 数据库
 * $_config['db']['1']['tablepre'] = 'pre_';// 表名前缀
 *
 * $_config['db']['2']['dbhost'] = 'localhost';
 * ...
 *
 */
$_config['db'][1]['dbhost']  		= 'localhost';
$_config['db'][1]['dbuser']  		= 'root';
$_config['db'][1]['dbpw'] 	 	= 'root';
$_config['db'][1]['dbcharset'] 		= 'utf8';
$_config['db'][1]['pconnect'] 		= 0;
$_config['db'][1]['dbname']  		= 'ultrax';
$_config['db'][1]['tablepre'] 		= 'pre_';
?>

<?php
		global $_G;
		$_G = array(
			'uid' => 0,
			'username' => '',
			'adminid' => 0,
			'groupid' => 1,
			'sid' => '',
			'formhash' => '',
			'connectguest' => 0,
			'timestamp' => TIMESTAMP,
			'starttime' => microtime(true),
			'clientip' => $this->_get_client_ip(),
			'remoteport' => $_SERVER['REMOTE_PORT'],
			'referer' => '',
			'charset' => '',
			'gzipcompress' => '',
			'authkey' => '',
			'timenow' => array(),
			'widthauto' => 0,
			'disabledwidthauto' => 0,

			'PHP_SELF' => '',
			'siteurl' => '',
			'siteroot' => '',
			'siteport' => '',

			'pluginrunlist' => !defined('PLUGINRUNLIST') ? array() : explode(',', PLUGINRUNLIST),

			'config' => array(),
		);

		$this->var = & $_G;
		
		$_config = array();
		@include DISCUZ_ROOT.'./config/config_global.php';
		if(empty($_config)) {
			if(!file_exists(DISCUZ_ROOT.'./data/install.lock')) {
				header('location: install');
				exit;
			} else {
				system_error('config_notfound');
			}
		}	

		$this->config = & $_config;
		$this->var['config'] = & $_config;

?>

<?php
/**
*	Usage:	$version = getglobal('setting/version');

*/
function getglobal($key, $group = null) {
	global $_G;
	$key = explode('/', $group === null ? $key : $group.'/'.$key);
	$v = &$_G;
	foreach ($key as $k) {
		if (!isset($v[$k])) {
			return null;
		}
		$v = &$v[$k];
	}
	return $v;
}

?>

<?php
/**
*
*	Usage:		setglobal('gzipcompress', $allowgzip);
*
*/
function setglobal($key , $value, $group = null) {
	global $_G;
	$key = explode('/', $group === null ? $key : $group.'/'.$key);
	$p = &$_G;
	foreach ($key as $k) {
		if(!isset($p[$k]) || !is_array($p[$k])) {
			$p[$k] = array();
		}
		$p = &$p[$k];
	}
	$p = $value;
	return true;
}
?>

<?php
/**
*
*		$addname = getgpc('addname', 'P');
*/

function getgpc($k, $type='GP') {
	$type = strtoupper($type);
	switch($type) {
		case 'G': $var = &$_GET; break;
		case 'P': $var = &$_POST; break;
		case 'C': $var = &$_COOKIE; break;
		default:
			if(isset($_GET[$k])) {
				$var = &$_GET;
			} else {
				$var = &$_POST;
			}
			break;
	}

	return isset($var[$k]) ? $var[$k] : NULL;

}

?>

<?php
/**
*
* 检查网页某个请求模块是否是存在的
*/
$m = getgpc('m');
if(in_array($m, array('admin', 'app', 'badword', 'cache', 'db', 'domain', 'frame', 'log', 'note', 'feed', 'mail', 'setting', 'user', 'credit', 'seccode', 'tool', 'plugin', 'pm'))) {
		include UC_ROOT."control/admin/$m.php";

}else{
	exit('Module not found!');

}
?>

<?php
/**
*
*	转义传入数据，Usages:
*	 $_GET		= daddslashes($_GET, 1, TRUE);
*	 $_POST		= daddslashes($_POST, 1, TRUE);
*	 $_COOKIE	= daddslashes($_COOKIE, 1, TRUE);
*	 $_SERVER	= daddslashes($_SERVER);
*	 $_FILES		= daddslashes($_FILES);
*	 $_REQUEST	= daddslashes($_REQUEST, 1, TRUE);

*      	* $_GET = daddslashes($_GET);
*
*/

function daddslashes($string, $force = 1) {
	if(is_array($string)) {
		$keys = array_keys($string);
		foreach($keys as $key) {
			$val = $string[$key];
			unset($string[$key]);
			$string[addslashes($key)] = daddslashes($val, $force);
		}
	} else {
		$string = addslashes($string);
	}
	return $string;
}
?>

<?php
/**
*	  HTML转义字符
*	  @param $string - 字符串
*	  @return 返回转义好的字符串
*/
?>
<?php
header("HTTP/1.0 404 Not Found");
header('HTTP/1.0 401 Unauthorized'); 

?>

<?php
header("Location: http://www.example.com/"); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
exit;
?>

<?php
/**
*
*	For large files (100+ MBs), I found that it is essential to flush the file content ASAP, otherwise the download dialog doesn't show until a long time or never. 

*/
header("Content-Disposition: attachment; filename=" . urlencode($file));    
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");             
header("Content-Length: " . filesize($file));
flush(); // this doesn't really matter.

$fp = fopen($file, "r"); 
while (!feof($fp))
{
    echo fread($fp, 65536); 
    flush(); // this is essential for large downloads
}  
fclose($fp); 
?>

<?php
/**
*
* This is the Headers to force a browser to use fresh content (no caching) in HTTP/1.0 and HTTP/1.1: 
*
*/

header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); 
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' ); 
header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' ); 
?>

<?php
/**
*	  设置php头 
*	  @param $string - 字符串
*	  @useage:	dheader('location: '.$attachurl.$thumbfile);

		dheader('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		dheader('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		dheader('Cache-Control: no-cache, must-revalidate');
		dheader('Pragma: no-cache');
		dheader('Content-Encoding: none');
		dheader('Content-Length: '.strlen($plugin_export));
		dheader('Content-Disposition: attachment; filename='.$filename);
		dheader('Content-Type: text/xml');
*/
function dheader($string, $replace = true, $http_response_code = 0) {
	$islocation = substr(strtolower(trim($string)), 0, 8) == 'location';

	$string = str_replace(array("\r", "\n"), array('', ''), $string);

	if(empty($http_response_code) || PHP_VERSION < '4.3' ) {
		@header($string, $replace);
	} else {
		@header($string, $replace, $http_response_code);
	}

	if($islocation) {
		exit();
	}
}
?>
<?php
/**
*	  检测字符串是否处于,另一个字符串或字符串数组中
*	  @param $string - 字符串	$arr - 字符串或数组	$returnvalue - 是否返回值	
	  @useage:	if(($v = dstrpos($useragent, $touchbrowser_list, true))){

			if(dstrpos($useragent, $pad_list)) {

*/
function dstrpos($string, $arr, $returnvalue = false) {
	if(empty($string)) return false;
	foreach((array)$arr as $v) {
		if(strpos($string, $v) !== false) {
			$return = $returnvalue ? $v : true;
			return $return;
		}
	}
	return false;
}
?>


<?php

function checkmobile() {
	/*检测是否手机端访问*/
	global $_G;
	$mobile = array();
	static $touchbrowser_list =array('iphone', 'android', 'phone', 'mobile', 'wap', 'netfront', 'java', 'opera mobi', 'opera mini',
				'ucweb', 'windows ce', 'symbian', 'series', 'webos', 'sony', 'blackberry', 'dopod', 'nokia', 'samsung',
				'palmsource', 'xda', 'pieplus', 'meizu', 'midp', 'cldc', 'motorola', 'foma', 'docomo', 'up.browser',
				'up.link', 'blazer', 'helio', 'hosin', 'huawei', 'novarra', 'coolpad', 'webos', 'techfaith', 'palmsource',
				'alcatel', 'amoi', 'ktouch', 'nexian', 'ericsson', 'philips', 'sagem', 'wellcom', 'bunjalloo', 'maui', 'smartphone',
				'iemobile', 'spice', 'bird', 'zte-', 'longcos', 'pantech', 'gionee', 'portalmmm', 'jig browser', 'hiptop',
				'benq', 'haier', '^lct', '320x320', '240x320', '176x220', 'windows phone');
	static $wmlbrowser_list = array('cect', 'compal', 'ctl', 'lg', 'nec', 'tcl', 'alcatel', 'ericsson', 'bird', 'daxian', 'dbtel', 'eastcom',
			'pantech', 'dopod', 'philips', 'haier', 'konka', 'kejian', 'lenovo', 'benq', 'mot', 'soutec', 'nokia', 'sagem', 'sgh',
			'sed', 'capitel', 'panasonic', 'sonyericsson', 'sharp', 'amoi', 'panda', 'zte');

	static $pad_list = array('ipad');

	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);

	if(dstrpos($useragent, $pad_list)) {
		return false;
	}
	if(($v = dstrpos($useragent, $touchbrowser_list, true))){
		$_G['mobile'] = $v;
		return '2';
	}
	if(($v = dstrpos($useragent, $wmlbrowser_list))) {
		$_G['mobile'] = $v;
		return '3'; //wml版
	}

	$brower = array('mozilla', 'chrome', 'safari', 'opera', 'm3gate', 'winwap', 'openwave', 'myop');
	if(dstrpos($useragent, $brower)) return false;

	$_G['mobile'] = 'unknown';
	if(isset($_G['mobiletpl'][$_GET['mobile']])) {
		return true;
	} else {
		return false;
	}
}

?>


<?php
function isemail($email) {
	return strlen($email) > 6 && strlen($email) <= 32 && preg_match("/^([A-Za-z0-9\-_.+]+)@([A-Za-z0-9\-]+[.][A-Za-z0-9\-.]+)$/", $email);
}
?>

<?php
//usage:random(5)
function random($length, $numeric = 0) {
	$seed = base_convert(md5(microtime().$_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
	$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
	if($numeric) {
		$hash = '';
	} else {
		$hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
		$length--;
	}
	$max = strlen($seed) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $seed{mt_rand(0, $max)};
	}
	return $hash;
}
?>

<?php
function strexists($string, $find) {
	return !(strpos($string, $find) === FALSE);
}

?>

<?php
$uid = sprintf("%09d", $uid);
		$dir1 = substr($uid, 0, 3);
		$dir2 = substr($uid, 3, 2);
		$dir3 = substr($uid, 5, 2);
?>

<?php
//usage:$attachsize = sizecount($attachment['filesize']);
function sizecount($size) {
	if($size >= 1073741824) {
		$size = round($size / 1073741824 * 100) / 100 . ' GB';
	} elseif($size >= 1048576) {
		$size = round($size / 1048576 * 100) / 100 . ' MB';
	} elseif($size >= 1024) {
		$size = round($size / 1024 * 100) / 100 . ' KB';
	} else {
		$size = intval($size) . ' Bytes';
	}
	return $size;
}
?>

<?php
//usage:				ftpcmd('delete', $value['pic']);

//		ftpcmd('upload', $testfile);
//			$ftp = ftpcmd('object');
//	
function ftpcmd($cmd, $arg1 = '') {
	static $ftp;
	$ftpon = getglobal('setting/ftp/on');
	if(!$ftpon) {
		return $cmd == 'error' ? -101 : 0;
	} elseif($ftp == null) {
		$ftp = & discuz_ftp::instance();
	}
	if(!$ftp->enabled) {
		return $ftp->error();
	} elseif($ftp->enabled && !$ftp->connectid) {
		$ftp->connect();
	}
	switch ($cmd) {
		case 'upload' : return $ftp->upload(getglobal('setting/attachdir').'/'.$arg1, $arg1); break;
		case 'delete' : return $ftp->ftp_delete($arg1); break;
		case 'close'  : return $ftp->ftp_close(); break;
		case 'error'  : return $ftp->error(); break;
		case 'object' : return $ftp; break;
		default       : return false;
	}

}


?>
<?php
/**
*array_pop:array_pop — 将数组最后一个单元弹出（出栈）
*
*/
 $aTmp = explode('.', $p_sURL);
     $sExt = array_pop($aTmp);
     if ('js' == $sExt or 'css' == $sExt) {
         return array(
             $p_sURL
         );

?>

<?php
/*
*crypt() 函数返回使用 DES、Blowfish 或 MD5 加密的字符串。
*确切的算法依赖于 salt 参数的格式和长度。
*/
private function encryptPassword($p_sPassword){
        if (!isset($p_sPassword{0})) {
            return '';
        }

        $sSaltIndex = ord($p_sPassword{0}) % 4;
        $aSaltMap = [ 
            '9a',
            '_J9..ae2m',
            '$1$r82msle$',
            '$2a$07$tsitlrrsouslolinesgesamyf$',
        ];

        $sSalt = $aSaltMap[$sSaltIndex];
        return crypt($p_sPassword, $sSalt);
    }
?>

<?php
strrev()// 函数反转字符串。
?>

<?php
/**
     * 客户端密码加密算法。
     * @param string $p_sPassword
     * @return string
     */
    private function clientEncryptPassword($p_sPassword){
        $sTmp1 = md5($p_sPassword);
        $sTmp2 = strrev($sTmp1) . 'paf';
        $sResult = md5($sTmp2);

        return $sResult;
    }
?>
<?php
/**
	 * 获取所有业务ID
	 * @param int $p_iBID
	 * @return true/false
	 */
	private function chkBID($p_iBID){
		$oReflect = new ReflectionClass($this);
		$aBIDs = $oReflect->getConstants();
		if(in_array($p_iBID, $aBIDs)){
			return true;
		}else{
			return false;
		}
	}
?>

<?php
	public static function newInstance($subject = null, $body = null, $contentType = null, $charset = null)
	{
		return new self($subject, $body, $contentType, $charset);
	}
?>

<?php
 /**
     * Returns a singleton of the DependencyContainer.
     *
     * @return Swift_DependencyContainer
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

 public function listItems()
    {
        return array_keys($this->_store);
    }
 /**
     * Test if an item is registered in this container with the given name.
     *
     * @see register()
     *
     * @param string $itemName
     *
     * @return bool
     */
    public function has($itemName)
    {
        return array_key_exists($itemName, $this->_store)
            && isset($this->_store[$itemName]['lookupType']);
    }


?>

<?php
    public function __construct($message = "", $code = 0, $severity = 1, $filename = __FILE__, $lineno = __LINE__, $previous) { }

?>

<?php
function dsign($str, $length = 16){
	return substr(md5($str.getglobal('config/security/authkey')), 0, ($length ? max(8, $length) : 16));
}

?>

<?php
/**
     * 清除字符串中的HTML标签标记，但是允许指定保留不被清除的一些标签
     * 
     * @param  string $p_sStr 源字符串
     * @param  array  $p_aKeepingTags 需要保留不被清除的标签
     * @example
     * <code>
     * clearHTMLTagsOfNonKeeing($str, array('p', 'br')); // 保留p标签和br标签不被清除
     * </code>
     * @return array
     * @author wanglong <wanglong@pinganfang.com>
     */
    public static function clearHTMLTagsOfNonKeeing($p_sStr, $p_aKeepingTags = array())
    {
        static $aTagMaps = array(
            'p'    => array('<p>', '</p>'),
            'br'   => array('<br>', '<br/>'),
            'span' => array('<span>', '</span>'),
            'div'  => array('<div>', '</div>')
        );

        $aKeepingCached = array();

        foreach ($p_aKeepingTags as $sKey)
        {
            if (isset($aTagMaps[$sKey]))
            {
                foreach ($aTagMaps[$sKey] as $aTag)
                {
                    if ( ! isset($aKeepingCached[$aTag]))
                    {
                        $sMD5 = md5($aTag);
                        $aKeepingCached[$aTag] = "__TEMP_REPLACE__{$sMD5}__END__";
                        $p_sStr = str_replace($aTag, "__TEMP_REPLACE__{$sMD5}__END__", $p_sStr);
                    }
                }
            }
        }

        $p_sStr = strip_tags($p_sStr);

        foreach ($aKeepingCached as $sTag => $sTemp)
        {
            $p_sStr = str_replace($sTemp, $sTag, $p_sStr);
        }

        return $p_sStr;
    }
?>


<?php
/**
     * 将手机号弱显示
     *
     * @param  string $p_sPhoneNumber 源手机号码
     * @return string
     * @author wanglong <wanglong@pinganfang.com>
     */
    public static function phoneNumberProtected($p_sPhoneNumber)
    {
        return preg_replace("/(\d{3})\d{4}/", "$1****", $p_sPhoneNumber);
    }
?>

<?php
 /**
     * 返回字符串长度（UTF8 支持中文）
     * 
     * @param  string $p_sStr 源字符串
     * @return integer
     * @author wanglong <wanglong@pinganfang.com>
     */
    public static function utf8StrLen($p_sStr = null)
    {
        preg_match_all("/./us", $p_sStr, $aMatch);
        return count($aMatch[0]);
    }
?>

<?php
 /**
     * 格式化时间
     * 小于1分钟显示单位秒
     * 小于1小时显示单位分钟
     * 小于天显示单位小时
     * 小于月显示单位天
     * //小于年显示单位月
     * //大于年显示单位年
     * @param int $p_iPostTime
     * @param int $p_iTime
     * @author jiangshengjun
     * @return string
     */
    public static  function formatPostTime ( $p_iPostTime, $p_iTime = null ) {
        $p_iPostTime = intval($p_iPostTime);

        if( $p_iTime > 0 ) {
            $time = $p_iTime;
        }else{
            $time = time();
        }

        $diff = $time - $p_iPostTime;

        if( $diff < 60 ) {
            $n = $diff;
            $s = '秒';
        }elseif( $diff < 3600 ) {
            $n = floor( $diff / 60);
            $s = '分钟';
        }elseif($diff < 24 * 3600) {
            $n = floor( $diff / 3600);
            $s = '小时';
        }else{
            $n = floor( $diff / (24 * 3600));
            $s = '天';
        }

        /**
        elseif($diff < 30 * 24 * 3600) {
            $n = floor( $diff / (24 * 3600));
            $s = '天';
        }
        elseif($diff < 365 * 24 * 3600) {
            $n = floor( $diff / (30 * 24 * 3600));
            $s = '个月';
        }else{
            $n = floor( $diff / (365 * 24 * 3600));
            $s = '年';
        }
        */

        return $n . $s;
    }
?>

<?php
/***
     * 全角半角转
     *
     * @param string $p_sStr
     * @return string
     *
     */
    public static function makeSemiangle($p_sStr)
    {
        $arr = array('０' => '0', '１' => '1', '２' => '2', '３' => '3', '４' => '4',
            '５' => '5', '６' => '6', '７' => '7', '８' => '8', '９' => '9',
            'Ａ' => 'A', 'Ｂ' => 'B', 'Ｃ' => 'C', 'Ｄ' => 'D', 'Ｅ' => 'E',
            'Ｆ' => 'F', 'Ｇ' => 'G', 'Ｈ' => 'H', 'Ｉ' => 'I', 'Ｊ' => 'J',
            'Ｋ' => 'K', 'Ｌ' => 'L', 'Ｍ' => 'M', 'Ｎ' => 'N', 'Ｏ' => 'O',
            'Ｐ' => 'P', 'Ｑ' => 'Q', 'Ｒ' => 'R', 'Ｓ' => 'S', 'Ｔ' => 'T',
            'Ｕ' => 'U', 'Ｖ' => 'V', 'Ｗ' => 'W', 'Ｘ' => 'X', 'Ｙ' => 'Y',
            'Ｚ' => 'Z', 'ａ' => 'a', 'ｂ' => 'b', 'ｃ' => 'c', 'ｄ' => 'd',
            'ｅ' => 'e', 'ｆ' => 'f', 'ｇ' => 'g', 'ｈ' => 'h', 'ｉ' => 'i',
            'ｊ' => 'j', 'ｋ' => 'k', 'ｌ' => 'l', 'ｍ' => 'm', 'ｎ' => 'n',
            'ｏ' => 'o', 'ｐ' => 'p', 'ｑ' => 'q', 'ｒ' => 'r', 'ｓ' => 's',
            'ｔ' => 't', 'ｕ' => 'u', 'ｖ' => 'v', 'ｗ' => 'w', 'ｘ' => 'x',
            'ｙ' => 'y', 'ｚ' => 'z',
            '（' => '(', '）' => ')', '〔' => '[', '〕' => ']', '【' => '[',
            '】' => ']', '〖' => '[', '〗' => ']', '“' => '[', '”' => ']',
            '‘' => '[', '’' => ']', '｛' => '{', '｝' => '}', '《' => '<',
            '》' => '>',
            '％' => '%', '＋' => '+', '—' => '-', '－' => '-', '～' => '-',
            '：' => ':', '。' => '.', '、' => ',', '，' => '.', '、' => '.',
            '；' => ',', '？' => '?', '！' => '!', '…' => '-', '‖' => '|',
            '”' => '"', '’' => '`', '‘' => '`', '｜' => '|', '〃' => '"',
            '　' => ' ','＄'=>'$','＠'=>'@','＃'=>'#','＾'=>'^','＆'=>'&','＊'=>'*',
            '＂'=>'"');

        return strtr($p_sStr, $arr);
    }
?>

<?php
 /***
     * 清除符号
     *
     * @param string $p_sStr
     * @return string
     *
     */
    public static function clearSymbol($p_sStr) {
        $aStr = array(  '\r\n' => '',
                        '\r'   => '',
                        '\n'   => '',
                        '%'    => '',
                        '.'    => '',
                        '('    => '',
                        ')'    => '',
                        ':'    => '',
                        ';'    => '',
                        '&'    => '',
                        "\x07" => '',
                        "\x15" => '',
                        '!'    => '',
                        '\''   => '',
                        '"'    => '',
                        '#'    => '',
                        '^'    => '',
                        '*'    => '',
                        '_'    => '',
                        '='    => '',
                        '+'    => '',
                        '\\'   => '',
                        '?'    => '',
                        '|'    => '',
                        '<'    => '',
                        '>'    => '',
                        '{'    => '',
                        '}'    => '',
                        '’'    => '',
                        '`'    => '',
                        '~'    => '',
                        '“'    => '',
                        '?'    => '',
                        '$'    => '');
        $sStr = self::makeSemiangle($p_sStr);
        $sStr = strtr($sStr, $aStr);
        return $sStr;
    }
?>

<?php
 /**
     * 截取指定长度的字符串，末尾省略号
     * @param $str
     * @param int $start
     * @param $length
     * @param string $charset
     * @param bool $suffix
     * @return string
     * @author liujian <liujian@pinganfang.com>
     */
    public static  function cSubString($p_sString, $p_iStart=0, $p_iLength, $p_sCharset = "utf-8", $p_bSuffix=true) {
        if(function_exists("mb_substr")) {
            if(mb_strlen($p_sString, $p_sCharset) <= $p_iLength) return $p_sString;
            $slice = mb_substr($p_sString, $p_iStart, $p_iLength, $p_sCharset);
        } else {
            $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk']          = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5']          = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$p_sCharset], $p_sString, $match);

            if(count($match[0]) <= $p_iLength) return $p_sString;
            $slice = join("",array_slice($match[0], $p_iStart, $p_iLength));
        }
        if($p_bSuffix) return $slice."…";
        return $slice;
    }
?>

<?php
public static function __callStatic($method, $args)
	{
		$instance = static::getFacadeRoot();

		switch (count($args))
		{
			case 0:
				return $instance->$method();

			case 1:
				return $instance->$method($args[0]);

			case 2:
				return $instance->$method($args[0], $args[1]);

			case 3:
				return $instance->$method($args[0], $args[1], $args[2]);

			case 4:
				return $instance->$method($args[0], $args[1], $args[2], $args[3]);

			default:
				return call_user_func_array(array($instance, $method), $args);
		}
	}
?>

<?php
function reverse($str)
{
    return join('', array_reverse(str_split($str)));
}

function reverse($str)
{
    for ($i = strlen($str) - 1, $out = ''; $i >= 0; $out .= $str[$i--]) {}

    return $out;
}

function reverse($str)
{
    list($out, $len) = [ str_split($str), strlen($str) - 1 ];

    array_walk($out, function(&$ele, $idx) use ($out, $len) // copy, not ref.
    {
        $ele = $out[$len - $idx];
    });

    return join('', $out);
}
?>

<?php
function str2bin($str)
{
	return array_reduce(unpack('C*', $str), function($bin, $chr)
			{
			return $bin . str_pad(decbin($chr), 8, 0, STR_PAD_LEFT);
			}, '');
}
?>

<?php
public function isAlpha()
{
	return preg_match('/^[A-z]+$/', $this->subject);
}

public function isNumber()
{
	return preg_match('/^[0-9]+$/', $this->subject);
}
?>

<?php
static function getExtension($p_sFile)
{
	$sInfo = pathinfo($p_sFile);
	return $sInfo['extension'];
}
?>

<?php
/**
 * 添加过滤器
 * @param string $p_sField
 * @param string $p_sOperator
 * @param value $p_mValue
 */
function addFilter($p_sField, $p_sOperator, $p_mValue){
	$p_sOperator = trim($p_sOperator);
	if(isset($this->_aTblField[$p_sField])){
		if(in_array($p_sOperator, array( 
						'=',
						'!=',
						'<',
						'>',
						'<=',
						'>=',
						'in',
						'like' 
					       ))){
			$this->_aFilter[] = array( 
					'sField' => $p_sField,
					'sOperator' => $p_sOperator,
					'mValue' => $p_mValue 
					);
		}else{
			throw new Exception($this->_sClassName . ': you use an unexpected operator(' . $p_sOperator . ') of ORM instance.');
			return false;
		}
	}else{
		throw new Exception($this->_sClassName . ': you add an unexpected filter(' . $p_sField . ') to ORM instance.');
		return false;
	}
}

/**
 * 清除过滤器
 * @param string $p_sField
 */
function delFilter($p_sField){
	foreach ($this->_aFilter as $key => $value) {
		if ($value['sField'] == $p_sField) {
			unset($this->_aFilter[$key]);
			return;
		}
	}
}
?>

<?php
 public function generatePayURL($p_aParams = [])
    {
        load_lib('/util/sign');
        $p_aParams['iBusinessID']  = (string) self::PAY_ID;
        $p_aParams['iUserID']      = (string) $this->_iUserID;
        $p_aParams['sProductName'] = '信用卡付房租';
        $p_aParams['sProductInfo'] = '信用卡付房租';
        $p_aParams['sBgUrl']       = util_url::getURL('/payment/rent', 'callback', [], false, 1); // 带有城市ID防止回调报302，新版kernel待修复
        $p_aParams['sPageUrl']     = util_url::getMemberURL('/payment/rent', 'detail', ['id' => $p_aParams['sBusinessOrderID']]);
        $p_aParams['iRequestTime'] = (string) time();
        $p_aParams['sSign']        = util_sign::signArray($p_aParams, self::PAY_TOKEN);

        $sQueryString = http_build_query($p_aParams);
        $sUrl = util_url::getPayCenterURL('/order', 'create');
        return $sUrl . '?' . $sQueryString;
    }
?>

<?php
    public function createBaseInfo($p_aData)
    {
        $p_aData['iUserID']      = $this->_iUserID;
        $p_aData['iStatus']      = 2; // 订单正在创建中
        $p_aData['iAuditStatus'] = 2; // 待审核
        $p_aData['iPayStatus']   = 3; // 待支付
        $p_aData['iUpdatedTime'] = time();
        $p_aData['sPicData']     = json_encode($p_aData['sPicData']);
        return dao_payment_rentdao::create($p_aData);
    }
?>

<?php
 /**
     * 创建收银台回传数据并即时更新主表支付状态（需要事务支持）
     *
     * @param  array $p_aData 回传数据
     */
    public static function createCallback($p_aData)
    {
        $p_aData['sCreateTime'] = date('Y-m-d H:i:s', time());

        try
        {
            dao_payment_rentdao::begin();
            dao_payment_rentdao::create($p_aData, 't_rent_callback');
            self::updatePayStatusToSuccess($p_aData['sBusinessOrderID'], $p_aData['iSuccessTime']);
            dao_payment_rentdao::commit();
        }
        catch(PDOException $e)
        {
            dao_payment_rentdao::rollback();
        }
    }
?>

<?php
 /**
     * 包装制造租房（房源）通用数据结构
     */
    public function makeRentingDataFields(&$p_aData)
    {
        $oDict = new bll_common_base_dict;

        $aData['renting_id']      = (int) $p_aData['iAutoID'];
        $aData['loupan_id']       = (int) $p_aData['iLoupanID'];
        $aData['status']          = (int) $p_aData['iStatus'];
        $aData['title']           = $p_aData['sTitle'];
        $aData['price']           = $p_aData['iPrice'];
        $aData['room_info']       = $p_aData['sRoomInfo']; // 几室几厅几卫
        $aData['room_space']      = $p_aData['iSpace'];
        $aData['floor_info']      = $p_aData['sFloorInfo'];
        $aData['contact']         = $p_aData['sContacts'];
        $aData['phone']           = $p_aData['sMobilephone'];
        $aData['pay_type_int']    = $p_aData['iPayType'];
        $aData['bed_number']      = $p_aData['iBedNum']; // 床位数
        $aData['renting_type_id'] = $p_aData['iTypeID']; // 租房类型:1=整租，2=合租，3=床位
        $aData['pictures']        = $this->getPictures($p_aData['iAutoID'], $p_aData['iLoupanID']);
        $aData['room_num']        = $oDict->getNameByTypeAndID('renting_room_type', $p_aData['iRoomNum'], '一室'); // 几室 
        $aData['pay_type']        = $oDict->getNameByTypeAndID('renting_pay_type', $p_aData['iPayType'], '');
        $aData['publish_time']    = util_helper::formatTimeToHumanize($p_aData['iUpdateTime'] ?: $p_aData['iCreateTime']);
        $aData['description']     = util_helper::clearHTMLTagsOfNonKeeing($p_aData['sDescription'], array('p', 'br'));
        $aData['user_id']         = $p_aData['iUserID'];
        return $aData;
    }

?>

<?php

function _Msg_SendSoapRequest($soapAction, $returnTag){
		$HTTP_HEADER = "SOAPAction: \"http://%s/services/EsmsService/%s\"\r\n";
		$HTTP_HEADER .= "User-Agent: SOAP Toolkit 3.0\r\n";
		$HTTP_HEADER .= "Host: %s:8080\r\n";
		$HTTP_HEADER .= "Content-Length: %d\r\n";
		$HTTP_HEADER .= "Connection: Keep-Alive\r\n";
		$HTTP_HEADER .= "Pragma: no-cache\r\n\r\n";
		$HTTP_REQUEST_DATA = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>";
		$HTTP_REQUEST_DATA .= "<SOAP-ENV:Envelope SOAP-ENV:encodingStyle=\"\" ";
		$HTTP_REQUEST_DATA .= "xmlns:SOAPSDK1=\"http://www.w3.org/2001/XMLSchema\" ";
		$HTTP_REQUEST_DATA .= "xmlns:SOAPSDK2=\"http://www.w3.org/2001/XMLSchema-instance\" ";
		$HTTP_REQUEST_DATA .= "xmlns:SOAPSDK3=\"http://schemas.xmlsoap.org/soap/encoding/\" ";
		$HTTP_REQUEST_DATA .= "xmlns:SOAP-ENV=\"http://schemas.xmlsoap.org/soap/envelope/\">";
		$HTTP_REQUEST_DATA .= "<SOAP-ENV:Body SOAP-ENV:encodingStyle=\"\">";
		$HTTP_REQUEST_DATA .= "<%s SOAP-ENV:encodingStyle=\"\">"; //soap请求动作
		$HTTP_REQUEST_DATA .= "<n1 SOAP-ENV:encodingStyle=\"\">%s</n1>"; //用户名
		$HTTP_REQUEST_DATA .= "<n2 SOAP-ENV:encodingStyle=\"\">%s</n2>"; //密码
		$HTTP_REQUEST_DATA .= "</%s>"; //soap请求动作
		$HTTP_REQUEST_DATA .= "</SOAP-ENV:Body>";
		$HTTP_REQUEST_DATA .= "</SOAP-ENV:Envelope>";
		$soapError = "ERROR";
		
		//HTTP请求的数据
		$requestData = sprintf($HTTP_REQUEST_DATA, $soapAction, $this->_sUserName, $this->_sPassword, $soapAction);
		//HTTP请求头
		$httpHeader = sprintf($HTTP_HEADER, $this->_sWebServerIP, $soapAction, $this->_sWebServerIP, strlen($requestData));
		$url = "POST /services/EsmsService?wsdl HTTP/1.1\r\n";
		
		$sock = fsockopen($this->_sWebServerIP, 8080);
		
		if($sock == 0){
			return $soapError;
		}
		fputs($sock, $url . $httpHeader . $requestData); //发送HTTP请求到服务器
		

		//跳过HTTP的文件头
		for($i = 0; $i < 7; $i++){
			fgets($sock, 100);
		}
		
		$tagBegin = sprintf("<%s", $returnTag);
		$tagEnd = sprintf("</%s>", $returnTag);
		
		//获取XML字符串
		$buffer = "";
		$segGets = fgets($sock, 4096 * 3);
		while(strpos($segGets, $tagEnd) == FALSE){
			$buffer .= $segGets;
			$segGets = fgets($sock, 4096 * 3);
			if($segGets == FALSE)
				break;
		}
		fclose($sock);
		$buffer .= $segGets;
		
		$beginPos = strpos($buffer, $tagBegin);
		if($beginPos == FALSE)
			return "";
		
		$beginPos = strpos($buffer, ">", $beginPos + strlen($tagBegin)) + 1;
		$endPos = strPos($buffer, $tagEnd, $beginPos);
		if($endPos == FALSE)
			return "";
		
		return substr($buffer, $beginPos, $endPos - $beginPos);
	}

?>

<?php
public  function load($class)
	{
		$class = static::normalizeClass($class);

		foreach (static::$directories as $directory)
		{
			if (file_exists($path = $directory.DIRECTORY_SEPARATOR.$class))
			{
				require_once $path;

				return true;
			}
		}

		return false;
	}
?>

<?php
 function addDirectories($directories)
	{
		//array_unique:去除数组重复值
		static::$directories = array_unique(array_merge(static::$directories, (array) $directories));
	}


 function removeDirectories($directories = null)
	{
		if (is_null($directories))
		{
			static::$directories = array();
		}
		else
		{	//array_diff:返回两个数组的差集
			static::$directories = array_diff(static::$directories, (array) $directories);
		}
	}

	/**
	 * Get the normal file name for a class.
	 *
	 * @param  string  $class
	 * @return string
	 */
	function normalizeClass($class)
	{
		if ($class[0] == '\\') $class = substr($class, 1);

		return str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $class).'.php';
	}

?>

<?php
//优美接口
$validator = Validator::make(
    array('name' => 'Dayle'),
    array('name' => 'required|min:5')
);
if ($validator->fails())
{
    // The given data did not pass validation
}
$messages = $validator->messages();
foreach ($messages->get('email') as $message)
{
    //
}

foreach ($messages->all() as $message)
{
    //
}
if ($messages->has('email'))
{
    //
}
foreach ($messages->all('<li>:message</li>') as $message)
{
    //
}

?>

<?php
function encryptPassword($sPassword)
    {
        if (!isset($sPassword{0})) {
            return '';
        }

        $sSaltIndex = ord($sPassword{0}) % 4;
        $aSaltMap = [
            '9a',
            '_J9..ae2m',
            '$1$r82msle$',
            '$2a$07$tsitlrrsouslolinesgesamyf$',
        ];

        $sSalt = $aSaltMap[$sSaltIndex];
        return crypt($sPassword, $sSalt);
    }
?>

<?php
/**
 * 检查请求是否可以不用登录就使用。
 * @param string $p_sAction
 */
private function checkLogin($p_sAction) {
	if ($this->bIsNeedToken === false)
	{
		return true;
	}

	if (empty($this->aUserInfo)) {
		$aWhite = [
			'register',
			'login',
			'findpwd',
			'setpwd',
			'smscaptcha',
			'checkmobile',
			'checkcaptcha',
			'getcaptchaurl',
			'getuser'
				];

		if (!in_array($p_sAction, $aWhite)) {
			$this->setError('NOT_LOGIN');
			return false;
		}
	}

	if ( isset($this->aUserInfo['iUserID']) && $this->aUserInfo['iUserID'] > 0 ) {
		$this->lockUser($this->aUserInfo['iUserID']);
	}
	return true;
}
?>

<?php
 /**
     * 初始化锁
     */
    protected function initLock() {
        load_lib('util_lock_lock');
        $this->oLock = new util_lock_processlock(array($this, 'lockTimeout'));
    }
/**
 * 获得memcache实例。
 * @return memcache
 */
protected function getMemcache(){
	return cache_pooling::getInstance()->getCache('bll');
}

/**
 * 获得登录失败计数器的key
 * @return string
 */
private function getClientKey(){
	return md5($this->getClientIP());
}

/**
 * 删除计数器
 */
protected function delFailCnt(){
	$sClientKey = $this->getClientKey();
	$cache = $this->getMemcache();
	return $cache->delete($sClientKey);
}

/**
 * 锁定方法封装函数
 * @param $sLockID
 * @return mixed
 */
protected function lock( $sLockID ) {
	$sLockID = $this->getControllerShortName() .
		$this->getParam('sAction', 'url') .
		$sLockID;
	return $this->getLock()->lock($sLockID);
}

/**
 * 按用户ID锁
 * @param $iUserID
 * @return mixed
 */
protected function lockUser( $iUserID ) {
	$sLockID = 'uid_' . $iUserID;
	return $this->lock($sLockID);
}

protected function memcacheAdd($sKey, $sValue, $iTimeout) {
	$i = 1;
	do {
		$bRes = $this->oMemcache->add($sKey, $sValue, $iTimeout);
		$sStatus = $this->oMemcache->getResultCode();
		$i++;
		if ( $bRes || $i >$this->iMemcacheRetryCount ) break;
	} while (
			$sStatus != Memcached::RES_SUCCESS &&
			$sStatus != Memcached::RES_NOTSTORED
		);
	return $bRes;
}


?>

<?php
/**
	 * Flatten a multi-dimensional associative array with dots.
	 *
	 * @param  array   $array
	 * @param  string  $prepend
	 * @return array
	 */
	public static function dot($array, $prepend = '')
	{
		$results = array();

		foreach ($array as $key => $value)
		{
			if (is_array($value))
			{
				$results = array_merge($results, static::dot($value, $prepend.$key.'.'));
			}
			else
			{
				$results[$prepend.$key] = $value;
			}
		}

		return $results;
	}


/**
 * Execute a callback over each item.
 *
 * @param  \Closure  $callback
 * @return $this
 */
public function each(Closure $callback)
{
	array_map($callback, $this->items);

	return $this;
}


/**
	 * Determine if the collection is empty or not.
	 *
	 * @return bool
	 */
	public function isEmpty()
	{
		return empty($this->items);
	}
?>


<?php

/**
	 * Get an attribute from the container.
	 *
	 * @param  string  $key
	 * @param  mixed   $default
	 * @return mixed
	 */
	public function get($key, $default = null)
	{
		if (array_key_exists($key, $this->attributes))
		{
			return $this->attributes[$key];
		}

		return value($default);
	}
?>


<?php

/**
 * Convert the object into something JSON serializable.
 *
 * @return array
 */
public function jsonSerialize()
{
	return $this->toArray();
}

/**
 * Convert the Fluent instance to JSON.
 *
 * @param  int  $options
 * @return string
 */
public function toJson($options = 0)
{
	return json_encode($this->toArray(), $options);
}

/**
 * Convert the message bag to its string representation.
 *
 * @return string
 */
public function __toString()
{
	return $this->toJson();
}
?>

<?php
function random($length, $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}

function auto_next($get, $sqlfile) {
	$next_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?apptype='.$GLOBALS['apptype'].'&code='.urlencode(encode_arr($get));
	$out = "<root>\n";
	$out .= "\t<error errorCode=\"0\" errorMessage=\"ok\" />\n";
	$out .= "\t<fileinfo>\n";
	$out .= "\t\t<file_num>$get[volume]</file_num>\n";
	$out .= "\t\t<file_size>".filesize($sqlfile)."</file_size>\n";
	$out .= "\t\t<file_name>".basename($sqlfile)."</file_name>\n";
	$out .= "\t\t<file_url>".str_replace(ROOT_PATH, 'http://'.$_SERVER['HTTP_HOST'].'/', $sqlfile)."</file_url>\n";
	$out .= "\t\t<last_modify>".filemtime($sqlfile)."</last_modify>\n";
	$out .= "\t</fileinfo>\n";
	$out .= "\t<nexturl><![CDATA[$next_url]]></nexturl>\n";
	$out .= "</root>";
	echo $out;
	exit;
}
?>

<?php
function onuploadavatar() {
		@header("Expires: 0");
		@header("Cache-Control: private, post-check=0, pre-check=0, max-age=0", FALSE);
		@header("Pragma: no-cache");
		//header("Content-type: application/xml; charset=utf-8");
		$this->init_input(getgpc('agent', 'G'));

		$uid = $this->input('uid');
		if(empty($uid)) {
			return -1;
		}
		if(empty($_FILES['Filedata'])) {
			return -3;
		}

		list($width, $height, $type, $attr) = getimagesize($_FILES['Filedata']['tmp_name']);
		if(!in_array($type, array(1,2,3,6))) {
			@unlink($_FILES['Filedata']['tmp_name']);
			return -4;
		}
		$imgtype = array(1 => '.gif', 2 => '.jpg', 3 => '.png');
		$filetype = $imgtype[$type];
		if(!$filetype) $filetype = '.jpg';
		$tmpavatar = UC_DATADIR.'./tmp/upload'.$uid.$filetype;
		file_exists($tmpavatar) && @unlink($tmpavatar);
		if(@copy($_FILES['Filedata']['tmp_name'], $tmpavatar) || @move_uploaded_file($_FILES['Filedata']['tmp_name'], $tmpavatar)) {
			@unlink($_FILES['Filedata']['tmp_name']);
			list($width, $height, $type, $attr) = getimagesize($tmpavatar);
			if($width < 10 || $height < 10 || $type == 4) {
				@unlink($tmpavatar);
				return -2;
			}
		} else {
			@unlink($_FILES['Filedata']['tmp_name']);
			return -4;
		}
		$avatarurl = UC_DATAURL.'/tmp/upload'.$uid.$filetype;
		return $avatarurl;
	}

?>

<?php
$serverinfo = PHP_OS.' / PHP v'.PHP_VERSION;
		$serverinfo .= @ini_get('safe_mode') ? ' Safe Mode' : NULL;
		$dbversion = $this->db->result_first("SELECT VERSION()");
		$fileupload = @ini_get('file_uploads') ? ini_get('upload_max_filesize') : '<font color="red">'.$lang['no'].'</font>';
?>

<?php
$string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);
/*
以上例程会输出：

pril1,2003
*/
?>

<?php
 /**
     * 拼接登录xx的URL
     * @return string
     */
    public static function makeLoginURL( $p_mParams = '' ){
        $sBaseUrl = get_config('sTOALoginURL','bis');
        $sAppID = get_config('sTOAAppID','bis');
        //$sTimestamp = date('Y-m-d H:i:s');
        $sTimestamp = date('Y-m-d H:i:s',strtotime('+1 day'));
        if( is_array($p_mParams) || is_object($p_mParams) ){
            $ptag = json_encode($p_mParams);
        } else {
            $ptag = $p_mParams;
        }
        $aQuery = array(
            'appId'         => $sAppID,
            'timestamp'     => $sTimestamp,
            'signature'     => self::_makeSignature($sAppID,$sTimestamp),
            'signtype'      => get_config('sTOASignType','bis'),
            'ptag'          => $ptag,
            'isViewOtherAccount'    => false,
            'isReg'         => 'true'
        );
        $sLoginUrl = $sBaseUrl.'?'.http_build_query($aQuery);
        //日志记录一下URL，便于调试
        util_log::create('sdk', array('sLoginUrl'=>$sLoginUrl));
        return $sLoginUrl;
    }
?>

<?php
/**
	 * 判断数据类型是否正确
	 * @param mix $p_mData
	 * @param string $p_sDataType
	 * @return true/false
	 */
	static function chkDataType($p_mData, $p_sDataType){
		if('' == $p_mData){
			return false;
		}
		switch($p_sDataType){
			case 'i':
				return 0 < preg_match('/^-?[1-9]?[0-9]*$/', $p_mData) ? true : false;
			case 'url':
				return 0 < preg_match('/^https?:\/\/([a-z0-9-]+\.)+[a-z0-9]{2,4}.*$/', $p_mData) ? true : false;
			case 'email':
				return 0 < preg_match('/^[a-z0-9_+.-]+\@([a-z0-9-]+\.)+[a-z0-9]{2,4}$/i', $p_mData) ? true : false;
			case 'idcard':
				return 0 < preg_match('/^[0-9]{15}$|^[0-9]{17}[a-zA-Z0-9]/', $p_mData) ? true : false;
			case 'area':
				return 0 < preg_match('/^\d+(\.\d{1,2})?$/', $p_mData) ? true : false;
			case 'money':
				return 0 < preg_match('/^\d+(\.\d{1,2})?$/', $p_mData) ? true : false;
			case 'length':
				return 0 < preg_match('/^\d+(\.\d{1,2})?$/', $p_mData) ? true : false;
			case 'mobile':
                return 0 < preg_match("/^((13[0-9])|(17[0-9])|145|147|(15[0-35-9])|(18[0-9])|200)[0-9]{8}$/", $p_mData) ? true : false;
				//return 0 < preg_match('/^1\d{10,10}$/', $p_mData) ? true : false;
			case 'phone':
				return 0 < preg_match('/^(\d{3,4}-?)?\d{7,8}$/', $p_mData) ? true : false;
			case 'chinese' :
			    return 0 < preg_match("/^[\x{4e00}-\x{9fa5}]+$/u", $p_mData) ? true : false;
			default:
				return false;
		}
	}
?>

<?php
/**
     * 获取随机字符串
     * @param int $p_iLength
     * @param int $p_iStyle 0-number, 1-alpha, 2-all
     */
	static function getRand($p_iLength, $p_iStyle = 0){
		$sTmp = '0123456789abcdefghijklmnopqrstuvwxyz';
		$sReturn = '';
		switch($p_iStyle){
			case 0:
				$iStart = 0;
				$iEnd = 9;
				break;
			case 1:
				$iStart = 10;
				$iEnd = 35;
				break;
			case 2:
				$iStart = 0;
				$iEnd = 35;
				break;
			default:
				$iStart = 0;
				$iEnd = 9;
		}
		for($i = 0; $i < $p_iLength; $i++){
			$sReturn .= substr($sTmp, rand($iStart, $iEnd), 1);
		}
		return $sReturn;
	}
?>

<?php
/**
	 * 上传文件
	 * 注意：此方法适用于上传不大于2G的单个文件。
	 * @param string $fileContent 文件内容字符串
	 * @param string $targetPath 上传文件的目标保存路径
	 * @param string $fileName 文件名
	 * @param string $newFileName 新文件名
	 * @param boolean $isCreateSuperFile 是否分片上传
	 * @return string
	 */
	 function upload($fileContent, $targetPath, $fileName, $newFileName = null, $isCreateSuperFile = FALSE) {
		$boundary = md5 ( time () );
		$postContent .= "--" . $boundary . "\r\n";
		$postContent .= "Content-Disposition: form-data; name=\"file\"; filename=\"{$fileName}\"\r\n";
		$postContent .= "Content-Type: application/octet-stream\r\n\r\n";
		$postContent .= $fileContent . "\r\n";
		$postContent .= "--" . $boundary . "\r\n";

		$requestStr = 'file?method=upload&path=' . urlencode ( $targetPath . (empty ( $newFileName ) ? $fileName : $newFileName) ) . '&access_token=' . $this->_accessToken;

		if ($isCreateSuperFile === TRUE) {
			$requestStr .= '&type=tmpfile';
		}

		$result = $this->_baseControl ( $requestStr, $postContent, 'POST', array ('Content-Type' => 'multipart/form-data; boundary=' . $boundary ) );
		return $result;
	}

?>

<?php
function _baseControl($apiMethod, $params, $method = 'GET', $headers = array()) {

		$method = strtoupper ( $method );

		if (is_array ( $params )) {
			$params = http_build_query ( $params, '', '&' );
		}

		$url = $this->_pcs_uri_prefixs ['https'] . $apiMethod . ($method == 'GET' ? '&' . $params : '');

		$requestCore = new RequestCore ();
		$requestCore->set_request_url ( $url );

		$requestCore->set_method ( $method );
		if ($method == 'POST') {
			$requestCore->set_body ( $params );
		}

		foreach ( $headers as $key => $value ) {
			$requestCore->add_header ( $key, $value );
		}

		$requestCore->send_request ();
		$result = $requestCore->get_response_body ();

		return $result;
	}
?>
<?php

require_once '../libs/BaiduPCS.class.php';
//请根据实际情况更新$access_token与$appName参数
$access_token = '3.839af46f54db6ed60797847d2febbca0.2592000.1359262544.754976761-248414';
//应用目录名
$appName = '测试应用';
//应用根目录
$root_dir = '/apps' . '/' . $appName . '/';

//上传文件的目标保存路径，此处表示保存到应用根目录下
$targetPath = $root_dir;
//要上传的本地文件路径
$file = dirname(__FILE__) . '/' . 'yun.jpg';
//文件名称
$fileName = basename($file);
//新文件名，为空表示使用原有文件名
$newFileName = '';

$pcs = new BaiduPCS($access_token);

if (!file_exists($file)) {
	exit('文件不存在，请检查路径是否正确');
} else {
	$fileSize = filesize($file);
	$handle = fopen($file, 'rb');
	$fileContent = fread($handle, $fileSize);

	$result = $pcs->upload($fileContent, $targetPath, $fileName, $newFileName);
	fclose($handle);
	
	echo $result;
}
?>

<?php
/**
 *      * @return string
 *           *  显示消息内容
 *                */
function doshowMessage () {
	$iUserId = $this->aUserInfo['iUserID'];
	$iMessage = $this->getParam('iMessage','get');
	$sMsgData = bll_message_message::getMessageInfo($iMessage,$iUserId);
	if($sMsgData){
		$msgInfo = array(
			'sTitle' => $sMsgData[0]['sTitle'],
			'sSendTime'=>date('Y-m-d',$sMsgData[0]['iSendTime']),
			'sContent'=>$sMsgData[0]['sContent']);
		$this->setData('msgInfo', $msgInfo);
		return '/user/msg/detail';
	}else{
		$this->alertExit('没有找到相关内容');
	}

}


/**
 *      * @param $msg
 *           * 弹出警告框
 *                */
function alertExit($msg){
	header('Content-type:text/html; charset=UTF-8;');
	exit('<script>alert("'.$msg.'");location.href="'.self::getMemberURL('/message/mymessage','home',array()).'";</script>');
}

?>

<?php
function beforeRequest(){
	parent::beforeRequest();
	$this->addHeader('Cache-control: no-cache');
	$sGUID = $this->getParam('guid', 'cookie');
	if(null == $sGUID){
		load_lib('/util/guid');
		$this->setCookie('guid', util_guid::getGuid(), 31536000);
	}

	$this->setData('bAllowSwitchVersion', $this->checkIPforVersion());
}

function getUserInfo(){
	$sToken = $this->getToken();
	load_lib('/bll/user/base/info');

	if(empty(self::$aUser)){
		$aUserInfo = (new bll_user_base_info())->getUserInfoByToken($sToken, 2);
		$aTmp = [];

		if(!empty($aUserInfo)){
			$aTmp = [
				'iUserID' => $aUserInfo['iAutoID'],
				'sNickname' => $aUserInfo['sNickname'],
				'sMobile' => $aUserInfo['sMobile']
			];
		}

		self::$aUser = $aTmp;
	}
	return self::$aUser;
}

function getGuid($p_bUpper = false, $p_sJoin = ''){
	$sRaw = md5(strtolower(get_config('sServerName') . '/' . sys_variable::getInstance()->getParam('SERVER_ADDR', 'server')) . ':' . self::_getTimeMillis() . ':' . self::_getLong());
	if($p_bUpper){
		$sRaw = strtoupper($sRaw);
	}
	return substr($sRaw, 0, 8) . $p_sJoin . substr($sRaw, 8, 4) . $p_sJoin . substr($sRaw, 12, 4) . $p_sJoin . substr($sRaw, 16, 4) . $p_sJoin . substr($sRaw, 20);
}

?>

<?php
public function lockTimeout() {
	header('Content-type: application/json; charset=utf-8;');
	exit('{"iStatus":0,"sErrCode":"LOCK_TIMEOUT","aErrInfo":"服务器繁忙"}');
}
?>

<?php
function  _getMessNum(){
	if(!isset($this->aUserInfo['iUserID'])){
		$this->setError('NOT_LOGIN');
		return false ;
	}

	$iUserId = $this->aUserInfo['iUserID'];
	$p_aFilters = array('iUserID' =>$iUserId,) ;
	$iCount = bll_message_message::getMessageNums($p_aFilters);

	$p_aFilters['iOpenStatus']= self::NOOPEN_STATUS;  // 未打开
	$iNoReadCount = bll_message_message::getMessageNums($p_aFilters);

	$aRet = array(
		'iTotalNum' => $iCount,
		'iNoReadCount' => $iNoReadCount,
	);
	$this->setContent($aRet);
	return true;
}

?>

<?php
/**
 *      * Converts the response object to string containing all headers and the response content.
 *           *
 *                * @return string The response with headers and content
 *                     */
public function __toString()
{
	$headers = array();
	foreach ($this->httpHeaders as $name => $value) {
		$headers[$name] = (array) $value;
	}
	return
		sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText)."\r\n".
		$this->getHttpHeadersAsString($headers)."\r\n".
		$this->getResponseBody();
}
/**
 *      * Returns the build header line.
 *           *
 *                * @param string $name  The header name
 *                     * @param string $value The header value
 *                          *
 *                               * @return string The built header line
 *                                    */
protected function buildHeader($name, $value)
{
	return sprintf("%s: %s\n", $name, $value);
}

public function getResponseBody($format = 'json')
{
	switch ($format) {
	case 'json':
		return json_encode($this->parameters);
	case 'xml':
		$xml = new \SimpleXMLElement('<response/>');
		foreach ($this->parameters as $key => $param) {
			$xml->addChild($key, $param);
		}
		return $xml->asXML();
	}
	throw new \InvalidArgumentException(sprintf('The format %s is not supported', $format));
}
//http response send function
public function send($format = 'json')
{
	if (headers_sent()) {
		return;
	}
	switch ($format) {
		case 'json':
			$this->setHttpHeader('Content-Type', 'application/json');
			break;
		case 'xml':
			$this->setHttpHeader('Content-Type', 'text/xml');
			break;
	}
	// status
	header(sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText));

	foreach ($this->getHttpHeaders() as $name => $header) {
		header(sprintf('%s: %s', $name, $header));
	}
	echo $this->getResponseBody($format);
}

?>

<?php
//检查内部服务是否可以调用，基于ip地址过滤
function checkInner($p_sIP){
	$aAllowdIPs = get_config('aAllowdIPs', 'debug');
	foreach ($aAllowdIPs as $sPattern) {
		if (0 < preg_match($sPattern, $p_sIP)) {
			return true;
		}
	}

	return false;

}
?>

<?php
if(!function_exists('file_put_contents')) {
	function file_put_contents($filename, $s) {
		$fp = @fopen($filename, 'w');
		@fwrite($fp, $s);
		@fclose($fp);
	}
}

function updatedata($cachefile = '') {
	if($cachefile) {
		foreach((array)$this->map[$cachefile] as $modules) {
			$s = "<?php\r\n";
			foreach((array)$modules as $m) {
				$method = "_get_$m";
				$s .= '$_CACHE[\''.$m.'\'] = '.var_export($this->$method(), TRUE).";\r\n";
			}
			$s .= "\r\n?>";
			@file_put_contents(UC_DATADIR."./cache/$cachefile.php", $s);
		}
	} else {
		foreach((array)$this->map as $file => $modules) {
			$s = "<?php\r\n";
			foreach($modules as $m) {
				$method = "_get_$m";
				$s .= '$_CACHE[\''.$m.'\'] = '.var_export($this->$method(), TRUE).";\r\n";
			}
			$s .= "\r\n?>";
			@file_put_contents(UC_DATADIR."./cache/$file.php", $s);
		}
	}
}
?>

<?php
function dfopen($url, $limit = 0, $post = '', $cookie = '', $bysocket = FALSE	, $ip = '', $timeout = 15, $block = TRUE, $encodetype  = 'URLENCODE') {
	$return = '';
	$matches = parse_url($url);
	$host = $matches['host'];
	$path = $matches['path'] ? $matches['path'].($matches['query'] ? '?'.$matches['query'] : '') : '/';
	$port = !empty($matches['port']) ? $matches['port'] : 80;

	if($post) {
		$out = "POST $path HTTP/1.0\r\n";
		$out .= "Accept: */*\r\n";
		//$out .= "Referer: $boardurl\r\n";
		$out .= "Accept-Language: zh-cn\r\n";
		$boundary = $encodetype == 'URLENCODE' ? '' : ';'.substr($post, 0, trim(strpos($post, "\n")));
		$out .= $encodetype == 'URLENCODE' ? "Content-Type: application/x-www-form-urlencoded\r\n" : "Content-Type: multipart/form-data$boundary\r\n";
		$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
		$out .= "Host: $host\r\n";
		$out .= 'Content-Length: '.strlen($post)."\r\n";
		$out .= "Connection: Close\r\n";
		$out .= "Cache-Control: no-cache\r\n";
		$out .= "Cookie: $cookie\r\n\r\n";
		$out .= $post;
	} else {
		$out = "GET $path HTTP/1.0\r\n";
		$out .= "Accept: */*\r\n";
		//$out .= "Referer: $boardurl\r\n";
		$out .= "Accept-Language: zh-cn\r\n";
		$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
		$out .= "Host: $host\r\n";
		$out .= "Connection: Close\r\n";
		$out .= "Cookie: $cookie\r\n\r\n";
	}

	if(function_exists('fsockopen')) {
		$fp = @fsockopen(($ip ? $ip : $host), $port, $errno, $errstr, $timeout);
	} elseif (function_exists('pfsockopen')) {
		$fp = @pfsockopen(($ip ? $ip : $host), $port, $errno, $errstr, $timeout);
	} else {
		$fp = false;
	}

	if(!$fp) {
		return '';
	} else {
		stream_set_blocking($fp, $block);
		stream_set_timeout($fp, $timeout);
		@fwrite($fp, $out);
		$status = stream_get_meta_data($fp);
		if(!$status['timed_out']) {
			while (!feof($fp)) {
				if(($header = @fgets($fp)) && ($header == "\r\n" ||  $header == "\n")) {
					break;
				}
			}

			$stop = false;
			while(!feof($fp) && !$stop) {
				$data = fread($fp, ($limit == 0 || $limit > 8192 ? 8192 : $limit));
				$return .= $data;
				if($limit) {
					$limit -= strlen($data);
					$stop = $limit <= 0;
				}
			}
		}
		@fclose($fp);
		return $return;
	}
}
?>

<?php
if(!function_exists('getgpc')) {
	function getgpc($k, $var='G') {
		switch($var) {
		case 'G': $var = &$_GET; break;
		case 'P': $var = &$_POST; break;
		case 'C': $var = &$_COOKIE; break;
		case 'R': $var = &$_REQUEST; break;
		}
		return isset($var[$k]) ? $var[$k] : NULL;
	}
}
?>

<?php
function init_var() {
	$this->time = time();
	$cip = getenv('HTTP_CLIENT_IP');
	$xip = getenv('HTTP_X_FORWARDED_FOR');
	$rip = getenv('REMOTE_ADDR');
	$srip = $_SERVER['REMOTE_ADDR'];
	if($cip && strcasecmp($cip, 'unknown')) {
		$this->onlineip = $cip;
	} elseif($xip && strcasecmp($xip, 'unknown')) {
		$this->onlineip = $xip;
	} elseif($rip && strcasecmp($rip, 'unknown')) {
		$this->onlineip = $rip;
	} elseif($srip && strcasecmp($srip, 'unknown')) {
		$this->onlineip = $srip;
	}
	preg_match("/[\d\.]{7,15}/", $this->onlineip, $match);
	$this->onlineip = $match[0] ? $match[0] : 'unknown';
	$this->app['appid'] = UC_APPID;
}
?>

<?php
		$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);

?>
<?php
	function dstripslashes($string) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = $this->dstripslashes($val);
			}
		} else {
			$string = stripslashes($string);
		}
		return $string;
	}
?>

<?php
	function uc_pm_location($uid, $newpm = 0) {
		$apiurl = uc_api_url('pm_client', 'ls', "uid=$uid", ($newpm ? '&folder=newbox' : ''));
		@header("Expires: 0");
		@header("Cache-Control: private, post-check=0, pre-check=0, max-age=0", FALSE);
		@header("Pragma: no-cache");
		@header("location: $apiurl");
	}
?>

<?php
	//discuz authcode
	function uc_authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {

		$ckey_length = 4;

		$key = md5($key ? $key : UC_KEY);
		$keya = md5(substr($key, 0, 16));
		$keyb = md5(substr($key, 16, 16));
		$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

		$cryptkey = $keya.md5($keya.$keyc);
		$key_length = strlen($cryptkey);

		$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
		$string_length = strlen($string);

		$result = '';
		$box = range(0, 255);

		$rndkey = array();
		for($i = 0; $i <= 255; $i++) {
			$rndkey[$i] = ord($cryptkey[$i % $key_length]);
		}

		for($j = $i = 0; $i < 256; $i++) {
			$j = ($j + $box[$i] + $rndkey[$i]) % 256;
			$tmp = $box[$i];
			$box[$i] = $box[$j];
			$box[$j] = $tmp;
		}

		for($a = $j = $i = 0; $i < $string_length; $i++) {
			$a = ($a + 1) % 256;
			$j = ($j + $box[$a]) % 256;
			$tmp = $box[$a];
			$box[$a] = $box[$j];
			$box[$j] = $tmp;
			$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
		}

		if($operation == 'DECODE') {
			if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
				return substr($result, 26);
			} else {
				return '';
			}
		} else {
			return $keyc.str_replace('=', '', base64_encode($result));
		}
	}
?>

<?php
	function uc_addslashes($string, $force = 0, $strip = FALSE) {
		!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
		if(!MAGIC_QUOTES_GPC || $force) {
			if(is_array($string)) {
				foreach($string as $key => $val) {
					$string[$key] = uc_addslashes($val, $force, $strip);
				}
			} else {
				$string = addslashes($strip ? stripslashes($string) : $string);
			}
		}
		return $string;
	}
	

	if(!function_exists('daddslashes')) {
		function daddslashes($string, $force = 0) {
			return uc_addslashes($string, $force);
		}
	}


	function uc_stripslashes($string) {
		!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
		if(MAGIC_QUOTES_GPC) {
			return stripslashes($string);
		} else {
			return $string;
		}
	}
?>

<?php
throw new Exception('Oops! System file lost: '.$filename);
?>

<?php
/**
 * 	 * 入口方法（调度使用）
 * */
function doView(){
	$this->loadComponentUI(dirname(componentname_to_path(get_class($this))) . '/' . $this->getView());
}

protected function getData($p_sKey){
	return isset($this->_aMyPri['aPageData'][$p_sKey]) ? $this->_aMyPri['aPageData'][$p_sKey] : null;
}
/**
 *  * 开始内联脚本
 *   */
protected function startLScript(){
	ob_start();
}

/**
 *      * 结束内联脚本
 *           */
protected function endLScript(){
	self::$_aInlineScript[] = ob_get_contents();
	ob_end_clean();
}

/**
 * 	 * 加载组件
 * 	 	 * @param string $p_sPath       	
 * 	 	 	 * @param array $p_aParam       	
 * 	 	 	 	 */
function doComponent($p_sPath, $p_aParam = array()){
	$this->startDebug('Handle Component: ' . $p_sPath);
	$this->showDebugMsg('Component Path: ' . $p_sPath);
	$this->loadComponentClass($p_sPath);
	$sClassName = path_to_componentname($p_sPath);
	$oRelClass = new ReflectionClass($sClassName);
	$oRelInstance = $oRelClass->newInstance();
	$oRelMethod = $oRelClass->getMethod('setDatas');
	$oRelMethod->invoke($oRelInstance, $p_aParam);
	$oRelMethod = $oRelClass->getMethod('doView');
	$this->stopDebug('Handle Component: ' . $p_sPath);
	$oRelMethod->invoke($oRelInstance);
}

/**
 * 	 * 加载文件
 * 	 	 * @param string $p_sPath       	
 * 	 	 	 */

private function _loadFile($p_sPath, $p_bIsUI = true){
	global $G_LOAD_PATH;
	load_lib('/sys/util/string');
	foreach($G_LOAD_PATH as $sPath){
		$sClassFilePath = $sPath . $p_sPath;
		if(file_exists($sClassFilePath)){
			if($p_bIsUI){
				$aData = $this->_aMyPri['aPageData'];
				$aHtml = sys_util_string::chgHtmlSpecialChars($aData);
				if(get_config('bPageMinify')){
					ob_start();
					include $sClassFilePath;
					$sContent = ob_get_contents();
					ob_end_clean();
					load_lib('/sys/util/minifyhtml');
					echo sys_util_minifyhtml::minify($sContent);
				}else{
					include $sClassFilePath;
				}
			}else{
				include_once $sClassFilePath;
			}
			return;
		}
	}
}

?>


<?php
public function doRequest() {
	//$sAction  = $this->getParam('sAction','url');
	$sCmdParam  = $this->getParam('DISPATCH_PARAM', 'server');
	$iPos       = strrpos($sCmdParam, '/') + 1;
	$sAction    = substr($sCmdParam, $iPos);
	$sAction    = $sAction.'Action';

	//光谱日志
	$sName = get_class($this);
	bll_blackbox::setTopic("{$sName}_{$sAction}");

	if ( ! method_exists($this, $sAction) ) {
		die("NOT FIND ACTION: {$sName}::{$sAction} !!!");
	}

	return call_user_func(array($this,$sAction));
}
?>

<?php
/**
 *      * 构造请求报文
 *           * @param array $p_aData 数据体
 *                * @return string $sContent 返回报文内容
 *                更改模板中特殊字符串
 *                     */
public static function buildRequest($p_aData){
	$aTpls          = get_config('aTemplates','common');
	$sCashoutCharset = get_config('sCashoutCharset', 'common');

	$sTplPath       = $aTpls['sCmsRequest'];
	$sContent       = file_get_contents($sTplPath);
	$aReplaceKeys   = array();
	$aReplaceValues = array();

	$aReplaceKeys[] = '#CHARSET#';
	$aReplaceValues[] = $sCashoutCharset;
	foreach ($p_aData as $sKey => $sValue) {
		$aReplaceKeys[]     = '#'.$sKey.'#';
		$aReplaceValues[]   = $sValue;
	}
	$sContent = str_replace($aReplaceKeys, $aReplaceValues, $sContent);
	return $sContent;
}
?>

<?php
protected function getRandomString($count)
{
	// This string MUST stay FS safe, avoid special chars
	$base = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-.";
	$ret = '';
	$strlen = strlen($base);
	for ($i = 0; $i < $count; ++$i) {
		$ret .= $base[((int) rand(0, $strlen - 1))];
	}

	return $ret;
}
?>

<?php
/**
 *      * Constructor.
 *           *
 *                * @param array $data An array of key/value parameters.
 *                     *
 *                          * @throws \BadMethodCallException
 *                               */
public function __construct(array $data)
{
	if (isset($data['value'])) {
		$data['path'] = $data['value'];
		unset($data['value']);
	}

	foreach ($data as $key => $value) {
		$method = 'set'.str_replace('_', '', $key);
		if (!method_exists($this, $method)) {
			throw new \BadMethodCallException(sprintf("Unknown property '%s' on annotation '%s'.", $key, get_class($this)));
		}
		$this->$method($value);
	}
}
?>

<?php
$url = strtr($url, array('/../' => '/%2E%2E/', '/./' => '/%2E/'));
if ('/..' === substr($url, -3)) {
	$url = substr($url, 0, -2).'%2E%2E';
} elseif ('/.' === substr($url, -2)) {
	$url = substr($url, 0, -1).'%2E';
}
?>

<?php
if (version_compare(PHP_VERSION, '5.4.0', '<')) {
	throw new Exception('The Facebook SDK v4 requires PHP version 5.4 or higher.');

	$base_dir = defined('FACEBOOK_SDK_V4_SRC_DIR') ? FACEBOOK_SDK_V4_SRC_DIR : __DIR__ . '/src/Facebook/';


}
?>

<?php

    public function checkBetaIP()
    {
        $IP = $this->getClientIP();
        $aWhiteList = [ 
            '101.95.96.102',
            '114.80.125.114' // 新梅的外网IP
        ];  

        if (in_array($IP, $aWhiteList)) {
            return true;
        }   

        $bResult = false;

        if (preg_match('/^(192.168)/', $IP) > 0) {
            $bResult = true;
        }   

        return $bResult;
    }
?>

<?php

    /**
     * Encrypt
     * @param string $sStr
     * @return string
     */
    private function encrypt($sStr)
    {
        $r = "";
        $hexes = array ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");

        for ($i=0; $i<strlen($sStr); $i++) {
            $r .= ($hexes [(ord($sStr{$i}) >> 4)] . $hexes [(ord($sStr{$i}) & 0xf)]);
        }

        return $r;
    }

    /**
     * Decrypt
     * @param string $sStr
     * @return string
     */
    private function decrypt($sStr)
    {
        $r = "";

        for ( $i = 0; $i<strlen($sStr); $i += 2) {
            $x1 = ord($sStr{$i});
            $x1 = ($x1>=48 && $x1<58) ? $x1-48 : $x1-97+10;
            $x2 = ord($sStr{$i+1});
            $x2 = ($x2>=48 && $x2<58) ? $x2-48 : $x2-97+10;
            $r .= chr((($x1 << 4) & 0xf0) | ($x2 & 0x0f));
        }

        return $r;
    }
?>

<?php

    /**
     * Get an object of Version.
     * @return Version
     */
    public static function getInstance()
    {
        if (is_null(self::$obj)) {
            $class = __CLASS__;
            self::$obj = new $class;
        }

        return self::$obj;
    }
?>

<?php

/**
 * 加载文件
 * @param string $p_sPath
 * @param string $p_sPrefix
 * @param string $p_sExtension
 */
function load_file($p_sPath, $p_sPrefix, $p_sExtension)
{
    global $G_LOAD_PATH;

    $sFileName = $p_sPrefix . str_replace('/', DIRECTORY_SEPARATOR, $p_sPath) . '.' . $p_sExtension;

    foreach ($G_LOAD_PATH as $sPath) {
        $sClassFilePath = $sPath . DIRECTORY_SEPARATOR . $sFileName;

        if (file_exists($sClassFilePath)) {
            include_once $sClassFilePath;
            return true;
        }
    }

    return false;
}
?>

<?php

/**
* 加入队列  获取文件内容  导入数据
* @param $p_aParams
* @param int $p_iExecuteTime
* @return bool
*/
public function financeQueue($p_aParams,$p_iExecuteTime = 0) {
	$aData   = (array)$p_aParams;
	if (!empty($p_iExecuteTime)) {
		$iPlanTime = time() + $p_iExecuteTime;
	} else {
		$aConfig = get_config("getFile_delay", "finance");
		$iPlanTime = time() + intval($aConfig);
	}
	$oBllMQ  = new bll_mq_base();
	$oBllMQ->sendMsg([
		'iBID'          => bll_mq_base::BID_FINANCE_CHK,
		'sController'   => 'financecontroller',
		'sHandle'       => 'AccCheckStart',
		'sOnSuccess'    => 'onSuccess',
		'sOnError'      => 'onError',
		'aData'         => $aData,
		'iRetry'        => 0,
		'iPlanTime'     => $iPlanTime
	]);
	bll_finance_watch_log::log("debug", 'send_finance_queue', ['msg' => '发起队列服务','Params' => $aData]);
	return true;
}
?>

<?php

	protected function terminal($command){
		//system
		if(function_exists('system')){
			ob_start();
			system($command, $return_var);
			$output = ob_get_contents();
			ob_end_clean();
		}		//passthru
		else if(function_exists('passthru')){
			ob_start();
			passthru($command, $return_var);
			$output = ob_get_contents();
			ob_end_clean();
		}		//exec
		else if(function_exists('exec')){
			exec($command, $output, $return_var);
			$output = implode("\n", $output);
		}		//shell_exec
		else if(function_exists('shell_exec')){
			$output = shell_exec($command);
		}else{
			$output = 'Command execution not possible on this system';
			$return_var = 1;
		}
		return array( 
			'output' => $output,
			'status' => $return_var 
		);
	}
?>

<?php

class bll_permission_finmenu extends bll_permission_base{

    public static function getPerCode($aMenus) {

        $aPermission = self::getPermission($aMenus);
        $aCurrMenu   = self::findCurrMenu($aMenus);


        $aPermission = util_auth::filter($aPermission);
        $aPermission = array_flip($aPermission);
        return [$aPermission, $aCurrMenu];
    }
?>

<?php

function ExportToExcel(&$p_aParam) {
        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel;');
        header('Content-Disposition: attachment;filename="'. $p_aParam['sFileName']. '"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        
        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $oWriter = PHPExcel_IOFactory::createWriter($p_aParam['oExcel'], 'Excel5');
        $oWriter->setPreCalculateFormulas(false);
        $oWriter->save('php://output');
        exit;
}
?>

<?php

  /**
   * getHttpClientHandler - Returns an instance of the HTTP client
   * data handler
   *
   * @return FacebookHttpable
   * 类的某些实例变量，只需单类的时候，可以声明为static变量
   */

  /**
   * @var FacebookHttpable HTTP client handler
   */
  private static $httpClientHandler;

  /**
   * @var int The number of calls that have been made to Graph.
   */
  public static $requestCount = 0;

  public static function getHttpClientHandler()
  {
    if (static::$httpClientHandler) {
      return static::$httpClientHandler;
    }
    return function_exists('curl_init') ? new FacebookCurlHttpClient() : new FacebookStreamHttpClient();
  }


    $connection = self::getHttpClientHandler();
    $connection->addRequestHeader('User-Agent', 'fb-php-' . self::VERSION);
    $connection->addRequestHeader('Accept-Encoding', '*'); // Support all available encodings.

?>

<?PHP
/**
 *函数返回类，关系密切的类
 */
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
?>

<?php

  /**
   * Creates a FacebookResponse object for a given request and response.
   * 类构造的时候，传入类示例
   * 有些类，需经调用才能产生，这时初始化时，可以传入生成类的this实例
   * @param FacebookRequest $request
   * @param array $responseData JSON Decoded response data
   * @param string $rawResponse Raw string response
   * @param bool $etagHit Indicates whether sent ETag matched the one on the FB side
   * @param string|null $etag ETag received with the response. `null` in case of ETag hit.
   */
  public function __construct($request, $responseData, $rawResponse, $etagHit = false, $etag = null)
  {
    $this->request = $request;
    $this->responseData = $responseData;
    $this->rawResponse = $rawResponse;
    $this->etagHit = $etagHit;
    $this->etag = $etag;
  }

  /**
   * If this response has paginated data, returns the FacebookRequest for the
   *   next page, or null.
   * 下面使用该实例变量，可以很自然的进行调用
   * @return FacebookRequest|null
   */
  public function getRequestForNextPage()
  {
    return $this->handlePagination('next');
  }

  /**
   * If this response has paginated data, returns the FacebookRequest for the
   *   previous page, or null.
   *
   * @return FacebookRequest|null
   */
  public function getRequestForPreviousPage()
  {
    return $this->handlePagination('previous');
  }

  /**
   * Returns the FacebookRequest for the previous or next page, or null.
   *
   * @param string $direction
   *
   * @return FacebookRequest|null
   */
  private function handlePagination($direction) {
    if (isset($this->responseData->paging->$direction)) {
      $url = parse_url($this->responseData->paging->$direction);
      parse_str($url['query'], $params);

      if (isset($params['type']) && strpos($this->request->getPath(), $params['type']) !== false){
        unset($params['type']);
      }
      return new FacebookRequest(
        $this->request->getSession(),
        $this->request->getMethod(),
        $this->request->getPath(),
        $params
      );
    } else {
      return null;
    }
  }
?>


<?php

  /**
   * Gets the result as a GraphObject.  If a type is specified, returns the
   *   strongly-typed subclass of GraphObject for the data.
   *
   * @param string $type
   *
   * @return mixed
   */
  public function getGraphObject($type = 'Facebook\GraphObject') {
    return (new GraphObject($this->responseData))->cast($type);
  }
?>

<?php

  /**
   * php 单例，另外写法 
   * @var \GuzzleHttp\Client The Guzzle client
   */
  protected static $guzzleClient;

  /**
   * @param \GuzzleHttp\Client|null The Guzzle client
   */
  public function __construct(Client $guzzleClient = null)
  {
    self::$guzzleClient = $guzzleClient ?: new Client();
  }
?>

<?php
  /**
   * Process an error payload from the Graph API and return the appropriate
   *   exception subclass.
   *
   * @param string $raw the raw response from the Graph API
   * @param array $data the decoded response from the Graph API
   * @param int $statusCode the HTTP response code
   *
   * @return FacebookRequestException
   */
  public static function create($raw, $data, $statusCode)
  {
    $data = self::convertToArray($data);
    if (!isset($data['error']['code']) && isset($data['code'])) {
      $data = array('error' => $data);
    }
    $code = (isset($data['error']['code']) ? $data['error']['code'] : null);

    if (isset($data['error']['error_subcode'])) {
      switch ($data['error']['error_subcode']) {
        // Other authentication issues
        case 458:
        case 459:
        case 460:
        case 463:
        case 464:
        case 467:
          return new FacebookAuthorizationException($raw, $data, $statusCode);
          break;
      }
    }

    switch ($code) {
      // Login status or token expired, revoked, or invalid
      case 100:
      case 102:
      case 190:
        return new FacebookAuthorizationException($raw, $data, $statusCode);
        break;

      // Server issue, possible downtime
      case 1:
      case 2:
        return new FacebookServerException($raw, $data, $statusCode);
        break;

      // API Throttling
      case 4:
      case 17:
      case 341:
        return new FacebookThrottleException($raw, $data, $statusCode);
        break;

      // Duplicate Post
      case 506:
        return new FacebookClientException($raw, $data, $statusCode);
        break;
    }

    // Missing Permissions
    if ($code == 10 || ($code >= 200 && $code <= 299)) {
      return new FacebookPermissionException($raw, $data, $statusCode);
    }

    // OAuth authentication error
    if (isset($data['error']['type'])
      and $data['error']['type'] === 'OAuthException') {
      return new FacebookAuthorizationException($raw, $data, $statusCode);
    }

    // All others
    return new FacebookOtherException($raw, $data, $statusCode);
  }
?>

<?php
/*
 * 简短if语句，设置变量值
 */
$browser = (PHP_SAPI != 'cli');
?>

<?php
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
cho date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;
?>

<?php

protected function _openFile($pFilename)
{
	// Check if file exists
	if (!file_exists($pFilename) || !is_readable($pFilename)) {
		throw new PHPExcel_Reader_Exception("Could not open " . $pFilename . " for reading! File does not exist.");
	}

	// Open file
	$this->_fileHandle = fopen($pFilename, 'r');
	if ($this->_fileHandle === FALSE) {
		throw new PHPExcel_Reader_Exception("Could not open file " . $pFilename . " for reading.");
	}
}



/**
 * Can the current PHPExcel_Reader_IReader read the file?
 *
 * @param 	string 		$pFilename
 * @return boolean
 * @throws PHPExcel_Reader_Exception
 */
public function canRead($pFilename)
{
	// Check if file exists
	try {
		$this->_openFile($pFilename);
	} catch (Exception $e) {
		return FALSE;
	}

	$readable = $this->_isValidFormat();
	fclose ($this->_fileHandle);
	return $readable;
}

?>

<?php

	function save_to_local($source, $target) {
		if(!discuz_upload::is_upload_file($source)) {
			$succeed = false;
		}elseif(@copy($source, $target)) {
			$succeed = true;
		}elseif(function_exists('move_uploaded_file') && @move_uploaded_file($source, $target)) {
			$succeed = true;
		}elseif (@is_readable($source) && (@$fp_s = fopen($source, 'rb')) && (@$fp_t = fopen($target, 'wb'))) {
			while (!feof($fp_s)) {
				$s = @fread($fp_s, 1024 * 512);
				@fwrite($fp_t, $s);
			}
			fclose($fp_s); fclose($fp_t);
			$succeed = true;
		}
		if($succeed)  {
			$this->errorcode = 0;
			@chmod($target, 0644); @unlink($source);
		} else {
			$this->errorcode = 0;
		}

		return $succeed;
	}

	function make_dir($dir, $index = true) {
		$res = true;
		if(!is_dir($dir)) {
			$res = @mkdir($dir, 0777);
			$index && @touch($dir.'/index.html');
		}
		return $res;
	}

	function get_target_extension($ext) {
		static $safeext  = array('attach', 'jpg', 'jpeg', 'gif', 'png', 'swf', 'bmp', 'txt', 'zip', 'rar', 'mp3');
		return strtolower(!in_array(strtolower($ext), $safeext) ? 'attach' : $ext);
	}

	function get_target_dir($type, $extid = '', $check_exists = true) {

		$subdir = $subdir1 = $subdir2 = '';
		if($type == 'album' || $type == 'forum' || $type == 'portal' || $type == 'category' || $type == 'profile') {
			$subdir1 = date('Ym');
			$subdir2 = date('d');
			$subdir = $subdir1.'/'.$subdir2.'/';
		} elseif($type == 'group' || $type == 'common') {
			$subdir = $subdir1 = substr(md5($extid), 0, 2).'/';
		}

		$check_exists && discuz_upload::check_dir_exists($type, $subdir1, $subdir2);

		return $subdir;
	}

	function fileext($filename) {
		return addslashes(strtolower(substr(strrchr($filename, '.'), 1, 10)));
	}

	function is_image_ext($ext) {
		static $imgext  = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
		return in_array($ext, $imgext) ? 1 : 0;
	}
?>

<?php

		// First, lucky guess by inspecting file extension
		$pathinfo = pathinfo($pFilename);

		$extensionType = NULL;
		if (isset($pathinfo['extension'])) {
			switch (strtolower($pathinfo['extension'])) {
				case 'xlsx':			//	Excel (OfficeOpenXML) Spreadsheet
				case 'xlsm':			//	Excel (OfficeOpenXML) Macro Spreadsheet (macros will be discarded)
				case 'xltx':			//	Excel (OfficeOpenXML) Template
				case 'xltm':			//	Excel (OfficeOpenXML) Macro Template (macros will be discarded)
					$extensionType = 'Excel2007';
					break;
				case 'xls':				//	Excel (BIFF) Spreadsheet
				case 'xlt':				//	Excel (BIFF) Template
					$extensionType = 'Excel5';
					break;
				case 'ods':				//	Open/Libre Offic Calc
				case 'ots':				//	Open/Libre Offic Calc Template
					$extensionType = 'OOCalc';
					break;
				case 'slk':
					$extensionType = 'SYLK';
					break;
				case 'xml':				//	Excel 2003 SpreadSheetML
					$extensionType = 'Excel2003XML';
					break;
				case 'gnumeric':
					$extensionType = 'Gnumeric';
					break;
				case 'htm':
				case 'html':
					$extensionType = 'HTML';
					break;
				case 'csv':
					// Do nothing
					// We must not try to use CSV reader since it loads
					// all files including Excel files etc.
					break;
				default:
					break;
			}
?>

<?php
private function checkCreatePlanParams($p_aParams) {

	$aRule                  = array('sPlanName'             => array('reg' => '/^[a-zA-Z-\x{e}-\x{fa},]{,}$/u','require' => true, 'msg' => 'sPlanName-方案名称格式错误'),

		'iLoupanID'             => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iLoupanID-楼盘ID格式错误'),

		'sLoupanName'          => array('reg' => '/^[a-zA-Z-\x{e}-\x{fa},]{,}$/u','require' => true, 'msg' => 'sLoupanName-楼盘名称格式错误'),

		'sDevelopsName'        => array('reg' => '/^[a-zA-Z-\x{e}-\x{fa},]{,}$/u','require' => true, 'msg' => 'sDevelopsName-开发商名称格式错误'),

		'iDiscountRatio'       => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iDiscountRatio-贴息基数比例格式错误'),

		'iMortgageType'        => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iMortgageType-抵押方式格式错误'),

		'iDevelopersRatio'    => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iDevelopersRatio-开发商贴息率格式错误'),

		'iLenderRation'        => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iLenderRation-小P贴息率格式错误'),

		'iServiceFee'          => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iServiceFee-服务费格式错误'),

		'iSettlementType'      => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iSettlementType-服务费结算方式格式错误'),

		'sBankAccountName'     => array('reg' => '/^[a-zA-Z-\x{e}-\x{fa},]{,}$/u','require' => true, 'msg' => 'sBankAccountName-银行账户名格式错误'),

		'sBankAccount'          => array('reg' => '/^[a-z-]{,}$/','require' => true, 'msg' => 'sBankAccount-银行账号格式错误'),

		'iBankID'                => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iBankID-银行id格式错误'),

		'iBankName'              => array('reg' => '/^[a-zA-Z-\x{e}-\x{fa},]{,}$/u','require' => true, 'msg' => 'iBankName-银行名称格式错误'),

		'iManageID'              => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iManageID-管理员ID格式错误'),

		'iStartTime'             => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iStartTime-合同有效开始时间格式错误'),

		'iEndTime'               => array('reg' => '/^\d+$/','require' => true, 'msg' => 'iEndTime-合同有效结束时间格式错误'),

	);

	list($iFlag, $aErrMsg)   = self::_checkData($p_aParams, $aRule);

	if (!$iFlag) {

		$this->oResponse->setCode(class_apiresult::RST_ERR_PARAM, array_shift($aErrMsg));

		return false;

	}

	return true;
?>

<?php
	public function with($key, $value = null)
	{
		$key = is_array($key) ? $key : [$key => $value];
		foreach ($key as $k => $v)
		{
			$this->session->flash($k, $v);
		}
		return $this;
	}

	public function withCookie(Cookie $cookie)
	{
		$this->headers->setCookie($cookie);
		return $this;
	}

	public function withCookies(array $cookies)
	{
		foreach ($cookies as $cookie)
		{
			$this->headers->setCookie($cookie);
		}
		return $this;
	}

	public function __call($method, $parameters)
	{
		if (starts_with($method, 'with'))
		{
			return $this->with(snake_case(substr($method, 4)), $parameters[0]);
		}
		throw new BadMethodCallException("Method [$method] does not exist on Redirect.");
	}

	public function url()
	{
		return rtrim(preg_replace('/\?.*/', '', $this->getUri()), '/');
	}

?>

<?php
	protected $items = [];

	public function __construct(array $items = array())
	{
		$this->items = $items;
	}

	public function has($key)
	{
		return array_has($this->items, $key);
	}
?>

<?php
	public function __construct(Filesystem $files, array $paths, array $extensions = null)
	{
		$this->files = $files;
		$this->paths = $paths;
		if (isset($extensions))
		{
			$this->extensions = $extensions;
		}
	}

	protected function getOptions()
	{
		return array(
			array('class', null, InputOption::VALUE_OPTIONAL, 'The class name of the root seeder', 'DatabaseSeeder'),
			array('database', null, InputOption::VALUE_OPTIONAL, 'The database connection to seed'),
			array('force', null, InputOption::VALUE_NONE, 'Force the operation to run when in production.'),
		);
	}
?>

<?php
	protected $passthru = array(
		'toSql', 'lists', 'insert', 'insertGetId', 'pluck', 'count',
		'min', 'max', 'avg', 'sum', 'exists', 'getBindings',
	);
?>

<?php
	protected function newPivotQuery()
	{
		$query = parent::newPivotQuery();
		return $query->where($this->morphType, $this->morphClass);
	}

	parent::__construct($query, $parent, $table, $foreignKey, $otherKey, $relationName);

?>

<?php
	public function __construct(array $argv = null, InputDefinition $definition = null)
	{
		if (null === $argv) {
			$argv = $_SERVER['argv'];
		}
		// strip the application name
		array_shift($argv);
		$this->tokens = $argv;
		parent::__construct($definition);
	}
?>

<?php
	/**
	 *      * Parses a long option.
	 *           *
	 *                * @param string $token The current token
	 *                     */
	private function parseLongOption($token)
	{
		$name = substr($token, 2);
		if (false !== $pos = strpos($name, '=')) {
			$this->addLongOption(substr($name, 0, $pos), substr($name, $pos + 1));
		} else {
			$this->addLongOption($name, null);
		}
	}
?>

<?php
	private static $availableForegroundColors = array(
		'black' => array('set' => 30, 'unset' => 39),
		'red' => array('set' => 31, 'unset' => 39),
		'green' => array('set' => 32, 'unset' => 39),
		'yellow' => array('set' => 33, 'unset' => 39),
		'blue' => array('set' => 34, 'unset' => 39),
		'magenta' => array('set' => 35, 'unset' => 39),
		'cyan' => array('set' => 36, 'unset' => 39),
		'white' => array('set' => 37, 'unset' => 39),
	);
?>
