<?php 
/**
 *	参数传递对象--引用传递
 *      * 检查对账结果 成功则返回结果
 *           * @param $p_iDate
 *                * @param $p_iChannelID
 *                     * @param $p_oResponse
 *                          * @return array|bool
 *                               */
public function checkAccChkStatus($p_iDate,$p_iChannelID,$p_oResponse) {
	//检查对账执行状态
	$bResult = dao_finance_accountchkdao::checkAccChkResult($p_iDate,$p_iChannelID);
	if (count($bResult)) {
		switch($bResult['iCheckStatus']) {
		case bll_finance_const::ACC_CHK_SUCCESS :
			//对账成功则 输出结果
			$aDataArr = dao_finance_accountchkdao::getAccChkResult($p_iDate,$p_iChannelID);
			if (count($aDataArr)) {
				$p_oResponse->mData = bll_finance_common::FormatData($aDataArr);
				$p_oResponse->setCode(bll_finance_apiresult::RST_SUCCESS);
			}
			break;
		case bll_finance_const::ACC_GET_FILE_ERROR :
			//接收导入文件过程中出错
			$p_oResponse->setCode(bll_finance_apiresult::FAILED_GET_FILE);
			break;
		case bll_finance_const::ACC_IS_GOING :
			//对账正在进行..
			$p_oResponse->setCode(bll_finance_apiresult::ACC_IS_GOING);
			break;
		case bll_finance_const::ACC_CHK_DATA_EMPTY :
			//无对账数据 和订单数据
			$p_oResponse->setCode(bll_finance_apiresult::ACC_CHK_DATA_EMPTY);
			break;
		}
		return true;
	}
	$p_oResponse->setCode(bll_finance_apiresult::RST_ERR_PARAM);
	return false;
}

?>
