
<?php
/**
 * 在开头加入字符串
 *
 */
$sql = 'select * from t_user';
$fname = 'function';
$userName = 'jiangchao';
$commentedSql = preg_replace( '/^/', " /* $fname $userName */ ", $sql.PHP_EOL, 1 );
echo $commentedSql;
