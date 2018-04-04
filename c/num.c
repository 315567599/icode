#include <stdio.h>

int
main(){
	printf("7/10=%d\n",7/10);//output:0

	//unsigned short int short_int = 65536;
	unsigned short int short_int = 65535;
	printf("unsigned short int=%d\n", short_int);//output:0

	short int short_sign_int = -6553;
	printf("signed short int=%d\n", short_sign_int);//output:0

	unsigned short int uint16 = 250*300;
	unsigned int uint32 = 250*300;
	printf("250*300, uint16 = %d\n", uint16);
	printf("250*300, uint32 = %d\n", uint32);

}
