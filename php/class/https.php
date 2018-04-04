<?php
/**
 * 支付中心sdk基础类
 *
 * @filename base.php
 *
 * @project pay
 */

abstract class sdk_pay_base
{

    /**
     * HTTP 请求
     *
     * @param  string $p_sURL    请求地址
     * @param  array  $p_aParams 请求参数
     * @param  string $p_sMethod 请求方式
     * @param  array  $p_aHeader 头信息
     * @param  int    $p_iTimeout 超时设置
     * @return array
     */
    public function http($p_sURL, $p_aParams = array(), $p_sMethod = 'GET', $p_aHeader = array(), $p_iTimeout = 5) {
        $oCh = curl_init();

        curl_setopt($oCh, CURLOPT_TIMEOUT, 30);
        $p_aHeader[] = "Expect:";
        curl_setopt($oCh, CURLOPT_HTTPHEADER, $p_aHeader);
        curl_setopt($oCh, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($oCh, CURLOPT_DNS_USE_GLOBAL_CACHE, 0);
	//for http ssl
        curl_setopt($oCh, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($oCh, CURLOPT_FOLLOWLOCATION, 1);
        if($p_iTimeout){
            curl_setopt($oCh, CURLOPT_TIMEOUT, $p_iTimeout);
        }

        $sMethod = strtoupper($p_sMethod);
        if ($sMethod == 'GET') {
            if ( ! empty($p_aParams)) {
                $sQueryString = http_build_query($p_aParams);
                $p_sURL .= "?$sQueryString";
            }
        } elseif ($sMethod == 'POST') {
            $aPostFields = http_build_query($p_aParams);
            curl_setopt($oCh, CURLOPT_POST, 1);
            curl_setopt($oCh, CURLOPT_POSTFIELDS, $aPostFields);
        }

        curl_setopt($oCh, CURLOPT_URL, $p_sURL);
        $aData = curl_exec($oCh);
        $errno = curl_errno($oCh);

        $aResult = array('header' => array(), 'content' => '', 'errno' => 0, 'error' => '');
        if ($errno) {
            $aResult['errno'] = $errno;
            $aResult['error'] = curl_error($oCh);
            return $aResult;
        }
        $aInfo = curl_getinfo($oCh);
        curl_close($oCh);
        $aResult['content'] = $aData;
        $aResult['header'] = $aInfo;
        return $aResult;
    }

    /**
     * 获取请求接口根地址
     *
     * @return string
     */
    public function getInternalConfig(){
        $aConfig = get_config("pay", "internal");
        return $aConfig;
    }

    public function getRequestURL($p_sName, $p_iIsInternal = true) {
        $aConfig = $this->getInternalConfig();
        if (isset($aConfig['path'][$p_sName])){
            $sHost = $p_iIsInternal ? $aConfig['host'] : $aConfig['url'];
            return $sHost . $aConfig['path'][$p_sName];
        } else {
            return "";
        }
    }

    /**
     * 创建订单和退款业务公用函数
     * @param  array $p_aParams 业务参数
     * @param string $p_sKey    业务秘钥 Token
     * @param string $pUrl
     * @return array
     */
    protected function publicRequest($p_aParams, $p_sKey, $pUrl, $p_iIsInternal= true){
        $p_aParams['iRequestTime'] = time();
        foreach($p_aParams as $key => $val){
            $p_aParams[$key] = strval($val);
        }
        $sSign      = util_sign::signArray($p_aParams, $p_sKey);
        $p_aParams['sSign'] = $sSign;
        $sUrl       = $this->getRequestURL($pUrl, $p_iIsInternal);
        return [$sUrl,$p_aParams];
    }
}

/* End file */
