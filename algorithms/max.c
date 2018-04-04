#include <stdio.h>
//查找数组最大值
int max(int *array, int size){

	int mval = *array;
	int i;

	for(i=1;i < size; i++){
		if(array[i] > mval){
			mval = array[i];
			printf("the now value is %d\n",mval);
		}
	}

	return mval;
}

//插入排序 
void insertion_sort(int *array, int size){
	int temp,i,j;
	
	for(i=1;i<size-1;i++){
		temp = array[i];
		j=i-1;	

		while((array[j] > temp) && j>=0){
			array[j+1] = array[j];
			j--;
		}

		array[j+1] = temp;

	}

	int m;
	for (m=0;m<size;m++){
		printf("the sort array is %d\n",array[m]);
	}
	
}


//测试
int main(){
	int a[10] = {5,2,3,4,1,6,9,8,7,10};

	int maxval = max(a,sizeof(a)/sizeof(int));

	printf("the max value is %d\n",maxval);

	insertion_sort(a,sizeof(a)/sizeof(int));
}
