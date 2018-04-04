使用直接量创建对象。

// bad
var item = new Object();

// good
var item = {};
不要使用保留字作为键名，它们在 IE8 下不工作。更多信息。

// bad
var superman = {
  default: { clark: 'kent' },
  private: true
};

// good
var superman = {
  defaults: { clark: 'kent' },
  hidden: true
};
使用同义词替换需要使用的保留字。

// bad
var superman = {
  class: 'alien'
};

// bad
var superman = {
  klass: 'alien'
};

// good
var superman = {
  type: 'alien'
};
rray();

// good
var items = [];
向数组增加元素时使用 Array#push 来替代直接赋值。

var someStack = [];


// bad
someStack[someStack.length] = 'abracadabra';

// good
someStack.push('abracadabra');
当你需要拷贝数组时，使用 Array#slice。jsPerf

var len = items.length;
var itemsCopy = [];
var i;

// bad
for (i = 0; i < len; i++) {
  itemsCopy[i] = items[i];
}

// good
itemsCopy = items.slice();


使用单引号 '' 包裹字符串。

// bad
var name = "Bob Parr";

// good
var name = 'Bob Parr';

// bad
var fullName = "Bob " + this.lastName;

// good
var fullName = 'Bob ' + this.lastName;
超过 100 个字符的字符串应该使用连接符写成多行。

注：若过度使用，通过连接符连接的长字符串可能会影响性能。jsPerf & 讨论.

// bad
var errorMessage = 'This is a super long error that was thrown because of Batman. When you stop to think about how Batman had anything to do with this, you would get nowhere fast.';

// bad
var errorMessage = 'This is a super long error that was thrown because \
of Batman. When you stop to think about how Batman had anything to do \
with this, you would get nowhere \
fast.';

// good
var errorMessage = 'This is a super long error that was thrown because ' +
  'of Batman. When you stop to think about how Batman had anything to do ' +
  'with this, you would get nowhere fast.';
程序化生成的字符串使用 Array#join 连接而不是使用连接符。尤其是 IE 下：jsPerf.

var items;
var messages;
var length;
var i;

messages = [{
  state: 'success',
  message: 'This one worked.'
}, {
  state: 'success',
  message: 'This one worked as well.'
}, {
  state: 'error',
  message: 'This one did not work.'
}];

length = messages.length;

// bad
function inbox(messages) {
  items = '<ul>';

  for (i = 0; i < length; i++) {
    items += '<li>' + messages[i].message + '</li>';
  }

  return items + '</ul>';
}

// good
function inbox(messages) {
  items = [];

  for (i = 0; i < length; i++) {
    // use direct assignment in this case because we're micro-optimizing.
    items[i] = '<li>' + messages[i].message + '</li>';
  }

  return '<ul>' + items.join('') + '</ul>';
}


函数表达式：

// 匿名函数表达式
var anonymous = function() {
  return true;
};

// 命名函数表达式
var named = function named() {
  return true;
};

// 立即调用的函数表达式（IIFE）
(function () {
  console.log('Welcome to the Internet. Please follow me.');
}());
永远不要在一个非函数代码块（if、while 等）中声明一个函数，把那个函数赋给一个变量。浏览器允许你这么做，但它们的解析表现不一致。

注： ECMA-262 把 块 定义为一组语句。函数声明不是语句。阅读对 ECMA-262 这个问题的说明。

// bad
if (currentUser) {
  function test() {
    console.log('Nope.');
  }
}

// good
var test;
if (currentUser) {
  test = function test() {
    console.log('Yup.');
  };
}
永远不要把参数命名为 arguments。这将取代函数作用域内的 arguments 对象。

// bad
function nope(name, options, arguments) {
  // ...stuff...
}

// good
function yup(name, options, args) {
  // ...stuff...
}

使用 . 来访问对象的属性。

var luke = {
  jedi: true,
  age: 28
};

// bad
var isJedi = luke['jedi'];

// good
var isJedi = luke.jedi;
当通过变量访问属性时使用中括号 []。

var luke = {
  jedi: true,
  age: 28
};

function getProp(prop) {
  return luke[prop];
}

var isJedi = getProp('jedi');


比较运算符 & 等号

优先使用 === 和 !== 而不是 == 和 !=.
条件表达式例如 if 语句通过抽象方法 ToBoolean 强制计算它们的表达式并且总是遵守下面的规则：

对象 被计算为 true
Undefined 被计算为 false
Null 被计算为 false
布尔值 被计算为 布尔的值
数字 如果是 +0、-0 或 NaN 被计算为 false，否则为 true
字符串 如果是空字符串 '' 被计算为 false，否则为 true
if ([0]) {
  // true
  // 一个数组就是一个对象，对象被计算为 true
}
使用快捷方式。

// bad
if (name !== '') {
  // ...stuff...
}

// good
if (name) {
  // ...stuff...
}

// bad
if (collection.length > 0) {
  // ...stuff...
}

// good
if (collection.length) {
  // ...stuff...
}


使用 parseInt 转换数字时总是带上类型转换的基数。

var inputValue = '4';

// bad
var val = new Number(inputValue);

// bad
var val = +inputValue;

// bad
var val = inputValue >> 0;

// bad
var val = parseInt(inputValue);

// good
var val = Number(inputValue);

