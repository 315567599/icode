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

