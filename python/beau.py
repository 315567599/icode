 if logProcesses and hasattr(os, 'getpid'):
                 self.process = os.getpid()



def __str__(self):
      return '<LogRecord: %s, %s, %s, %s, "%s">'%(self.name, self.levelno, self.pathname, self.lineno, self.msg)


----------------------------------------------------------

_logRecordFactory = LogRecord

def setLogRecordFactory(factory):
    global _logRecordFactory
    _logRecordFactory = factory

----------------------------------------------------------
class PercentStyle(object):

    default_format = '%(message)s'
    asctime_format = '%(asctime)s'
    asctime_search = '%(asctime)'

    def __init__(self, fmt):
        self._fmt = fmt or self.default_format

    def usesTime(self):
        return self._fmt.find(self.asctime_search) >= 0

    def format(self, record):
        return self._fmt % record.__dict__

----------------------------------------------------------
# 什么是星号变量（*）
最初，星号变量是用在函数的参数传递上的，在下面的实例中，单个星号代表这个位置接收任意多个非关键字参数，在函数的*b位置上将其转化成元组，而双星号代表这个位置接收任意多个关键字参数，在**b位置上将其转化成字典：

* 　　该位置接受任意多个非关键字（non-keyword）参数，在函数中将其转化为元组（1,2,3,4）

**　  该位置接受任意多个关键字（keyword）参数，在函数**位置上转化为词典 [key:value, key:value ]

----------------------------------------------------------
    def usesTime(self):
        fmt = self._fmt
        return fmt.find('$asctime') >= 0 or fmt.find(self.asctime_format) >= 0

----------------------------------------------------------
 if style not in _STYLES:
            raise ValueError('Style must be one of: %s' % ','.join(
                             _STYLES.keys()))
        self._style = _STYLES[style][0](fmt

----------------------------------------------------------
while (frame and os.path.dirname(frame.f_code.co_filename) ==
       __path__[0]):
    frame = frame.f_back

----------------------------------------------------------
try:
    msg = self.format(record)
    stream = self.stream
    # issue 35046: merged two stream.writes into one.
    stream.write(msg + self.terminator)
    self.flush()
except RecursionError:  # See issue 36272
    raise
except Exception:
    self.handleError(record)

----------------------------------------------------------
FORBIDDEN = (403, 'Forbidden', 'Request forbidden -- authorization will not help')
NOT_FOUND = (404, 'Not Found', 'Nothing matches the given URI')
METHOD_NOT_ALLOWED = (405, 'Method Not Allowed', 'Specified method is invalid for this resource')
----------------------------------------------------------
class LineTooLong(HTTPException):
    def __init__(self, line_type):
        HTTPException.__init__(self, "got more than %d bytes when reading %s"
                                     % (_MAXLINE, line_type))


def parse_headers(fp, _class=HTTPMessage):
    """Parses only RFC2822 headers from a file pointer.

    email Parser wants to see strings rather than bytes.
    But a TextIOWrapper around self.rfile would buffer too many bytes
    from the stream, bytes which we later need to read as bytes.
    So we read the correct bytes here, as bytes, for email Parser
    to parse.

    """
    headers = []
    while True:
        line = fp.readline(_MAXLINE + 1)
        if len(line) > _MAXLINE:
            raise LineTooLong("header line")
        headers.append(line)
        if len(headers) > _MAXHEADERS:
            raise HTTPException("got more than %d headers" % _MAXHEADERS)
        if line in (b'\r\n', b'\n', b''):
            break
    hstring = b''.join(headers).decode('iso-8859-1')
    return email.parser.Parser(_class=_class).parsestr(hstring)

----------------------------------------------------------
def parse_headers(fp, _class=HTTPMessage):
    """Parses only RFC2822 headers from a file pointer.

    email Parser wants to see strings rather than bytes.
    But a TextIOWrapper around self.rfile would buffer too many bytes
    from the stream, bytes which we later need to read as bytes.
    So we read the correct bytes here, as bytes, for email Parser
    to parse.

    """
    headers = []
    while True:
        line = fp.readline(_MAXLINE + 1)
        if len(line) > _MAXLINE:
            raise LineTooLong("header line")
        headers.append(line)
        if len(headers) > _MAXHEADERS:
            raise HTTPException("got more than %d headers" % _MAXHEADERS)
        if line in (b'\r\n', b'\n', b''):
            break
    hstring = b''.join(headers).decode('iso-8859-1')
    return email.parser.Parser(_class=_class).parsestr(hstring)
----------------------------------------------------------
self._buffer = []
self.__response = None
self.__state = _CS_IDLE
self._method = None
self._tunnel_host = None
self._tunnel_port = None
self._tunnel_headers = {}
----------------------------------------------------------
if not skip_host:
    netloc = ''
    if url.startswith('http'):
	nil, netloc, nil, nil, nil = urlsplit(url)

----------------------------------------------------------
  return (x_train, y_train), (x_test, y_test)
  (train_images, train_labels), (test_images, test_labels) = fashion_mnist.load_data()


----------------------------------------------------------


