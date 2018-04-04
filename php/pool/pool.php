<?php
/**
 * sms pooling
 * @package system_common_lib_sms
 */
/**
 * sms pooling
 * @author jxu
 * @package system_common_lib_sms
 */
class sms_pooling{

	/**
	 * 邮件服务实例
	 * @var object
	 */
	private static $_oInstance = null;

	/**
	 * 数据库连接池
	 * @var array
	 */
	private static $_aConnect = array();

	/**
	 * 构造函数
	 */
	private function __construct(){}

	/**
	 * 析构函数
	 */
	function __destruct(){}

	/**
	 * 构造函数
	 */
	private function __clone(){}

	/**
	 * 获取实例
	 * @return object
	 */
	static function getInstance(){
		if(!(self::$_oInstance instanceof self)){
			self::$_oInstance = new self();
		}
		return self::$_oInstance;
	}

	/**
	 * 获取sms服务连接
	 * @param string $p_sSMSName
	 * @return object
	 */
	static function getConnect($p_sSMSName){
		if(!isset(self::$_aConnect[$p_sSMSName])){
			self::$_aConnect[$p_sSMSName] = self::_loadSMS($p_sSMSName);
		}
		return self::$_aConnect[$p_sSMSName];
	}

	/**
	 * 加载sms服务连接
	 * @param string $p_sSMSName
	 * @return object
	 */
	private static function _loadSMS($p_sSMSName){
		switch($p_sSMSName){
			case 'lkaaFu':
				load_lib('/sms/client');
				$aConfig = get_config($p_sSMSName, 'sms');
				$oSMS = new sms_pafclient($aConfig['sServerIP'], $aConfig['sUserName'], $aConfig['sPassword'], $aConfig['sGateWay']);
				return $oSMS;
				break;
			case 'YM3alksdjfain1':
				load_lib('/sms/ym3alksdj1client');
				$aConfig = get_config($p_sSMSName, 'sms');
				$oSMS = new sms_ym31client($aConfig['sGateWay'], $aConfig['sSN'], $aConfig['sPassword']);
				return $oSMS;
			case 'YMadalskdjfs':
				load_lib('/sms/ym31alksdjclient');
				$aConfig = get_config($p_sSMSName, 'sms');
				$oSMS = new sms_ym31client($aConfig['sGateWay'], $aConfig['sSN'], $aConfig['sPassword']);
				return $oSMS;
			case '95511':
				load_lib('/sms/lksdddclient');
				return (new sms_xlkjds1client());
			/*case 'xuanwu':
				load_lib('/sms/xuanwuclient');
				$oSMS = new sms_xuanwuclient();
				return $oSMS;*/
			case 'mongate':
				load_lib('/sms/mongateclient');
				$oSMS = new sms_mongateclient();
				return $oSMS;
			default:
				break;
		}
	}
}
