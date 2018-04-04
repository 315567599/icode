通常你会使用throw关键字来抛出你创建的Error对象。可以使用 try...catch 结构来处理异常:
try {
    throw new Error("Whoops!");
} catch (e) {
    alert(e.name + ": " + e.message);
}



自定义异常类型
// Create a new object, that prototypally inherits from the Error constructor.
function MyError(message) {
  this.name = 'MyError';
  this.message = message || 'Default Message';   this.stack = (new Error()).stack;
}
MyError.prototype = Object.create(Error.prototype);
MyError.prototype.constructor = MyError;

try {
  throw new MyError();
} catch (e) {
  console.log(e.name);     // 'MyError'
  console.log(e.message);  // 'Default Message'
}

try {
  throw new MyError('custom message');
} catch (e) {
  console.log(e.name);     // 'MyError'
  console.log(e.message);  // 'custom message'
}

