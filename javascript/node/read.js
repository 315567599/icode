const fs = require('fs');
fs.readFile('test.js', (err, data) => {
  if (err) throw err;
  console.log(data);
  fs.unlink('test.js', (err) => {
    if (err) throw err;
  });
});
