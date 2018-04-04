/**
 * 递归栈依次上升依次退出
 */
#include <stdio.h>

/*
int
factorial(long int n) {
    if (n == 0) return 1;
    n*factorial(n - 1);
}

*/

int
factorial(long int n) {
    if (n == 0) return 1;
    return n*factorial(n - 1);
}
void
main(int argc, char **argv) {
    printf("factorial:10 = %d\n", factorial(10));
}
