*控制结构

下面是对于控制结构代码风格的概括：

控制结构的关键词之后必须有一个空格。
控制结构的左括号之后不可有空格。
控制结构的右括号之前不可有空格。
控制结构的右括号和左花括号之间必须有一个空格。
控制结构的代码主体必须进行一次缩进。
控制结构的右花括号必须主体的下一行。
每个控制结构的代码主体必须被括在花括号里。这样可是使代码看上去更加标准化，并且加入新代码的时候还可以因此而减少引入错误的可能性。

<?php
if ($expr1) {
    // if body
} elseif ($expr2) {
    // elseif body
} else {
    // else body;
}
?>

<?php
switch ($expr) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}
?>

<?php
while ($expr) {
    // structure body
}

for ($i = 0; $i < 10; $i++) {
    // for body
}

foreach ($iterable as $key => $value) {
    // foreach body
}
?>

*调用方法和函数
调用一个方法或函数时，在方法名或者函数名和左括号之间不可有空格，左括号之后不可有空格，右括号之前也不可有空格。参数列表中，逗号之前不可有空格，逗号之后则必须有一个空格。

<?php
bar();
$foo->bar($arg1);
Foo::bar($arg2, $arg3);
?>

*闭包
声明闭包时所用的function关键字之后必须要有一个空格，而use关键字的前后都要有一个空格。

闭包的左花括号必须跟其在同一行，而右花括号必须在闭包主体的下一行。

闭包的参数列表和变量列表的左括号后面不可有空格，右括号的前面也不可有空格。

闭包的参数列表和变量列表中逗号前面不可有空格，而逗号后面则必须有空格。

闭包的参数列表中带默认值的参数必须放在参数列表的结尾部分。

下面是一个闭包的示例。注意括号，空格和花括号的位置。

<?php
$closureWithArgs = function ($arg1, $arg2) {
    // body
};

$closureWithArgsAndVars = function ($arg1, $arg2) use ($var1, $var2) {
    // body
};
?>





