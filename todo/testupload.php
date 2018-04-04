<?php
	require_once dirname(__FILE__) . '/HFUpload.php';

	$upload_handle = new HFUpload();
	$upload_dir = dirname(__FILE__). '/files/'; 
	$upload_handle->set_upload_dir($upload_dir);

	$ret = $upload_handle->upload('attach');
	if(!$ret){
		echo $upload_handle->get_error_message();
	}
	var_dump($ret);
?>
