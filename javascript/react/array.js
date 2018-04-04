let a = [2, 9, 7, 8, 9]; 
a.indexOf(2); // 0 
a.indexOf(6); // -1
a.indexOf(7); // 2
a.indexOf(8); // 3
a.indexOf(9); // 1

if (a.indexOf(3) === -1) {
  // element doesn't exist in array
}


--------------------------------------------------

var arr1 = ['a', 'b', 'c'];
var arr2 = ['d', 'e', 'f'];

var arr3 = arr1.concat(arr2);

// arr3 is a new array [ "a", "b", "c", "d", "e", "f" ]

--------------------------------------------------
let a = ['Wind', 'Rain', 'Fire'];

console.log(a.join()); 
// 默认为 ","
// 'Wind,Rain,Fire'

console.log(a.join("")); 
// 分隔符 === 空字符串 ""
// "WindRainFire"

console.log(a.join("-")); 
// 分隔符 "-"
// 'Wind-Rain-Fire'

--------------------------------------------------
pop()方法从数组中删除最后一个元素，并返回该元素的值。此方法更改数组的长度。

let a = [1, 2, 3];
a.length; // 3

a.pop(); // 3

console.log(a); // [1, 2]
a.length; // 2
---------------------------------------------------------
reduce() 方法对累加器和数组中的每个元素（从左到右）应用一个函数，将其减少为单个值。

var total = [0, 1, 2, 3].reduce(function(sum, value) {
  return sum + value;
}, 0);
// total is 6

var flattened = [[0, 1], [2, 3], [4, 5]].reduce(function(a, b) {
  return a.concat(b);
}, []);
// flattened is [0, 1, 2, 3, 4, 5]

arr.reduce(callback[, initialValue])
参数
callback
执行数组中每个值的函数，包含四个参数：
accumulator
累加器累加回调的返回值; 它是上一次调用回调时返回的累积值，或initialValue（如下所示）。

currentValue
数组中正在处理的元素。
currentIndex
数组中正在处理的当前元素的索引。 如果提供了initialValue，则索引号为0，否则为索引为1。
array
调用reduce的数组
initialValue
[可选] 用作第一个调用 callback的第一个参数的值。 如果没有提供初始值，则将使用数组中的第一个元素。 在没有初始值的空数组上调用 reduce 将报错。

-------------------------------------------------------------------
reverse() 方法将数组中元素的位置颠倒。

第一个数组元素成为最后一个数组元素，最后一个数组元素成为第一个。
--------------------------------------------------------------------
shift() 方法从数组中删除第一个元素，并返回该元素的值。此方法更改数组的长度。

let a = [1, 2, 3];
let b = a.shift();

console.log(a); 
// [2, 3]

console.log(b); 
// 1
---------------------------------------------------------------------------
unshift() 方法将一个或多个元素添加到数组的开头，并返回新数组的长度。

let a = [1, 2, 3];
a.unshift(4, 5);

console.log(a);
// [4, 5, 1, 2, 3]
---------------------------------------------------------------------------




