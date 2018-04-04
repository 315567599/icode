<?php
/**
 * orm queueorm
 * @package app-mq-shared_lib_orm
 */
load_lib('/orm/orm');
/**
 * orm queueorm
 * @author jxu
 * @package app-mq-shared_lib_orm
 */
class orm_queueorm extends orm_orm{

	/**
	 * Master数据库连接名,在子类中配置
	 * @var string
	 */
	protected $_sMasterDBName = 'queue_master';

	/**
	 * Slave数据库连接名,在子类中配置
	 * @var string
	 */
	protected $_sSlaveDBName = 'queue_slave';

	/**
	 * 分配DB
	 * @see orm_orm::_dispatchDB()
	 * @param string $p_sDBName
	 * @return string
	 */
	protected function _dispatchDB($p_sDBName){
		if(isset($this->iBID)){
			return $p_sDBName . '_' . floor($this->iBID / 10);
		}else{
			return $p_sDBName . '_0';
		}
	}

	/**
	 * 分配表
	 * @see orm_orm::_dispatchTable()
	 * @param string $p_sTblName
	 * @return string
	 */
	protected function _dispatchTable($p_sTblName){
		if(isset($this->iBID)){
			return $p_sTblName . '_' . ($this->iBID % 10);
		}else{
			return $p_sTblName . '_0';
		}
	}
}
