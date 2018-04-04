<?php
	$next_dumpfile = preg_replace('/^(\d+)\_(\w+)\-(\d+)\.sql$/', '\\1_\\2-'.$get['volume'].'.sql', $get['dumpfile']);

		if(is_dir($filename) && preg_match('/backup_(\d+)_\w+$/', $filename, $match)) {

		if(is_file($filename) && preg_match('/\d+_\w+\-(\d+).sql$/', $filename, $match)) {

		if(is_file($filename) && preg_match('/\d+_\w+\-(\d+).sql$/', $filename) && !@unlink($filename)) {

			if(preg_match('/^\d+\_\w+\-\d+\.sql$/', $entry)) {

				$file_bakfile = preg_replace('/^(\d+)\_(\w+)\-(\d+)\.sql$/', '\\1_\\2-1.sql', $entry);


?>

<?php
 if(preg_match('/<b>(.*?)<\/b>/i', $announce['subject'])) { 

?>

<?php
'inline_file_types' => '/\.(gif|jpe?g|png)$/i',
?>
