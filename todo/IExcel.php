<?php
interface IExcel 
{
	//excel 文件内容转化为数组
	public function readExcel($pFilename); 

	//根据数组生成excel文件
	public function saveExcel($pFilename, $aData); 
}
?>
