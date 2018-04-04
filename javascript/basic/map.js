Objects 和 maps 的比较
Object 和 Map类似的一点是,它们都允许你按键存取一个值,都可以删除键,还可以检测一个键是否绑定了值.因此,一直以来,我们都把对象当成Map来使用,不过,现在有了Map,下面的区别解释了为什么使用Map更好点.

一个对象通常都有自己的原型,所以一个对象总有一个"prototype"键。不过，从 ES5 开始可以使用 map = Object.create(null)来创建一个没有原型的对象。
一个对象的键只能是字符串或者 Symbols，但一个 Map 的键可以是任意值。
你可以通过size属性很容易地得到一个Map的键值对个数，而对象的键值对个数只能手动确认。
但是这并不意味着你可以随意使用 Map，对象仍旧是最常用的。Map 实例只适合用于集合(collections)，你应当考虑修改你原来的代码——先前使用对象来处理集合的地方。对象应该用其字段和方法来作为记录的。
如果你不确定要使用哪个，请思考下面的问题：

在运行之前 key 是否是未知的，是否需要动态地查询 key 呢？
是否所有的值都是统一类型，这些值可以互换么？
是否需要不是字符串类型的 key ？
键值对经常增加或者删除么？
是否有任意个且非常容易改变的键值对?
这个集合可以遍历么(Is the collection iterated)?
假如以上全是“是”的话，那么你需要用 Map 来保存这个集。 相反，你有固定数目的键值对，独立操作它们，区分它们的用法，那么你需要的是对象。


var myMap = new Map();
 
var keyObj = {},
    keyFunc = function () {},
    keyString = "a string";
 
// 添加键
myMap.set(keyString, "和键'a string'关联的值");
myMap.set(keyObj, "和键keyObj关联的值");
myMap.set(keyFunc, "和键keyFunc关联的值");
 
myMap.size; // 3
 
// 读取值
myMap.get(keyString);    // "和键'a string'关联的值"
myMap.get(keyObj);       // "和键keyObj关联的值"
myMap.get(keyFunc);      // "和键keyFunc关联的值"
 
myMap.get("a string");   // "和键'a string'关联的值"
                         // 因为keyString === 'a string'
myMap.get({});           // undefined, 因为keyObj !== {}
myMap.get(function() {}) // undefined, 因为keyFunc !== function () {}
