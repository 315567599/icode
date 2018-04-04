<?php
/*¤ 定界符，通常使用 "/"做为定界符开始和结束,也可以使用"#"。
　　什么时候使用"#"呢?一般是在你的字符串中有很多"/"字符的时候，因为正则的时候这种字符需要转义，比如uri。
     使用"/"定界符的代码如下.*/
$regex = '/^http:\/\/([\w.]+)\/([\w]+)\/([\w]+)\.html$/i';
$str = 'http://www.youku.com/show_page/id_ABCDEFG.html';
$matches = array();
 
if(preg_match($regex, $str, $matches)){
    var_dump($matches);
}
 
echo "\n";

//    preg_match中的$matches[0]将包含与整个模式匹配的字符串。 


//    使用"#"定界符的代码如下.这个时候对"/"就不转义!

$regex = '#^http://([\w.]+)/([\w]+)/([\w]+)\.html$#i';
$str = 'http://www.youku.com/show_page/id_ABCDEFG.html';
$matches = array();
 
if(preg_match($regex, $str, $matches)){
    var_dump($matches);
}
 
echo "\n"

?>
