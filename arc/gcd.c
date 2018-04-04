/**
 * 递归栈依次上升 依次全部退出
 */
#include <stdio.h>

int
gcd(int m, int n){
    if (n == 0) return m;
    return gcd(n, m %n);
}

void
main(int argc, char **argv){
    printf("314159,271828最大公约数为%d\n", gcd(314159,271828));
}
