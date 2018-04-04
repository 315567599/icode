<?php
/**
 *  * cmd controller
 *   * @package system_kernel_lib_cmd
 *    */
load_lib('/sys/controller');
/**
 *  * cmd controller
 *   * @author jxu
 *    * @package system_kernel_lib_cmd
 *     */
abstract class cmd_controller extends sys_controller{

	/**
	 * 	 * 程序开始时间
	 * 	 	 * @var float
	 * 	 	 	 */
	private $_fStartTime = '';

	/**
	 * 	 * 程序结束时间
	 * 	 	 * @var float
	 * 	 	 	 */
	private $_fEndTime = '';

	/**
	 * 	 * 时间花费
	 * 	 	 * @var array
	 * 	 	 	 */
	private $_aTimeSpend = array();

	/**
	 * 	 * 输出类型
	 * 	 	 * @var string
	 * 	 	 	 */
	private $_sStdType = '';

	/**
	 * 	 * 输出文件
	 * 	 	 * @var string
	 * 	 	 	 */
	private $_sStdOutFile = '';

	/**
	 * 	 * 构造函数
	 * 	 	 */
	function __construct(){
		parent::__construct();
	}

	/**
	 * 	 * 在控制器开始时执行（调度使用）
	 * 	 	 * @todo 要修改脚本部分
	 * 	 	 	 */
	function beforeRequest(){
		parent::beforeRequest();
		$this->_sStdType = get_config('sStdout', 'cmd');
		if('screen' == $this->_sStdType or '' == $this->_sStdType){}else{
			load_lib('/sys/util/string');
			$sCmdName = sys_util_string::trimString($this->getParam('DISPATCH_PARAM', 'server'), '/');
			if('' != $sCmdName){
				$sCmdName = str_replace('/', '-', $sCmdName);
				$aStdCfg = get_config($sCmdName, 'cmd');
				$sFileName = $sCmdName;
				$aParam = $this->getParam('REQUEST_ARGV', 'server');
				if(null !== $aParam){
					ksort($aParam);
					foreach($aParam as $sKey => $sValue){
						$sFileName .= '_' . strtolower($sKey) . '-' . $sValue;
					}
				}
				if(null === $aStdCfg){
					$sFilePath = $this->_sStdType . DIRECTORY_SEPARATOR . $sFileName . '.log';
				}else{
					$iTime = $this->getTime();
					switch($aStdCfg['sSplitType']){
					case 'day':
						$sFilePath = $this->_sStdType . DIRECTORY_SEPARATOR . $aStdCfg['sDir'] . DIRECTORY_SEPARATOR . date('Ymd', $iTime) . DIRECTORY_SEPARATOR . $sFileName . '.log';
						break;
					case 'week':
						$sFilePath = $this->_sStdType . DIRECTORY_SEPARATOR . $aStdCfg['sDir'] . DIRECTORY_SEPARATOR . date('YW', $iTime) . DIRECTORY_SEPARATOR . $sFileName . '.log';
						break;
					case 'month':
						$sFilePath = $this->_sStdType . DIRECTORY_SEPARATOR . $aStdCfg['sDir'] . DIRECTORY_SEPARATOR . date('Ym', $iTime) . DIRECTORY_SEPARATOR . $sFileName . '.log';
						break;
					case 'persistent':
						$sFilePath = $this->_sStdType . DIRECTORY_SEPARATOR . $aStdCfg['sDir'] . DIRECTORY_SEPARATOR . $sFileName . '.log';
						break;
					}
				}
				$stFileDir = dirname($sFilePath);
				if(!is_dir($stFileDir)){
					umask(0000);
					if(false === mkdir($stFileDir, 0755, true)){
						throw new Exception(__CLASS__ . ': can not create path(' . $stFileDir . ').');
						return false;
					}
				}
				$this->_sStdOutFile = $sFilePath;
			}
		}
		$this->_fStartTime = $this->getMicroTime();
		$this->stdOut('PHP Console Type Start: ' . get_class($this));
	}

	/**
	 * 	 * 在控制器结束时执行（调度使用）
	 * 	 	 */
	function afterRequest(){
		$this->stdOut('PHP Console Type End');
		$this->_fEndTime = $this->getMicroTime();
		$this->stdOut('Execute time: ' . ($this->_fEndTime - $this->_fStartTime));
		parent::afterRequest();
	}

	/**
	 * 	 * 计算时间花费
	 * 	 	 * @param string $p_sName
	 * 	 	 	 */
	protected function calTime($p_sName){
		if(isset($this->_aTimeSpend[$p_sName])){
			$fTime = $this->getMicroTime();
			$fSpendTime = $fTime - $this->_aTimeSpend[$p_sName];
			$this->_aTimeSpend[$p_sName] = $fTime;
			return $fSpendTime;
		}else{
			$this->_aTimeSpend[$p_sName] = $this->getMicroTime();
		}
	}

	/**
	 * 	 * 输出信息到控制台
	 * 	 	 */
	protected function stdOut($p_sMsg){
		$sContent = date('Ymd H:i:s') . ' ' . $p_sMsg . PHP_EOL;
		if('screen' == $this->_sStdType or '' == $this->_sStdType){
			echo $sContent;
		}else{
			if('' != $this->_sStdOutFile){
				file_put_contents($this->_sStdOutFile, $sContent, FILE_APPEND);
			}
		}
	}

	/**
	 * 	 * 获取当前时间
	 * 	 	 * @return int
	 * 	 	 	 */
	protected function getRealTime(){
		return self::$_aAllPri['oVari']->getRealTime();
	}

	protected function terminal($command){
		system
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

	/**
	 * 获取命令行模式的自定义参数
	 *
	 * @param  string $sKey     参数名
	 * @param  mixed  $mDefault 默认值
	 * @return mixed
	 * @author wanglong@pinganfang.com
	 */
	public function get_argv($sKey = '', $mDefault = false)
	{
		static $aCached = [];

		if (empty($aCached))
		{
			$aArgs = $_SERVER['argv'];
			$iLen = count($aArgs);
			if ($iLen > 2)
			{
				$i = 2;
				while($i < $iLen)
				{
					$aCached[$aArgs[$i]] = $aArgs[$i+1];
					$i = $i + 2;
				}
			}
		}

		return $sKey === '' ? $aCached : (isset($aCached[$sKey]) ? $aCached[$sKey] : $mDefault);
	}

}
