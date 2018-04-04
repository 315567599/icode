#include <stdio.h>
#include <time.h>

int
main(int argc, char *argv[]){
	FILE *fp;
	time_t t;
	struct tm *tm;

	while(1) {
		sleep(3); //睡眠3秒钟
		if ((fp = fopen("test.log", "a")) >= 0) {
			t = time(NULL);
			tm = localtime(&t);
			fprintf(fp, "Now time is: %d-%d-%d %d:%d:%d \n", tm->tm_year+1900/*年份从1990年开始*/, tm->tm_mon, tm->tm_mday, tm->tm_hour, tm->tm_min, tm->tm_sec);
			printf("Now time is: %d-%d-%d %d:%d:%d \n", tm->tm_year+1900/*年份从1990年开始*/, tm->tm_mon, tm->tm_mday, tm->tm_hour, tm->tm_min, tm->tm_sec);
			fclose(fp);
		}
	}
}
