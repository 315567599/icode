<?
//通配符(lookarounds):断言某些字符串中某些字符的存在与否！
 
/*
lookarounds分两种:lookaheads(正向预查 ?=)和lookbehinds(反向预查?<=)。
> 格式:
正向预查:(?=) 相对应的 (?!)表示否定意思
反向预查:(?<=) 相对应的 (?<!)表示否定意思
前后紧跟字符
*/

$regex = '/(?<=c)d(?=e)/';  /* d 前面紧跟c, d 后面紧跟e*/
$str = 'abcdefgk';
$matches = array();
 
if(preg_match($regex, $str, $matches)){
    var_dump($matches);
}
 
echo "\n";
//否定意义:

$regex = '/(?<!c)d(?!e)/';  /* d 前面不紧跟c, d 后面不紧跟e*/
$str = 'abcdefgk';
$matches = array();
 
if(preg_match($regex, $str, $matches)){
    var_dump($matches);
}
 
echo "\n";

?>
