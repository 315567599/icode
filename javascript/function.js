const VENDOR_PREFIX = /^(moz|ms|o|webkit)-/;
const NUMERIC_STRING = /^\d+$/;
const UPPERCASE_PATTERN = /([A-Z])/g;

// Lifted from: https://github.com/facebook/react/blob/master/src/renderers/dom/shared/CSSPropertyOperations.js
function processStyleName(name: string): string {
  return name
    .replace(UPPERCASE_PATTERN, '-$1')
    .toLowerCase()
    .replace(VENDOR_PREFIX, '-$1-');
}

// Lifted from: https://github.com/facebook/react/blob/master/src/renderers/dom/shared/dangerousStyleValue.js
function processStyleValue(name: string, value: number | string): string {
  let isNumeric;
  if (typeof value === 'string') {
    isNumeric = NUMERIC_STRING.test(value);
  } else {
    isNumeric = true;
    value = String(value);
  }
  if (!isNumeric || value === '0' || isUnitlessNumber[name] === true) {
    return value;
  } else {
    return value + 'px';
  }
}

function styleToCSS(styleDescr: StyleDescr): string {
  return Object.keys(styleDescr).map((name) => {
    let styleValue = processStyleValue(name, styleDescr[name]);
    let styleName = processStyleName(name);
    return `${styleName}: ${styleValue}`;
  }).join('; ');
}


简单说，for in是遍历键名，for of是遍历键值。例如：
let arr = ["a","b"];
for (a in arr) {
    console.log(a);//1,2
}

for (a of arr) {
    console.log(a);//a,b
}


function encodeContent(text: string): string {
  return text
    .split('&').join('&amp;')
    .split('<').join('&lt;')
    .split('>').join('&gt;')
    .split('\xA0').join('&nbsp;')
    .split('\n').join(BREAK + '\n');
}

----
mapObject: function(obj) {
    return new Map(Object.entries(obj));
},


if (typeof module === "object") {
    module.exports.JSUtils = JSUtils;
}

if (typeof cb === 'function') {
    cb(null, s);
}

// Set rtTestMode if not already set.
if (this.options.rtTestMode === undefined) {
    this.options.rtTestMode = this.env.conf.parsoid.rtTestMode;
}


// Cache log information if previously constructed.
this._cache = {};

LogData.prototype.fullMsg = function() {
	if (this._cache.fullMsg === undefined) {
		var messageString = this.msg();

		// Stack traces only for error & fatal
		// FIXME: This should be configurable later on.
		if (/^(error|fatal)(\/|$)?/.test(this.logType) && this.stack()) {
			messageString += '\n' + this.stack();
		}

		this._cache.fullMsg = messageString;
	}
	return this._cache.fullMsg;
};
------------
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
---------------------
var Logger = function(opts) {
	if (!opts) { opts = {}; }

	this._opts = opts;
	this._logRequestQueue = [];
	this._backends = new Map();

	// Set up regular expressions so that logTypes can be registered with
	// backends, and so that logData can be routed to the right backends.
	// Default: matches empty string only
	this._testAllRE = new RegExp(/^$/);

	this._samplers = [];
	this._samplersRE = new RegExp(/^$/);
	this._samplersCache = new Map();
};
--------------
var self = this;

this._routeToBackends(logData, function() {
    self.processingLogRequest = false;
    if (self._logRequestQueue.length > 0) {
        self.log.apply(self, self._logRequestQueue.pop());
    }
});
-------------------
		if (this._samplersRE.test(logType) &&
			!/^fatal/.test(logType)  // No sampling for fatals.
		) {
			if (!this._samplersCache.has(logType)) {
----------------

			// This works because it's [0, 100)
			if ((Math.random() * 100) >= this._samplersCache.get(logType)) {
				return;
			}
----------
if (typeof module === "object") {
	module.exports.ConfigRequest = ConfigRequest;
	module.exports.TemplateRequest = TemplateRequest;
	module.exports.PreprocessorRequest = PreprocessorRequest;
	module.exports.PHPParseRequest = PHPParseRequest;
	module.exports.BatchRequest = BatchRequest;
	module.exports.ImageInfoRequest = ImageInfoRequest;
	module.exports.TemplateDataRequest = TemplateDataRequest;
	module.exports.LintRequest = LintRequest;
	module.exports.ParamInfoRequest = ParamInfoRequest;
	module.exports.DoesNotExistError = DoesNotExistError;
	module.exports.ParserError = ParserError;
}
------------
{{{headers}}}
<script>
    // Work around the set base element.
    var els = [{ src: '/static/css/style.css', css: true }];
    {{{javascripts}}}
    function load(o) {
        var el = document.createElement(o.css ? 'link' : 'script');
        if (o.css) {
            el.setAttribute('type', 'text/css');
            el.setAttribute('rel', 'stylesheet');
        }
        el.setAttribute(o.css ? 'href' : 'src',
            window.location.origin + o.src);
        document.write(el.outerHTML);
    }
    els.forEach(load);
</script>
