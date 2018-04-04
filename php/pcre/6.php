<?php
/*
惰性匹配(记住：会进行两部操作,请看下面的原理部分)

　 格式:限定符?

     原理:"?"：如果前面有限定符，会使用最小的数据。如“*”会取0个，而“+”会取1个，如过是{3,5}会取3个。

先看下面的两个代码:

代码1.
*/
$regex = '/heL*/i';
$str = 'heLLLLLLLLLLLLLLLL';
if(preg_match($regex, $str, $matches)){
    var_dump($matches);
}
 
echo "\n";

$regex = '/heL*?/i';
$str = 'heLLLLLLLLLLLLLLLL';
if(preg_match($regex, $str, $matches)){
    var_dump($matches);
}
 
echo "\n";

$regex = '/heL+?/i';
$str = 'heLLLLLLLLLLLLLLLL';
if(preg_match($regex, $str, $matches)){
    var_dump($matches);
}
 
echo "\n";

$regex = '/heL{3,10}?/i';
$str = 'heLLLLLLLLLLLLLLLL';
if(preg_match($regex, $str, $matches)){
    var_dump($matches);
}
 
echo "\n";
?>
