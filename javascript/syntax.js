var xiaoming= [{name:'name1',age:'18'}, {name:'name2',age:'19'}]; console.log(xiaoming.length);
=================
if (confirm('重新加载当前页' + location.href + '?')) {
        location.reload();
} else {
        location.assign('/discuss'); // 设置一个新的URL地址
}

=================
var f = document.getElementById('test-file-upload');
var filename = f.value; // 'C:\fakepath\test.png'
if (!filename || !(filename.endsWith('.jpg') || filename.endsWith('.png') || filename.endsWith('.gif'))) {
    alert('Can only upload image file.');
    return false;
}
================
按属性查找还可以使用前缀查找或者后缀查找：

var icons = $('[name^=icon]'); // 找出所有name属性值以icon开头的DOM
// 例如: name="icon-1", name="icon-2"
// var names = $('[name$=with]'); // 找出所有name属性值以with结尾的DOM
// // 例如: name="startswith", name="endswith"
// 这个方法尤其适合通过class属性查找，且不受class包含多个名称的影响：
//
// var icons = $('[class^="icon-"]'); // 找出所有class包含至少一个以`icon-`开头的DOM
// // 例如: class="icon-clock", class="abc icon-home"

=================
for (var i = 0, max = myarray.length; i < max; i++) {
       // 使用myarray[i]做点什么
       // }
================
function looper() {
   var i = 0,
        max,
        myarray = [];
   // ...
   for (i = 0, max = myarray.length; i < max; i++) {
      // 使用myarray[i]做点什么
   }
}

===================
// 对象
var man = {
   hands: 2,
   legs: 2,
   heads: 1
};

// 在代码的某个地方
// 一个方法添加给了所有对象
if (typeof Object.prototype.clone === "undefined") {
   Object.prototype.clone = function () {};
}

// 1.
// for-in 循环
for (var i in man) {
   if (man.hasOwnProperty(i)) { // 过滤
      console.log(i, ":", man[i]);
   }
}
/* 控制台显示结果
hands : 2
legs : 2
heads : 1
*/
// 2.
// 反面例子:
// for-in loop without checking hasOwnProperty()
for (var i in man) {
   console.log(i, ":", man[i]);
}
/*
控制台显示结果
hands : 2
legs : 2
heads : 1
clone: function()
*/
========================
var inspect_me = 0,
    result = '';
switch (inspect_me) {
case 0:
   result = "zero";
   break;
case 1:
   result = "one";
   break;
default:
   result = "unknown";
}
===============
var month = "06",
    year = "09";
month = parseInt(month, 10);
year = parseInt(year, 10);
===============
(function () {
    // ... 所有的变量和function都在这里声明，并且作用域也只能在这个匿名闭包里
    // ...但是这里的代码依然可以访问外部全局的对象
}());

(function () {/* 内部代码 */})();
===============
不过，好在在匿名函数里我们可以提供一个比较简单的替代方案，我们可以将全局变量当成一个参数传入到匿名函数然后使用，相比隐式全局变量，它又清晰又快，我们来看一个例子：

(function ($, YAHOO) {
    // 这里，我们的代码就可以使用全局的jQuery对象了，YAHOO也是一样
} (jQuery, YAHOO));
===============

nblogs = cnblogs || {} ;
这是确保cnblogs对象，在存在的时候直接用，不存在的时候直接赋值为{}，我们来看看如何利用这个特性来实现Module模式的任意加载顺序：

var blogModule = (function (my) {

    // 添加一些功能   
n () { /* code */ } ()); // 推荐使用这个
(function () { /* code */ })(); // 但是这个也是可以用的

// 由于括弧()和JS的&&，异或，逗号等操作符是在函数表达式和函数声明上消除歧义的
// 所以一旦解析器知道其中一个已经是表达式了，其它的也都默认为表达式了
// 不过，请注意下一章节的内容解释

var i = function () { return 10; } ();
true && function () { /* code */ } ();
0, function () { /* code */ } ();

// 如果你不在意返回值，或者不怕难以阅读
// 你甚至可以在function前面加一元操作符号

!function () { /* code */ } ();
~function () { /* code */ } ();
-function () { /* code */ } ();
+function () { /* code */ } ();

// 还有一个情况，使用new关键字,也可以用，但我不确定它的效率
// http://twitter.com/kuvos/status/18209252090847232

new function () { /* code */ }
new function () { /* code */ } () // 如果需要传递参数，只需要加上括弧()

=========================

    
    return my;
} (blogModule || {}));  
通过这样的代码，每个单独分离的文件都保证这个结构，那么我们就可以实现任意顺序的加载，所以，这个时候的var就是必须要声明的，因为不声明，其它文件读取不到哦。
=================

