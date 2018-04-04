#include <stdio.h>
#include <sys/time.h>
#include <signal.h>

static int count = 0;

void 
signal_handler(int m){
	printf("timer counts: %d \n", count);
	count++;
}

/*设置计时器*/
void 
set_timer(){
	struct itimerval itv;
	itv.it_value.tv_sec = 5;
	itv.it_value.tv_usec = 0;

	itv.it_interval.tv_sec = 2;
	itv.it_interval.tv_usec = 0;
	setitimer(ITIMER_REAL, &itv, NULL);
}

int
main(int argc, char *argv[]){
	signal(SIGALRM, signal_handler);
	set_timer();
	while(count < 10);
	exit(0);
}

