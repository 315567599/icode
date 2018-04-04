<?php
load_lib('/zmqfs/client');

/**
 * 违禁词服务
 *
 * @auth lostxu
 *
 */
class rpc_acsms {

    private static $instance;

    //等待时间,单位毫秒
    const WAIT_TIME = 200;

    /**
     * zmq 连接对象
     *
     */
    private $client;

    /**
     * 私有化构造函数
     */
    private function __construct () {
        $zmq_config = get_config('acsms_rpc_client', 'zmq');
        if ($zmq_config) {
            $this->client     = new zmqfs_client($zmq_config);
        } else {
            throw new Exception(__CLASS__ . ': config info not found.');
        }
    }

    /***
     * 单例模式
     */
    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /***
     *
     * 获取违禁词
     *
     * @param string $p_sStr
     *
     * @return array
     *
     */
    public function getDisallowed($p_sStr) {
        $p_sStr = @trim($p_sStr);
        if (empty($p_sStr)) {
            return false;
        }
        $aDisallowed = array();
        $this->client->startRequest("search", array($p_sStr,"ban"), $rt, null, self::WAIT_TIME);
        $iPending = $this->client->waitForReplies(self::WAIT_TIME);

        if ($iPending > 0) {
            throw new Exception(__CLASS__ . "Timeout. $iPending replies discarded\n");
            return false;
        }

        if ($rt) {
            foreach ($rt as $value) {
                $aDisallowed[] = $value[0];
            }

            //排序
            usort($aDisallowed, array("rpc_acsms", "OrderByLength"));
        }

        return $aDisallowed;
    }

    /***
     * 替换违禁词
     *
     *
     * @param string $p_sStr
     * @param array $p_aDisallowed
     * @param string $p_sReplace
     *
     * @return array
     *
     */
    public function replaceDisallowed($p_sStr, $p_aDisallowed, $p_sReplace = "***") {
        if ($p_aDisallowed) {
            return str_replace($p_aDisallowed, $p_sReplace, $p_sStr);
        } else {
            return $p_sStr;
        }
    }

    /****
     *
     * 过滤违禁词
     *
     * @param string $p_sStr
     *
     * @return string
     *
     */
    public function filterString($p_sStr) {
        $aDisallowed = $this->getDisallowed($p_sStr);
        return $this->replaceDisallowed($p_sStr, $aDisallowed);
    }

    /***
     *
     * 根据文字长度排序
     *
     */
    function OrderByLength($a, $b) {
        if (strlen($a) < strlen($b)) {
            return true;
        }
    }

    /**
     * 如果分词包含在别的分词中，去除
     * @param $aWords
     * @return null
     */
    public function removeRepeatWords($aWords) {
        if(empty($aWords)) {
            return null;
        }

        $count = count($aWords);
        for( $i = $count - 1; $i >= 0; $i-- ) {
            for( $j = $i - 1; $j >= 0; $j-- ) {
                if(strrpos($aWords[$j], $aWords[$i]) !== false) {
                    unset($aWords[$i]);
                    break;
                }
            }
        }

        return $aWords;
    }



    /**
     * 释放清空相关的资源
     */
    function __destruct() {
        if ($this->client) {
            unset($this->client);
        }
    }
}


