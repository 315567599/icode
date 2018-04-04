<?php

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Shanghai');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

echo " Read new PHPExcel object" , EOL;

$callStartTime = microtime(true);
/** PHPExcel_IOFactory */
$inputFileName = './haofangdai.xlsx';
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);

echo 'File ',pathinfo($inputFileName,PATHINFO_BASENAME),' has been identified as an ',$inputFileType, EOL;
echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with the identified reader type', EOL;
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($inputFileName);

echo EOL;
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
var_dump($sheetData);


/** PHPExcel_profile */
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
echo 'Call time to read Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;

?>
