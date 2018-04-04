#include <stdio.h>

void outbin(int n){
	
	int a[32], i = 0;

	while (n > 0) {
		a[i++] = n % 2;
		n >>= 1;
	}

	while(i--)
		printf("%d", a[i]);
}


#define MAX 100

void cif(int n){
	int i;
	
	for (i =0; i<n; i++)
		printf("%6d%c", i, (i%10 == 9 || i == n-1) ? '\n' : ' ');
}	

/*把字符串t拷贝到s后面， s必须有足够大的空间*/
char* my_strcat(char s[], char t[]){
	int i,j;

	i = j = 0;
	while (s[i] != '\0')
		i++;
	while ((s[i++] = t[j++]) != '\0')
		;
	return s;
}
	


int main()
{
	outbin(8);
	cif(193);

	char a[32] = "hello,world";
	printf("%s", my_strcat(a, "!hi,jiangchao"));
}
