undefined
全局属性undefined表示原始值undefined。它是一个JavaScript的 原始数据类型 。
undefined是全局对象的一个属性。也就是说，它是全局作用域的一个变量。undefined的最初值就是原始数据类型undefined。


你可以使用undefined和严格相等或不相等操作符来决定一个变量是否拥有值。在下面的代码中，变量x是未定义的，if 语句的求值结果将是true
var x;

if (x === undefined) {
// 执行这些语句
} else {
// 这些语句不会被执行
}

或者，可以使用typeof：
使用 typeof的原因是它不会在一个变量没有被声明的时候抛出一个错误。
// 这里没有声明x
if(typeof x === 'undefined') { // 没有错误，执行结果为true
    // 执行这些语句
}

if(x === undefined) { // 抛出一个错误，ReferenceError

}



void 操作符是第三种可以替代的方法。
var x;
if(x === void 0) {
    // 执行这些语句
}

// 没有声明y
if(y === void 0) {
    // 抛出一个RenferenceError错误(与`typeof`相比)
}






