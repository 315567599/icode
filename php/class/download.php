<?php
/**
 * 下载页面
 * @author linhaisong
 */
load_controller('/base');
load_lib('/bll/base');
class down_downloadcontroller extends basecontroller{
	private $_sPath;
	private $_sFileName;
	private $_iFileSize;
	private $_sAction;
	const BUFFER_SIZE = 1024;
	
	public function doRequest(){
		$this->_sAction = $this->getParam('sAction', 'url');
		if(empty($this->_sAction)){
			$this->redirectURL('/');
		}
		
		switch($this->_sAction){
			case 'pic':
				$this->getPicParams();
				break;
			default:
				$this->redirectURL('/');
		}
		$this->downFile();
		return '/manage/down/download';
	}
	
	private function downFile(){
		//下载文件需要用到的头
		header("Content-type:text/html;charset=utf-8");
		Header("Content-type: application/octet-stream");
		Header("Accept-Ranges: bytes");
		Header("Accept-Length:".$this->_iFileSize);
		Header("Content-Disposition: attachment; filename=".$this->_sFileName);
		
		//向浏览器返回数据
		$file = file_get_contents($this->_sPath);
		echo $file;
	}
	
	private function getPicParams(){
		$sKey = $this->getParam('key', 'url');
		$sExt = $this->getParam('ext', 'url');
		$sLength = $this->getParam('length', 'url');
		$sWidth = $this->getParam('width', 'url');
		$sType = $this->getParam('type', 'url');
		if(empty($sKey) || empty($sExt) || empty($sLength) || empty($sWidth)){
			$this->redirectURL('/');
		}
		load_lib('/util/url');
		if(isset($sType)){	//区分文件服务类型
			$this->_sPath = util_url::getNewDFSViewURL($sType, $sKey, $sExt, $sLength, $sWidth);
		}
		else{	//不区分文件服务类型
			$this->_sPath = util_url::getDFSViewURL($sKey, $sExt, $sLength, $sWidth);
		}
		$this->_sFileName = basename($this->_sPath);
		$file = file_get_contents($this->_sPath);
		$this->_iFileSize = strlen($file);
	}
}
