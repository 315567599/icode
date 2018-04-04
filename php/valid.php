<?php
 function isAlpha($str)
    {
        return preg_match('/^[A-z]+$/', $str);
    }

 if (isAlpha('abcdef')){
	echo 'yes';
}else{
	echo 'no';

}
?>
