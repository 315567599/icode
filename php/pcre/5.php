<?php

/*
> 避免捕获数据
   格式:(?:pattern)
   优点:将使有效反向引用数量保持在最小，代码更加、清楚。
 
>命名捕获组
   格式:(?P<组名>) 调用方式 (?P=组名)
*/

$regex = '/(?P<author>chuanshanjia)[\s]Is[\s](?P=author)/i';
$str = 'author:chuanshanjia Is chuanshanjia';
$matches = array();
 
if(preg_match($regex, $str, $matches)){
    var_dump($matches);
}
 
echo "\n";
?>
