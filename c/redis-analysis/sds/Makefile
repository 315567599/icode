# test Makefile

CC=gcc

CFLAGS?= $(OPTIMIZATION) -Wall -W -g 
CCLINK?= -lm -pthread

CCOPT= $(CFLAGS) $(CCLINK) 
DEBUG?= -g  

OBJ = test.o sds.o zmalloc.o 
PRGNAME = test

# Deps (use make dep to generate this)
sds.o: sds.c sds.h zmalloc.h
zmalloc.o: zmalloc.c config.h
test.o: test.c

test: $(OBJ)
	$(CC) -o $(PRGNAME) $(CCOPT) $(DEBUG) $(OBJ)

clean:
	rm -rf $(PRGNAME) *.o *.gcda *.gcno *.gcov

