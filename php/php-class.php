<?php
/**
*
*我们知道，在访问和写入对象的一个不存在的成员变量时， __get() __set() 会被自动调用，Yii正是利用这点，提供对属性的支持的。从上面的代码中，可以看出，如果访问一个对象的某个属性，Yii会调用名为 get属性名() 的函数。如， SomeObject->Foo ，会自动调用 SomeObject->getFoo() 。如果修改某一属性，会调用相应的setter函数。如， SomeObject->Foo = $someValue ，会自动调用 SomeObject->setFoo($someValue) 。
*/
public function __get($name)              // 这里$name是属性名
{
    $getter = 'get' . $name;              // getter函数的函数名
    if (method_exists($this, $getter)) {
        return $this->$getter();          // 如果没有找到，getter，同时存在setter函数,则提示“只写异常”
    } elseif (method_exists($this, 'set' . $name)) {
        throw new InvalidCallException('Getting write-only property: ' . get_class($this) . '::' . $name);
    } else {
        throw new UnknownPropertyException('Getting unknown property: ' . get_class($this) . '::' . $name);
    }
}

public function __set($name, $value)     // $name是属性名，$value是拟写入的属性值
{
    $setter = 'set' . $name;             // setter函数的函数名
    if (method_exists($this, $setter)) {
        $this->$setter($value);          // 调用setter函数
    } elseif (method_exists($this, 'get' . $name)) {
        throw new InvalidCallException('Setting read-only property: ' . get_class($this) . '::' . $name);
    } else {
        throw new UnknownPropertyException('Setting unknown property: ' . get_class($this) . '::' . $name);
    }
}
?>

<?php
class View
{
	const VIEW_BASE_PATH = '/app/views/';

	public $view;
	public $data;

	public function __construct($view)
	{
		$this->view = $view;
	}

	public static function make($viewName = null)
	{
		if ( ! $viewName ) {
			throw new InvalidArgumentException("视图名称不能为空！");
		} else {

			$viewFilePath = self::getFilePath($viewName);
			if ( is_file($viewFilePath) ) {
				return new View($viewFilePath);
			} else {
				throw new UnexpectedValueException("视图文件不存在！");
			}
		}
	}

	public function with($key, $value = null)
	{
		$this->data[$key] = $value;
		return $this;
	}

	private static function getFilePath($viewName)
	{
		$filePath = str_replace('.', '/', $viewName);
		return BASE_PATH.self::VIEW_BASE_PATH.$filePath.'.php';
	}

	public function __call($method, $parameters)
	{
		if (starts_with($method, 'with'))
		{
			return $this->with(snake_case(substr($method, 4)), $parameters[0]);
		}

		throw new BadMethodCallException("方法 [$method] 不存在！.");
	}
}
?>

<?php
class util_guid{

	/**
	 * 获取GUID
	 * @return string
	 */
	static function getGuid($p_bUpper = false, $p_sJoin = ''){
		$sRaw = md5(strtolower(get_config('sServerName') . '/' . sys_variable::getInstance()->getParam('SERVER_ADDR', 'server')) . ':' . self::_getTimeMillis() . ':' . self::_getLong());
		if($p_bUpper){
			$sRaw = strtoupper($sRaw);
		}
		return substr($sRaw, 0, 8) . $p_sJoin . substr($sRaw, 8, 4) . $p_sJoin . substr($sRaw, 12, 4) . $p_sJoin . substr($sRaw, 16, 4) . $p_sJoin . substr($sRaw, 20);
	}

	/**
	 * 获取时间参数
	 * @return string
	 */
	private static function _getTimeMillis(){
		list($usec, $sec) = explode(' ', microtime());
		return $sec . substr($usec, 2, 3);
	}

	/**
	 * 获取整长型数
	 * @return long
	 */
	private static function _getLong(){
		$tmp = rand(0, 1) ? '-' : '';
		return $tmp . rand(1000, 9999) . rand(1000, 9999) . rand(1000, 9999) . rand(100, 999) . rand(100, 999);
	}
}
?>

<?php
/*
* 内部api调用 ip控制
*/
class ServiceFilter extends BaseFilter
{
    public function filter()
    {
        $clientIp = Request::getClientIp();
        $serviceAllowIps = Config::get("acl.serviceip");

        if ( !in_array($clientIp, $serviceAllowIps) ) {
            return HFApiResponse::error('10000002');
        }
    }
}
?>

<?php
class util_sign {

    /**
     * 对给定的数组进行签名，数组最好是1维的，否则Java/Objc可能不容易解析
     * 只对第一层key进行排序
     * @param $p_aParams
     * @param $p_sKey
     * @return string
     */
    public static function signArray($p_aParams, $p_sKey) {
        $sToSort = $p_aParams;
        ksort($sToSort);
        $sSign = md5($p_sKey."_ping_an_fang_".json_encode($sToSort));
        $sSignSign = md5($sSign."_ping_an_fang_".$p_sKey);
        return $sSignSign;
    }

    /**
     * @param $p_aParams
     * @param $p_sKey
     * @param $p_sSign
     * @return bool
     */
    public static function verifySign($p_aParams, $p_sKey, $p_sSign) {
        $sSignSign = self::signArray($p_aParams, $p_sKey);
        return $p_sSign == $sSignSign;
    }

}
?>
