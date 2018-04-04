全局属性 NaN 表示 Not-A-Number 的值。

Number.NaN === NaN; // false
isNaN(NaN);         // true
isNaN(Number.NaN);  // true
