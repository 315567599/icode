<?php
function odd($var)
{
    // returns whether the input integer is odd
    return($var & 1);
}

function even($var)
{
    // returns whether the input integer is even
    return(!($var & 1));
}

$array1 = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);
$array2 = array(6, 7, 8, 9, 10, 11, 12);

echo "Odd :\n";
print_r(array_filter($array1, "odd"));
echo "Even:\n";
print_r(array_filter($array2, "even"));
?>

/***********output***************
Odd :
Array
(
    [a] => 1
    [c] => 3
    [e] => 5
)
Even:
Array
(
    [0] => 6
    [2] => 8
    [4] => 10
    [6] => 12
)
*/


array_merge() 函数把两个或多个数组合并为一个数组。
如果键名有重复，该键的键值为最后一个键名对应的值（后面的覆盖前面的）。如果数组是数字索引的，则键名会以连续方式重新索引。
注释：如果仅仅向 array_merge() 函数输入了一个数组，且键名是整数，则该函数将返回带有整数键名的新数组，其键名以 0 开始进行重新索引。（参见例子 2）
