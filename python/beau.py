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


