<?php

/**
 * @filename bis.php
 * Bis对外提供的SDK文件
 * 可使用的方法除了pms的文档还可以参考以下Method Doc
 *
 * -------Method-DOC--------
 *
 * ---------Error-Code----------
 * xxx : 保留http请求错误码，CURL请求错误参考http请求错误信息。
 * 001 : 未知错误
 *
 * 200 : SDK-API正确返回数据并且数据的状态也是正确的
 * 100 : SDK-API正确返回数据但是数据的状态也是错误的
 * 999 : SDK没有提供此方法
 * 998 : SDK方法的必要参数缺失
 * -----------------------------
 *
 * @version 1.0
 */

class sdk_bis {
	/**
	 * @var array SDK所提供的方法及配置
	 */
	protected static $_aMethods = [
		'example' => [
			'path' => 'api/internal/example.html', //请求路径
			'params' => [ //请求参数及对应的默认值。null为特殊值，代表不可留空，否则返回错误信息。注意顺序！
				'p1' => null,
				'p2' => null,
				'p3' => 'test'
			]
		],
		//发送超网提现申请
		'sendcashoutapply' => [
			'path' => 'service/account/sendcashoutapply.html',
			'params' => [
                'iBKSerail' => null,
                'sCMSBankID' => null,
                'sBankCard' => null,
                'sCustomName' => null,
                'iAmount' => null,
                'sBankName' => null,
                'sProvince' => null,
                'sCity' => null,
                'sBussinessNO' => null,
                'sSignature' => null,
                'sBankBranch' => null
			],
		],
        //创建一帐通登录态
        'createYztLoginStatus' => [
            'path' => 'outward/anydoor/createYztLoginStatus.html',
            'params' => [
                'deviceId'    => null,
                'deviceType'  => null,
                'osVersion'   => null,
                'appVersion'  => null,
                'sdkVersion'  => null,
                'appId'       => null,
                'appName'     => null,
                'accessToken' => null,
                'signature'   => null,
                'timestamp'   => null,
                'ssoTicket'   => null
            ],
        ],
        //创建非一帐通登录态
        'createLoginStatus' => [
            'path' => 'outward/anydoor/createLoginStatus.html',
            'params' => [
                'deviceId'    => null,
                'deviceType'  => null,
                'osVersion'   => null,
                'appVersion'  => null,
                'sdkVersion'  => null,
                'appId'       => null,
                'appName'     => null,
                'accessToken' => null,
                'loginType'   => null,
                'memberId'    => null
            ],
        ],
        //退出登录态
        'LogoutStatus' => [
            'path' => 'outward/anydoor/LogoutStatus.html',
            'params' => [
                'deviceId'    => null,
                'deviceType'  => null,
                'osVersion'   => null,
                'appVersion'  => null,
                'sdkVersion'  => null,
                'appId'       => null,
                'appName'     => null,
                'accessToken' => null,
                'accessTicket'=> null
            ],
        ],
        //刷新登录态
        'refreshLoginStatus' => [
            'path' => 'outward/anydoor/refreshLoginStatus.html',
            'params' => [
                'deviceId'    => null,
                'deviceType'  => null,
                'osVersion'   => null,
                'appVersion'  => null,
                'sdkVersion'  => null,
                'appId'       => null,
                'appName'     => null,
                'accessToken' => null,
                'accessTicket'=> null
            ],
        ],
	];

	//平安房用户中心公网域名
	const BIS_DOMAIN = 'http://xxxxxxxx.com/';
	const DEFAULT_METHOD = 'post';

	public static function __callStatic($p_sMethod, $p_aArg)
	{
		if (isset(self::$_aMethods[$p_sMethod])) {
			$aMethod = self::$_aMethods[$p_sMethod];
			$sRequestMethod = isset($aMethod['method']) ? $aMethod['method'] : self::DEFAULT_METHOD;
			//处理参数
			$aParams = [];
			if (count($aMethod['params'])) {
				foreach ($aMethod['params'] as $sK => $sV) {
					if ($sV === null) {
						//必填参数
						if (current($p_aArg) === false) {
							return [
								'sCode' => '998',
								'sError' => 'Required parameter missing - ' . $sK
							];
						}
						$aParams[$sK] = current($p_aArg);
					} else {
						//非必填参数
						$aParams[$sK] = current($p_aArg) ? current($p_aArg) : $sV;
					}
					$aParams[$sK] = is_array($aParams[$sK]) ? json_encode($aParams[$sK]) : $aParams[$sK];
					next($p_aArg);
				}
			}
			$aHeader = isset($aParams['aHeader']) ? $aParams['aHeader'] : [];
			unset($aParams['aHeader']);
			return self::call($sRequestMethod, $aMethod['path'], $aParams, $aHeader);
		}
		return [
			'sCode' => '999',
			'sError' => 'Undefined SDK Method - ' . $p_sMethod
		];
	}

