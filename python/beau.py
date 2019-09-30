 if logProcesses and hasattr(os, 'getpid'):
                 self.process = os.getpid()



def __str__(self):
      return '<LogRecord: %s, %s, %s, %s, "%s">'%(self.name, self.levelno, self.pathname, self.lineno, self.msg)
