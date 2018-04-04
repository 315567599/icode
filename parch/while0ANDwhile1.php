<?php
//while 1:需要不断执行，知道不符合条件退出
while(1) {
	if(substr($lastmessage, 3, 1) != '-' || empty($lastmessage)) {
		break;
	}
	$lastmessage = fgets($fp, 512);
}

//while 0:利用break跳出，需要多次if判断
do {
	if (!isset($conf['host']) || !isset($conf['user'])) {
		break;
	}

	if (!isset($conf['passwd'])) {
		if (isset($conf['pubkey_file'])) {
			if (!isset($conf['privkey_file'])) {
				break;
			}

			$this->use_pubkey_file_ = true;
		} else {
			break;
		}
	}

	$ret = true;
} while (0);

if ($ret) {
	$this->conf_ = array_merge(array('port' => 22), $conf);
} else {
	$this->setErr_(-1, 'conf is not complete');
}
?>
