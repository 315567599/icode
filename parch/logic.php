<?php
 /**
 * * Validates the signature used in a signed request.
 * *
 * * @param string $hashedSig
 * * @param string $sig
 * *
 * * @throws FacebookSDKException
 * */
public static function validateSignature($hashedSig, $sig)
{
	if (mb_strlen($hashedSig) === mb_strlen($sig)) {
		$validate = 0;
		//比较两个较长字符串是否相等
		for ($i = 0; $i < mb_strlen($sig); $i++) {
			// 与 |= ansii值 疑惑
			$validate |= ord($hashedSig[$i]) ^ ord($sig[$i]);
		}

		if ($validate === 0) {
			return;
		}
	}
	throw new FacebookSDKException(
		'Signed request has an invalid signature.', 602
	);
}
?>
