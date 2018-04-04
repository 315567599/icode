<?php

//捕获数据
 
/*
没有指明类型而进行的分组,将会被获取,供以后使用。
> 指明类型指的是通配符。所以只有圆括号起始位置没有问号的才能被捕捉。

> 在同一个表达式内的引用叫做反向引用。
> 调用格式: \编号(如\1)。
*/
$regex = '/^(Chuanshanjia)[\w\s!]+\1$/';    
$str = 'Chuanshanjia thank Chuanshanjia';
$matches = array();
 
if(preg_match($regex, $str, $matches)){
    var_dump($matches);
}
 
echo "\n";

?>
