fruits.forEach(function (item, index, array) {
    console.log(item, index);
});
// Apple 0
// Banana 1



添加元素到数组的末尾
var newLength = fruits.push("Orange");
// ["Apple", "Banana", "Orange"]


删除数组末尾的元素
let last = fruits.pop(); 
// remove Orange (from the end)


删除数组最前面（头部）的元素
let first = fruits.shift(); 


添加到数组的前面（头部）
let newLength = fruits.unshift("Strawberry");
// add to the front
// ["Strawberry", "Banana"];


找到某个元素在数组中的索引
fruits.push('Mango');
let index = fruits.indexOf("Banana");
// 1


复制一个数组
var shallowCopy = fruits.slice(); 








