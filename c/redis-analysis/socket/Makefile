# test Makefile

CC=gcc

CFLAGS?= $(OPTIMIZATION) -Wall -W -g 
CCLINK?= -lm 

CCOPT= $(CFLAGS) $(CCLINK) 
DEBUG?= -g  

OBJ = server.o anet.o 
PRGNAME = server 

# Deps (use make dep to generate this)
anet.o: anet.c anet.h fmacros.h
server.o: server.c

server: $(OBJ)
	$(CC) -o $(PRGNAME) $(CCOPT) $(DEBUG) $(OBJ)

clean:
	rm -rf $(PRGNAME) *.o *.gcda *.gcno *.gcov

