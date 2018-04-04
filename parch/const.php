<?php
class dao_mq_queuedao extends dao_dao{

	/**
 * 	 * 消息状态-待处理
 * 	 	 * @var int
 * 	 	 	 */
	const MSG_STATUS_PENDING = 1;

	/**
 * 	 * 消息状态-处理中
 * 	 	 * @var int
 * 	 	 	 */
	const MSG_STATUS_HANDLE = 2;

	/**
 * 	 * 消息状态-成功
 * 	 	 * @var int
 * 	 	 	 */
	const MSG_STATUS_SUCCESS = 3;

	static function addData($p_aMsg){
		$p_aMsg['iCreateTime'] = self::getTime();
		$p_aMsg['iStatus'] = self::MSG_STATUS_PENDING;
		if(!isset($p_aMsg['iPlanTime'])){
			$p_aMsg['iPlanTime'] = self::getTime();
		}
		$p_aMsg['iFinishTime'] = 0;
		load_lib('/orm/queueorm');
		$oORM = new orm_queueorm('t_queue');
		$oORM->loadSource($p_aMsg);
		return $oORM->addData();
	}
?>

<?php
/**
 * usage
 */

	$aParam = array( 
		'iPlanTime' => $p_iTime,
		'iStatus' => dao_mq_queuedao::MSG_STATUS_PENDING,
		'iBID' => $p_iBID 
	);
?>
