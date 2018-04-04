#include <stdio.h>
#include "adlist.h"
#include "zmalloc.h"
#include "config.h"

int
main(int argc, char *argv[]){

	printf("list test unit\n");
	//链表
	struct list *list;
	//链表遍历接口
	struct listIter *iter;

	list = listCreate();
	listAddNodeTail(list, "this is list node 1");
	listAddNodeTail(list, "this is list node 2");
	listAddNodeTail(list, "this is list node 3");
	listAddNodeTail(list, "this is list node 4");
	listAddNodeTail(list, "this is list node 5");

	iter = listGetIterator(list, AL_START_HEAD);

	struct listNode *node;

	while ((node = listNext(iter)) != NULL){
		printf("%s \n", node->value);
	}
		
	return 0;
}
