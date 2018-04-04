<?php
load_lib('/util/url');
load_lib('/util/log');

/**
 * SDK 基础类
 *
 * @package app-hf-base-sdk
 * @version 2.0
 * @author  wanglong <wanglong@pinganfang.com>
 */
abstract class sdk_base
{
    /**
     * 获取请求接口根地址（子类需重写）
     *
     * @return string
     * @author wanglong <wanglong@pinganfang.com>
     */
    abstract function getRequestURL();

    // --------------------------------------------------------------------

    /**
     * HTTP 请求
     *
     * @param  string $p_sURL    请求地址
     * @param  array  $p_aParams 请求参数
     * @param  string $p_sMethod 请求方式
     * @param  array  $p_aHeader 头信息
     * @return array
     * @author wanglong <wanglong@pinganfang.com>
     */
    public function http($p_sURL, $p_aParams = array(), $p_sMethod = 'GET', $p_aHeader = array())
    {        
        $oCh = curl_init();

        curl_setopt($oCh, CURLOPT_TIMEOUT, 30);
        curl_setopt($oCh, CURLOPT_HTTPHEADER, $p_aHeader);
        $bReturn = (isset($this->_showCurlReturn) && $this->_showCurlReturn === true) ? 0 : 1;
        curl_setopt($oCh, CURLOPT_RETURNTRANSFER, $bReturn);
        curl_setopt($oCh, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($oCh, CURLOPT_DNS_USE_GLOBAL_CACHE, 0);

        $sMethod = strtoupper($p_sMethod);
        if ($sMethod == 'GET')
        {
            if ( ! empty($p_aParams))
            {
                $sQueryString = http_build_query($p_aParams);
                $p_sURL .= "?$sQueryString";
            }
        }
        elseif ($sMethod == 'POST')
        {
            $aPostFields = http_build_query($p_aParams);
            curl_setopt($oCh, CURLOPT_POST, 1);
            curl_setopt($oCh, CURLOPT_POSTFIELDS, $aPostFields);
        }

        curl_setopt($oCh, CURLOPT_URL, $p_sURL);
        $aData = curl_exec($oCh);
        $errno = curl_errno($oCh);        
        if ($errno)
        {
            return curl_error($oCh);
        }
        curl_close($oCh);        

        return $aData;
    }

    // --------------------------------------------------------------------

    /**
     * 接口调用底层方法
     *
     * @param  string $p_sInvoke 接口路由
     * @param  array  $p_aParams 接口参数
     * @param  string $p_sMethod 请求方式
     * @return string
     * @author wanglong <wanglong@pinganfang.com>
     */
    public function call($p_sInvoke, $p_aParams = [], $p_sMethod = 'get', $p_aHeader = [])
    {
        static $cached;

        if (strtolower($p_sMethod) == 'get')
        {
            $sQuery = http_build_query($p_aParams);
            $sMD5 = md5("{$p_sInvoke}{$sQuery}");

            if ( ! empty($cached[$sMD5]))
            {
                return $cached[$sMD5];
            }
        }
        else
        {
            $sMD5 = null;
        }

        $sURL  = $this->getRequestURL() . '/service/' . $p_sInvoke;
        $aData = $this->http($sURL, $p_aParams, $p_sMethod, $p_aHeader);
        $aRet  = json_decode($aData, true);

        // 预定义日志格式
        $aLog['url']    = $sURL;
        $aLog['method'] = $p_sMethod;
        $aLog['params'] = $p_aParams;
        $aLog['raw']    = $aData;

        // 接口调用异常时记录日志并返回标准错误格式
        if ( ! @array_key_exists('success', $aRet))
        {
            $aLog['msg'] = 'call error';
            util_log::create('webservice', $aLog);

            return ['success' => false, 'error_code' => '0000', 'error_message' => '接口服务调用失败', 'extra_data' => $aLog];
        }

        // 接口返回成功标记为失败时，记录日志
        if ($aRet['success'] == false)
        {
            $aLog['msg'] = 'success false';
            util_log::create('webservice', $aLog);
        }

        if (strtolower($p_sMethod) == 'get')
        {
            return ($cached[$sMD5] = $aRet);
        }

        return $aRet;
    }
    
    /**
     * 执行SDK结果检测
     * @param unknown $p_aParam
     * @return Ambigous <boolean, unknown>|multitype:
     */
    public function getSDKResults($p_aParam = array())
    {
        if (isset($p_aParam['success']) && $p_aParam['success'] === true)
        {
            return isset($p_aParam['results'])?$p_aParam['results']:true;
        }
        return array();
    }
}

/* End file */

