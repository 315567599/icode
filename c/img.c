/**
 * compire:  gcc img.c -o img -lm
 */

#include <stdio.h>
#include <math.h>
#include <stdlib.h>

#define DIM 1024
#define DM1 (DIM-1)
#define _sq(x) ((x)*(x))
#define _cb(x) abs((x)*(x)*(x))
#define _cr(x) (unsigned short)(pow((x),1.0/3.0)) 

unsigned short RD(int i, int j) {
	float s = 3./(j+99);
	float y = (j+sin((i*i+_sq(j-700)*5)/100./DIM)*35)*s;
	return ((int)((i+DIM)*s+y)%2+(int)((DIM*2-i)*s+y)%2)*127;
}

unsigned short GR(int i, int j) {
	float s=3./(j+99);
	float y=(j+sin((i*i+_sq(j-700)*5)/100./DIM)*35)*s;
	return ((int)(5*((i+DIM)*s+y))%2+(int)(5*((DIM*2-i)*s+y))%2)*127;
}
unsigned short BL(int i, int j) {
	float s=3./(j+99);
	float y=(j+sin((i*i+_sq(j-700)*5)/100./DIM)*35)*s;
	return ((int)(29*((i+DIM)*s+y))%2+(int)(29*((DIM*2-i)*s+y))%2)*127;
}

FILE *fp;
void pixel_write(int i ,int j){
	static unsigned short color[3];
	color[0] = RD(i,j) & DM1;
	color[1] = GR(i,j) & DM1;
	color[2] = BL(i,j) & DM1;
	fwrite(color, 2, 3, fp);
}


int main(){
	fp = fopen("MathPic", "wb");
	fprintf(fp, "P6\n%d %d\n1023\n", DIM, DIM);
	int i, j;
	for (j = 0;j < DIM; j++)
		for(i =0; i< DIM; i++)
			pixel_write(i,j);
	fclose(fp);
	return 0;
}
