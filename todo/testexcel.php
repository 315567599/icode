<?php
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Shanghai');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/HFExcel.php';

echo " Read new PHPExcel object" , EOL;

$callStartTime = microtime(true);
/** PHPExcel_IOFactory */
$inputFileName = './haofangdai.xlsx';

$data = HFExcel::getInstance()->readExcel($inputFileName);
var_dump($data);
/** PHPExcel_profile */
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
echo 'Call time to read Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;

?>
