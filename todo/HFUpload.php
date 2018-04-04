<?php
/**
 * 文件上传类
 * author: jiangchao <jiangchao375@pingan.com.cn>
 * Thu Jan 22 2015
 */

class HFUpload
{
	//上传文件选项设置
	protected $options;

	//文件上传错误类型 
	protected $error_code;

	protected $error_messages = array(
		1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		2 => 'No file was uploaded',
		3 => 'Failed to write file to disk',
		4 => 'Filetype not allowed',
		5 => 'Maximum number of files exceeded',
		6 => 'File is too big',
		7 => 'File is too small',
	);

	//构造函数
	public function __construct($options = null){
		$this->options = array(
			'upload_dir' => dirname($this->get_server_var('SCRIPT_FILENAME')).'/files/',
			//默认按照日期文件夹存储
			'mkdir_mode' => 0777,
			//允许上传的类型
			//'accept_file_types' => '/.+$/i',
			'accept_file_types' => '/\.(xls|xlsx|csv|gpg|png)$/i',
			//上传文件最大体积
			'max_file_size' => null,
			//上传文件最小体积
			'min_file_size' => null,
			//同时上传最大文件数
			'max_number_of_files' => null,
			//图像文件类型
			'image_file_types' => '/\.(gif|jpe?g|png)$/i',
			'upload_filename' => '',
		);

		if ($options) {
			$this->options = $options + $this->options;
		}

	}

	//设置上传文件目录
	public function set_upload_dir($dir){
		$this->options['upload_dir'] = $dir;
	}

	//设置上传文件名称
	public function set_upload_filename($filename){
		$this->options['upload_filename'] = $filename;
	}

	//验证上传文件是否合法
	protected function validate($uploaded_file) {
		//上传文件大于php.ini设置
		$content_length = (int)$this->get_server_var('CONTENT_LENGTH');
		$post_max_size = $this->get_config_bytes(ini_get('post_max_size'));
		if ($post_max_size && ($content_length > $post_max_size)) {
			$this->error_code = 1;
			return false;
		}
		//文件大于option设置
		$file_size = $this->get_file_size($uploaded_file);
		if ($this->options['max_file_size'] && ($file_size > $this->options['max_file_size'])) {
			$this->error_code = 6; 
			return false;
		}
		//文件小于option设置
		if ($this->options['min_file_size'] && ($file_size < $this->options['min_file_size'])) {
			$this->error_code = 7; 
			return false;
		}
		//检查是否是允许上传的文件类型
		if (!preg_match($this->options['accept_file_types'], $uploaded_file)) {
			$this->error_code = 4;
			return false;
		}

	}

	//执行上传
	function upload($html_field_name) {
		$arr = array();
		$keys = array_keys($_FILES[$html_field_name]['name']);
		foreach($keys as $key) {
			if(!$_FILES[$html_field_name]['name'][$key]) {
				continue;
			}
			$file = array(
				'name' => $_FILES[$html_field_name]['name'][$key],
				'tmp_name' => $_FILES[$html_field_name]['tmp_name'][$key]
			);

			//if(!$this->validate($file['tmp_name'])) break;	

			$filename = $this->get_target_dir() . '/' . $this->get_target_filename();
			if ($this->copy($file['tmp_name'], $filename )){

				$arr[$key]['file'] = $filename;
			}
		}

		return $arr;
	}

	//保存上传文件
	protected function copy($sourcefile, $destfile){
		$succeed = false;

		if(function_exists('move_uploaded_file') && @move_uploaded_file($sourcefile, $targetfile)) {
			$success = true;
		}elseif (@is_readable($sourcefile) && (@$fp_s = fopen($sourcefile, 'rb')) && (@$fp_t = fopen($destfile, 'wb'))){
			while (!feof($fp_s)) {
				$s = @fread($fp_s, 1024 * 512);
				@fwrite($fp_t, $s);
			}
			fclose($fp_s); fclose($fp_t);
			$succeed = true;
		}

		if($succeed)  {
			$this->error_code = 0;
			@chmod($targetfile, 0644); @unlink($sourcefile);
		} else {
			$this->errorcode = 3;
		}

		return $succeed;
	}

	//获取文件大小
	protected function get_file_size($file_path) {
		return $this->fix_integer_overflow(filesize($file_path));
	}

	//获取上传文件名
	protected function get_target_filename($forcename = ''){
		if ('' != $forcename){
			return $forcename;
		}

		if ('' == $forcename && $this->options['upload_filename']){
			return $this->options['upload_filename'];
		}

		return date('His').strtolower($this->random(16));
	}

	//获取上传文件目录
	protected function get_target_dir($forcedir = ''){
		if ($forcedir) return $forcedir;
		//按日期生成目录
		$dir = $this->options['upload_dir'];
		$subdir1 = $dir . date('Ym');
		!is_dir($subdir1) && mkdir($subdir1, 0777);
		$subdir2 = date('d');
		echo "$subdir1/$subdir2";
		!is_dir("$subdir1/$subdir2") && mkdir("$subdir1/$subdir2", 0777);

		return "$subdir1/$subdir2";
	}

	private function random($length, $numeric = 0) {
		PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
		if($numeric) {
			$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
		} else {
			$hash = '';
			$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
			$max = strlen($chars) - 1;
			for($i = 0; $i < $length; $i++) {
				$hash .= $chars[mt_rand(0, $max)];
			}
		}
		return $hash;
	}

	protected function get_config_bytes($val) {
		$val = trim($val);
		$last = strtolower($val[strlen($val)-1]);
		switch($last) {
		case 'g':
			$val *= 1024;
		case 'm':
			$val *= 1024;
		case 'k':
			$val *= 1024;
		}
		return $this->fix_integer_overflow($val);
	}

	// Fix for overflowing signed 32 bit integers,
	// works for sizes up to 2^32-1 bytes (4 GiB - 1):
	protected function fix_integer_overflow($size) {
		if ($size < 0) {
			$size += 2.0 * (PHP_INT_MAX + 1);
		}
		return $size;
	}

	protected function get_server_var($id) {
		return @$_SERVER[$id];
	}

	//获取错误信息
	public function get_error_message() {
		return isset($this->error_messages[$this->error_code]) ?
			$this->error_messages[$this->error_code] : 'NOT KNOWN';
	}

	//返回文件后缀
	function fileext($filename) {
		return addslashes(strtolower(substr(strrchr($filename, '.'), 1, 10)));
	}

	//文件上传类型是否为image
	function is_image_ext($ext) {
		static $imgext  = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
		return in_array($ext, $imgext) ? 1 : 0;
	}

}
?>
