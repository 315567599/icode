<?php
 if (isset($data['error']['error_subcode'])) {
	 switch ($data['error']['error_subcode']) {
		 // Other authentication issues
		  case 458:
		  case 459:
		  case 460:
		  case 463:
		  case 464:
		  case 467:
		  return new FacebookAuthorizationException($raw, $data, $statusCode);
		  break;
		  }
		  }

?>
