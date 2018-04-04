<?php

class sdk_member {
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
        //获取用户小额提现信息
        'userCashoutList' => [
            'path' => 'api/internal/account/getusercashoutlist.html',
            'params' => [
                'iUserID' => null,
                'iPage' => 1,
                'iPageSize' => 20
            ]
        ],
        //查询提现信息
        'searchCashoutList' => [
            'path' => 'api/internal/account/searchcashoutlist.html',
            'params' => [
                'iUserID' => 0,
                'iBeginTime' => 0,
                'iEndTime' => 0,
                'iCashoutStatus' => 0,
                'sMobile' => '',
                'iPage' => 1,
                'iPageSize' => 20
            ]
        ],
        //提现审核
        'auditCashout' => [
            'path' => 'api/internal/account/auditcashout.html',
            'params' => [
                'sIDList' => null,
                'iAdminID' => null
            ]
        ],
        //获取提现详情
        'cashoutDetail' => [
            'path' => 'api/internal/account/getcashoutdetail.html',
            'params' => [
                'iAutoID' => null
            ]
        ],
        //提现状态列表
        'cashoutStatusList' => [
            'path' => 'api/internal/account/getcashoutstatuslist.html',
            'params' => []
        ],
        //关闭提现申请
        'closeCashout' => [
            'path' => 'api/internal/account/closecashout.html',
            'params' => [
                'iAutoID' => null
            ]
        ],
        //拒绝提现
        'rejectWithdraw' => [
            'path' => 'api/internal/account/rejectWithdraw.html',
            'params' => [
                'iDataID' => null,
            ]
        ],
        //批量拒绝提现
        'batchRejectWithdraw' => [
            'path' => 'api/internal/account/batchrejectWithdraw.html',
            'params' => [
                'sDataIDs' => null
            ],
        ],
        //验证该用户输入的支付密码是否正确
        'checkPaymentPassword' => [
            'path' => 'api/internal/cfm/checkpaypwd.html',
            'params' => [
                'iUserID' => null,
                'sPayPWD' => null
            ]
        ],
        //是否设置登录密码
        'isSetLoginPassword' => [
            'path' => 'api/internal/user/issetpassword.html',
            'params' => [
                'iUserID' => null
            ]
        ],
        //是否设置支付密码
        'isSetPaymentPassword' => [
            'path' => 'api/internal/cfm/issetpaypwd.html',
            'params' => [
                'iUserID' => null
            ]
        ],
        //是否设置银行卡
        'isSetBankcard' => [
            'path' => 'api/internal/cfm/issetbankcard.html',
            'params' => [
                'iUserID' => null,
            ]
        ],
        //获取指定银行信息
        'bankInfo' => [
            'path' => 'api/internal/cfm/getbankinfo.html',
            'params' => [
                'iAutoID' => null
            ]
        ],
        //获取指定用户提现银行卡
        'userWithdrawBankcard' => [
            'path' => 'api/internal/cfm/getuserwithdrawbankcard.html',
            'params' => [
                'iUserID' => null
            ]
        ],
        'encodeBankcard' => [
            'path' => 'api/internal/cfm/encodeBankcard.html',
            'params' => [
                'sBankcard' => null
            ]
        ],
        'decodeBankcard' => [
            'path' => 'api/internal/cfm/decodeBankcard.html',
            'params' => [
                'sBankcardString' => null
            ]
        ],
        //获取银行卡加密的key
        'bankcardEncodeKey' => [
            'path' => 'api/internal/cfm/getbankcardencodekey.html',
            'params' => []
        ],
        //更新提现状态
        'updateCashoutStatus' => [
            'path' => 'api/internal/account/updatecashoutresult.html',
            'params' => [
                'iBussinessNO' => null,
                'sFailure' => null
            ]
        ],
        //添加超网API日志
        'addBeosAPILog' => [
            'path' => 'api/internal/account/addbeosapilog.html',
            'params' => [
                'iSerialID' => 0,
                'iType' => null,
                'sUrl' => null,
                'sDesc' => '',
                'sRequest' => '',
                'sResponse' => ''
            ]
        ],
        //设置支付密码
        'setPaymentPassword' => [
            'path' => 'api/internal/cfm/setpaypwd.html',
            'params' => [
                'iUserID' => null,
                'sToken' => null,
                'sPayPWD' => null,
            ]
        ],
        //修改支付密码
        'changePaymentPassword' => [
            'path' => 'api/internal/cfm/changepaypwd.html',
            'params' => [
                'iUserID' => null,
                'sOldPassword' => null,
                'sNewPassword' => null,
                'sToken' => null,
            ]
        ],
        //找回支付密码
        'findPaymentPassword' => [
            'path' => 'api/internal/cfm/findpaypwd.html',
            'params' => [
                'iUserID' => null,
                'sToken' => null,
                'sPayPWD' => null,
            ]
        ],
        //进行身份认证
        'authentication' => [
            'path' => 'api/internal/cfm/authentication.html',
            'params' => [
                'iUserID' => null,
                'sName' => null,
                'sIDCard' => null,
                'sPhoneNum' => null,
            ]
        ],
        'getAuthenticationInfo' => [
            'path' => 'api/internal/cfm/getauthenticationinfo.html',
            'params' => [
                'iUserID' => null,
            ]
        ],
        'syncBanks' => [
            'path' => 'api/internal/cfm/syncbanks.html',
            'params' => [
                'aBanks' => null
            ]
        ],
    ];

    //平安房用户中心公网域名
    const MEMBER_DOMAIN = 'http://member.pinganfang.com/';
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
                        if (current($p_aArg) == false) {
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
            $aConfig = get_config('member','internal');
            return $aConfig['host'];
        }
        //框架外，写死平安房的公网域名
        return self::MEMBER_DOMAIN;
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

