var fs = require('fs')

var contents = fs.readFile(process.argv[2])
var lines = contents.toString().split('\n').length - 1
console.log(lines)