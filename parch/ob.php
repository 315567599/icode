<?php
/**
 * 	 * 开始内联脚本
 * 	 	 */
protected function startLScript(){
	ob_start();
}

/**
 * 	 * 结束内联脚本
 * 	 	 */
protected function endLScript(){
	self::$_aInlineScript[] = ob_get_contents();
	ob_end_clean();
}

?>


<?php
if(get_config('bPageMinify')){
	ob_start();
	include $sClassFilePath;
	$sContent = ob_get_contents();
	ob_end_clean();
	load_lib('/sys/util/minifyhtml');
	echo sys_util_minifyhtml::minify($sContent);
}

?>
