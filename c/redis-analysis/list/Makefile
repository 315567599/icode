# test Makefile

uname_S := $(shell sh -c 'uname -s 2>/dev/null || echo not')
OPTIMIZATION?=-O2
ifeq ($(uname_S),SunOS)
  CFLAGS?= $(OPTIMIZATION) -Wall -W 
  CCLINK?= -ldl -lnsl -lsocket -lm -lpthread
else
  CFLAGS?= $(OPTIMIZATION) -Wall -W 
  CCLINK?= -lm -pthread
endif

CC=gcc
CCOPT= $(CFLAGS) $(CCLINK) 
DEBUG?= -g  

OBJ = test.o adlist.o zmalloc.o 
PRGNAME = test

# Deps (use make dep to generate this)
adlist.o: adlist.c adlist.h zmalloc.h
zmalloc.o: zmalloc.c config.h
test.o: test.c

test: $(OBJ)
	$(CC) -o $(PRGNAME) $(CCOPT) $(DEBUG) $(OBJ)


clean:
	rm -rf $(PRGNAME) *.o *.gcda *.gcno *.gcov

