<?php
/**
 * 解析excel
 * author: jiangchao <jiangchao375@pingan.com.cn>
 * Thu Jan 22 2015
 *
 * usage:
 * $data = $data = HFExcel::getInstance()->readExcel($inputFileName);
 */

require_once dirname(__FILE__) . '/IExcel.php';
class HFExcel implements IExcel
{
	//单例
	private static $_instance;
	//excel 处理类句柄
	//protected $_excelHandle; 

	private function __construct() {
		require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
	}

	public static function getInstance() {
		if (!isset(self::$_instance)) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	//通过PHPExcel类，解析excel文件为数组
	public function readExcel($filename) {
		if (!file_exists($filename) || !is_readable($filename)) {
			throw new Exception("Could not open " . $filename . " for reading! File does not exist.");
		}

		try {
			$inputFileType = PHPExcel_IOFactory::identify($filename);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($filename);
			$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
			return $sheetData;
		} catch (Exception $e){
	 	 	throw new Exception("failed to read excel");
			//return null;
		}
	}

	public function saveExcel($filename, $aData){

	}

}
?>