    /**
     * 获取用户中心服务Domain
     * @return string
     */
    public static function getDomain(){
        //框架内，存在get_config函数，则使用get_config获取内部域名
        if(function_exists('get_config')){
            $aConfig = get_config('bis','internal');
            return $aConfig['host'];
        }
        //框架外，写死平安房的公网域名
        return self::BIS_DOMAIN;
    }

    /**
     * 调用接口，返回结果
     * @param $p_sMethod
     * @param $p_sPath
     * @param array $p_aParams
     * @param array $p_aHeader
     * @return array
     */
    public static function call($p_sMethod, $p_sPath, $p_aParams=[], $p_aHeader=[]){
	    $sDomain = self::getDomain();
	    $sURL = rtrim($sDomain, '/') . '/' . ltrim($p_sPath);
	    $aResult = self::http($p_sMethod, $sURL, $p_aParams, $p_aHeader);
	    //curl请求成功后对api的请求状态进行处理
	    if ($aResult['sCode'] == '200') {
		    $aData = json_decode($aResult['aData'], true);
		    if (!isset($aData['iStatus'])) {
			    $aResult = [
				    'sCode' => '997',
				    'sError' => 'Unknown Api Error'
			    ];
		    }elseif ($aData['iStatus'] == 1) {
				$aResult = [
					'sCode' => '200',
					'aData' => $aData['aData']
				];
			}elseif ($aData['iStatus'] == 0) {
			    $aResult = [
				    'sCode' => '100',
				    'aError' => [
					    'sErrorCode' => $aData['sErrCode'],
					    'sErrorInfo' => $aData['aErrInfo']
				    ]
			    ];
		    }else{
			    $aResult = [
				    'sCode' => '997',
				    'sError' => 'Unknown Api Error'
			    ];
		    }
	    }
	    return $aResult;
    }

    /**
     * HTTP请求
     * @param string $p_sMethod
     * @param string $p_sURL
     * @param array $p_aParams
     * @param array $p_aHeader
     * @param array $p_aHeader
     * @return array
     */
    public static function http($p_sMethod, $p_sURL, $p_aParams=[], $p_aHeader=[]){
        $oCh = curl_init();

        curl_setopt($oCh, CURLOPT_TIMEOUT, 30);
        $p_aHeader[] = 'Expect:';
        curl_setopt($oCh, CURLOPT_HTTPHEADER, $p_aHeader);
        curl_setopt($oCh, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($oCh, CURLOPT_DNS_USE_GLOBAL_CACHE, 0);

        $sMethod = strtoupper($p_sMethod);
        if ($sMethod == 'GET') {
            if ( ! empty($p_aParams)) {
                $sQueryString = http_build_query($p_aParams);
                $p_sURL .= strpos($p_sURL,'?') === false ? '?'.$sQueryString : '&'.$sQueryString;
            }
        } elseif ($sMethod == 'POST') {
            $aPostFields = http_build_query($p_aParams);
            curl_setopt($oCh, CURLOPT_POST, 1);
            curl_setopt($oCh, CURLOPT_POSTFIELDS, $aPostFields);
        }
        curl_setopt($oCh, CURLOPT_URL, $p_sURL);
        $aData = curl_exec($oCh);
        $aResult = [
            'sCode'     => '200',
            'aData'     => [],
            'sError'    => ''
        ];
        $errno = curl_errno($oCh);
        $aInfo = curl_getinfo($oCh);
        if ($errno) {
            $aResult['sCode'] = '000';
            $aResult['sError'] = 'Curl Error:'.curl_error($oCh);
        } elseif(isset($aInfo['http_code'])) {
            if($aInfo['http_code'] == 200){
                $aResult['aData'] = $aData;
            } else {
                $aResult['sCode'] = (string)$aInfo['http_code'];
                $aResult['sError'] = 'Http Error, code:'.$aInfo['http_code'];
            }
        } else {
            $aResult['sCode'] = '001';
            $aResult['sError'] = 'Unknown Error';
        }
        curl_close($oCh);
        return $aResult;
    }

}
