<?php
public function doRequest() {
	$sAction = $this->getParam("sAction", "url");
	bll_blackbox::setTopic('finance_accountchk_'. $sAction .'');
	if (method_exists($this, '_' . $sAction)) {
		$aRet = $this->{'_'.$sAction}();
		if ($aRet !== false) {
			return $aRet;
		}
	}
	return new error_404controller();
}
?>