// good
var val = parseInt(inputValue, 10);


如果因为某些原因 parseInt 成为你所做的事的瓶颈而需要使用位操作解决性能问题时，留个注释说清楚原因和你的目的。

// good
/**
 * parseInt was the reason my code was slow.
 * Bitshifting the String to coerce it to a
 * Number made it a lot faster.
 */
var val = inputValue >> 0;


布尔:

var age = 0;

// bad
var hasAge = new Boolean(age);

// good
var hasAge = Boolean(age);

// good
var hasAge = !!age;


不要保存 this 的引用。使用 Function#bind。

// bad
function () {
  var self = this;
  return function () {
    console.log(self);
  };
}

// bad
function () {
  var that = this;
  return function () {
    console.log(that);
  };
}

// bad
function () {
  var _this = this;
  return function () {
    console.log(_this);
  };
}

// good
function () {
  return function () {
    console.log(this);
  }.bind(this);
}


使用 $ 作为存储 jQuery 对象的变量名前缀。

// bad
var sidebar = $('.sidebar');

// good
var $sidebar = $('.sidebar');
缓存 jQuery 查询。

// bad
function setSidebar() {
  $('.sidebar').hide();

  // ...stuff...

  $('.sidebar').css({
    'background-color': 'pink'
  });
}

// good
function setSidebar() {
  var $sidebar = $('.sidebar');
  $sidebar.hide();

  // ...stuff...

  $sidebar.css({
    'background-color': 'pink'
  });
}


还可以使用typeof运算符，判断myObj是否有定义。
　　if (typeof myObj == "undefined") {
　　　　var myObj = { };
　　}
这是目前使用最广泛的判断javascript对象是否存在的方法。
第六种写法
由于在已定义、但未赋值的情况下，myObj的值直接等于undefined，所以上面的写法可以简化：
　　if (myObj == undefined) {
　　　　var myObj = { };
　　}
这里有两个地方需要注意，首先第二行的var关键字不能少，否则会出现ReferenceError错误，其次undefined不能加单引号或双引号，因为这里比较的是undefined这种数据类型，而不是"undefined"这个字符串。



n m1(){
　　　　//...
　　}
　　function m2(){
　　　　//...
　　}
上面的函数m1()和m2()，组成一个模块。使用的时候，直接调用就行了。
这种做法的缺点很明显："污染"了全局变量，无法保证不与其他模块发生变量名冲突，而且模块成员之间看不出直接关系。
二、对象写法
为了解决上面的缺点，可以把模块写成一个对象，所有的模块成员都放到这个对象里面。
　　var module1 = new Object({
　　　　_count : 0,
　　　　m1 : function (){
　　　　　　//...
　　　　},
　　　　m2 : function (){
　　　　　　//...
　　　　}
　　});
上面的函数m1()和m2(），都封装在module1对象里。使用的时候，就是调用这个对象的属性。
　　module1.m1();
但是，这样的写法会暴露所有模块成员，内部状态可以被外部改写。比如，外部代码可以直接改变内部计数器的值。
　　module1._count = 5;
三、立即执行函数写法
使用"立即执行函数"（Immediately-Invoked Function Expression，IIFE），可以达到不暴露私有成员的目的。
　　var module1 = (function(){
　　　　var _count = 0;
　　　　var m1 = function(){
　　　　　　//...
　　　　};
　　　　var m2 = function(){
　　　　　　//...
　　　　};
　　　　return {
　　　　　　m1 : m1,
　　　　　　m2 : m2
　　　　};
　　})();
使用上面的写法，外部代码无法读取内部的_count变量。
　　console.info(module1._count); //undefined
module1就是Javascript模块的基本写法。下面，再对这种写法进行加工。
四、放大模式
如果一个模块很大，必须分成几个部分，或者一个模块需要继承另一个模块，这时就有必要采用"放大模式"（augmentation）。
　　var module1 = (function (mod){
　　　　mod.m3 = function () {
　　　　　　//...
　　　　};
　　　　return mod;
　　})(module1);
上面的代码为module1模块添加了一个新方法m3()，然后返回新的module1模块。
五、宽放大模式（Loose augmentation）
在浏览器环境中，模块的各个部分通常都是从网上获取的，有时无法知道哪个部分会先加载。如果采用上一节的写法，第一个执行的部分有可能加载一个不存在空对象，这时就要采用"宽放大模式"。
　　var module1 = ( function (mod){
　　　　//...
　　　　return mod;
　　})(window.module1 || {});
与"放大模式"相比，＂宽放大模式＂就是"立即执行函数"的参数可以是空对象。
六、输入全局变量
独立性是模块的重要特点，模块内部最好不与程序的其他部分直接交互。
为了在模块内部调用全局变量，必须显式地将其他变量输入模块。
　　var module1 = (function ($, YAHOO) {
　　　　//...
　　})(jQuery, YAHOO);
上面的module1模块需要使用jQuery库和YUI库，就把这两个库（其实是两个模块）当作参数输入module1。这样做除了保证模块的独立性，还使得模块之间的依赖关系变得明显。这方面更多的讨论，参见Ben Cherry的著名文章《JavaScript Module Pattern: In-Depth》。
这个系列的第二部分，将讨论如何在浏览器环境组织不同的模块、管理模块之间的依赖性。



