<?php
load_lib('/bll/haofang');
load_lib ( '/dao/api/messagedao' );
load_lib('/util/url');

/**
 * @todo消息bll
*/
class bll_api_base_message extends bll_haofang{
	
	/**
	 * @todo消息模式
	 */
	const MESSAGE_MODE=1;
	
	/**
	 * @todo自定模式
	 */
	const CUSTOM_MODE=2;
	
	/**
	 * @todo对应设备
	 */
	public static $a_Type=array(
		0=>'全部',
		1=>'安卓',
		2=>'IOS'
	);
	
	/**
	 * @todo状态
	 */
	public static $a_status=array(
		0=>'无效',
		1=>'正常',
		2=>'推送中',
		3=>'推送成功',	
		4=>'推送失败'	
	);
	
	/**
	 * @todo添加消息
	 * @param array $aData 
	 * @return integer
	 */
    public function addData($aData)
    {
    	return dao_api_messagedao::addData($aData);
    }
    
    
	/**
	 * @todo修改消息
	 * @param array $aData 
	 * @return integer
	 */
    public function editData($aData)
    {
    	return dao_api_messagedao::updData($aData);
    }
    
    
    /**
     * @todo权限列表
     * @param integer $iID
     * @return array
     */
    public function getDetail($iID)
    {	
    	$messageInfo= dao_api_messagedao::getDetail($iID);
    	if(@$messageInfo['iAutoID']){
    		//120, 100
    		$messageInfo['img_url']=util_url::getNewDFSViewURL('banner', @$messageInfo['sImgKey'], @$messageInfo['sImgExt']);
    		if($messageInfo['iMode']==self::MESSAGE_MODE){
    			$messageInfo['sUrl']='http://'.get_config('sResourceDomain').'/m/v.id.'.$iID.'.html?t='.$messageInfo['iUpdateTime'];
    		}
    	}
		return $messageInfo ? $messageInfo : array ();
    }
    
    
  	/**
     * @todo获取消息列表
     * @param array $p_parms
     * @param integer $p_start
     * @param integer $p_limit
     * @param array $p_sOrder
     * @return array
     */
    public function getList($p_parms, $p_start, $p_limit , $p_sOrder)
    {
    	//96*72
    	$list=dao_api_messagedao::getPageList($p_parms, $p_start, $p_limit, $p_sOrder);
    	foreach ($list as &$val){
    		$val['equipment']=bll_api_base_message::$a_Type[@$val['iType']];
    		$val['img_url']=util_url::getNewDFSViewURL('banner', @$val['sImgKey'], @$val['sImgExt']);
    		if($val['iMode']==self::MESSAGE_MODE){
    			$val['sUrl']='http://'.get_config('sResourceDomain').'/m/v.id.'.$val['iAutoID'].'.html?t='.$val['iUpdateTime'];
    		}
    	}
    	return [
    	  'list'=>$list ? $list : array(),
    	  'total'=>dao_api_messagedao::getCnt($p_parms)
    	];
    }
}
?>
