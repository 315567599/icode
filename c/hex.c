#include <stdio.h>

int
main(){
	int i = 0x23;
	char str[] = "\x00\x03foo\x03\x00bar\x05hello\x05\x00world\xff";
	printf("int is:%d \tstr is: %s", i, str);
}
