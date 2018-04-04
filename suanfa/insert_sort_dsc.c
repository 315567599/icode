#include <stdio.h>

/**
 * 插入排序
 */
void insert_sort(int array[], int first, int last){
	int i, j, temp;
	for (i = first + 1; i <= last; i++) {
		temp = array[i];
		for (j = i -1; j >= first && array[j] < temp; j--)
			array[j+1] = array[j];
		array[j+1] = temp;
	}
}

void main(){
	int array[] = {2, 4, 7, 1, 100, 20, 30, 50, 11};
	//int array[] = {'a', 'b', 'e', 'c', 100, 20, 30, 50, 11};
	insert_sort(array, 0, sizeof(array)/ sizeof(int));

	int i;
	printf("count of array:%d\n", sizeof(array)/sizeof(int));
	for ( i = 0; i < sizeof(array) / sizeof(int); i++)
		printf("%d\n", array[i]);
}
