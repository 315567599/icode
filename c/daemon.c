#include <stdio.h>
#include <unistd.h>

int
do_something(){
	printf("doing someting \n");
	return 0;
}

int
main(){
	do_something();
	/*切换到后台服务模式*/
	daemon(NULL, NULL);
	while (1) {
		do_something();
		sleep(1);
	}
}

