<?php
interface IDataBase {
	public function connect($host, $user, $passwd, $dbname);
	public function query($sql);
	public function close();
}


class Mysql implements IDataBase {

	private $_adaptee;  

	function __construct() {  
		$this->_adaptee = new Adaptee();   
	}

	public function connect($host, $user, $passwd, $dbname){
		/**
		 *          * code...
		 *                   * 委派调用Adaptee的connect方法
		 *                            */
		$this->_adaptee->connect($host, $user, $passwd, $dbname);
		//return 'ok';
	}

	public function query($sql){
		/**
		 * code...
		 */
		return 'ok';
	}

	public function close(){
		/**
		 * code...
		 */
		return 'ok';
	}
}
?>
