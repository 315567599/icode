<?php
/**
 *   * Class const
 *    */
class bll_finance_apiresult {

	const RST_SUCCESS = 1;
	const RST_ERR_PARAM = 2;
	const RST_ERR_SIGN = 3;
	const RST_ERR_TIME_OVER = 4;
	const RST_FAIL_EMAIL_INSERT = 5;
	const RST_ERR_FORMAT = 6;
	const RST_FAIL_EMAIL_EDIT = 7;
	const RST_FAIL_EMAIL_DEL = 8;
	const RST_FAIL_EMAIL_SEND = 9;
	const RST_ERR_EMAIL_EXIST = 10;

	const FAILED_GET_FILE_NAME = 11;
	const FAILED_GET_CON_AND_INSERT_DB = 12;
	const FAILED_ACCOUNT_CHK = 13;
	const FAILED_BACKWARD_ACCOUNT_CHK = 14;
	const EMPTY_ACCOUNT_CHK_FILE_DETAIL = 15;
	const FAILED_LOAD_FILE_CON = 16;
	const FAILED_SFTP_INIT = 17;
	const FAILED_GET_FILE_CON = 18;
	const FAILED_INSERT_DETAIL = 19;
	const FAILED_INSERT_QUEUE = 20;

	const FAILED_GET_FILE = 21;
	const ACC_IS_GOING = 22;
	const ACC_CHK_DATA_EMPTY = 23;

	const EMPTY_ACCCHK_RECORD = 24;


	public $mData = [];
	public $sCode = "";
	private $sMemo = "";

	private $mDicErrMsg;

	public function __construct() {
		$this->mDicErrMsg = [
			self::RST_SUCCESS                     => "",
			self::RST_ERR_PARAM                   => "参数错误",
			self::RST_ERR_SIGN                    => "签名错误",
			self::RST_ERR_TIME_OVER               => "请求超过规定时间",
			self::RST_FAIL_EMAIL_INSERT          => "邮箱插入失败",
			self::RST_ERR_FORMAT                  => "邮箱格式错误",
			self::RST_FAIL_EMAIL_EDIT            => "邮箱修改失败",
			self::RST_FAIL_EMAIL_DEL             => "删除失败",
			self::RST_FAIL_EMAIL_SEND            => "邮件发送失败",
			self::RST_ERR_EMAIL_EXIST            => "邮箱已经存在",

			self::FAILED_GET_FILE_NAME           => "获取文件名失败",
			self::FAILED_GET_CON_AND_INSERT_DB  => "获取文件内容失败",
			self::FAILED_ACCOUNT_CHK             => "对账失败",
			self::FAILED_BACKWARD_ACCOUNT_CHK   => "反向对账失败",
			self::EMPTY_ACCOUNT_CHK_FILE_DETAIL => "对账文件无账单详情",
			self::FAILED_LOAD_FILE_CON           => "读取账单文件内容失败",
			self::FAILED_SFTP_INIT                => "SFTP 初始化失败",
			self::FAILED_GET_FILE_CON            => "获取账单文件内容失败",
			self::FAILED_INSERT_DETAIL            => "插入详情表失败",
			self::FAILED_INSERT_QUEUE            => "插入队列失败",

			self::FAILED_GET_FILE                 => "获取文件过程出错",
			self::ACC_IS_GOING                     => "对账进行中...",
			self::ACC_CHK_DATA_EMPTY              => "今日无账单",

			self::EMPTY_ACCCHK_RECORD             => "该日期区间内无对账记录",
		];
	}

	public function getJson() {
		return json_encode($this->getArray());
	}

	public function getArray() {
		return [
			"data" => $this->mData,
			"code" => $this->sCode,
			"memo" => $this->sMemo
		];
	}

	public function setCode($p_iCode, $p_sMsg="") {
		$this->sCode = strval($p_iCode);
		if($p_sMsg) {
			$this->sMemo = $p_sMsg;
		}elseif (array_key_exists($p_iCode, $this->mDicErrMsg)) {
			$this->sMemo = $this->mDicErrMsg[$p_iCode];
		} else {
			$this->sMemo = "未知错误";
		}
	}

}

