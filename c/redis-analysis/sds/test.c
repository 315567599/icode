#include <stdio.h>
#include <string.h>
#include "zmalloc.h"
#include "sds.h"


int
main (int argc, char *argv[]) {
	//const char *str = "hello,redis!";
	//sds string = sdsnewlen(str, strlen(str) );
 	sds string = sdsnew ("hello,redis!");	
	struct sdshdr *sh = (void*) (string-(sizeof(struct sdshdr)));
	printf ("sds string:%s\t, sds len:%d\t sds avail:%d\t sdshdr len:%d \n", string, sdslen(string), sdsavail(string), sizeof(struct sdshdr));
	sds string2 = sdscat(string, "jiangchao");
	printf ("sds string:%s\t, sds len:%d\t sds avail:%d \n", string2, sdslen(string2), sdsavail(string2));

	char buf[50];
	int a = 3;
	int b = 5;
	sprintf(buf, "%d plus %d = %d", a ,b , a+b);
	printf("%s \n", buf);

	int i, len;
	for (i =0 ,len = strlen(buf); i < len ;i++) buf[i] = toupper(buf[i]);
	printf(buf);
	sdsfree(string);
	return 0;

}

/*
sds
sdsrange(sds s, long start, long end){

	size_t newlen, len = sdslen(s);
	newlen =(start > end) ? 0 : (end -  start) + 1;
	
}
*/
