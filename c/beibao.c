/*
 * 背包问题
 * 問題：一群各式各樣的物品，重量與價值皆不同。一個背包，有耐重限制。現在要將物品儘量塞進背包裡，令背包裡物品總價值最高。
 *
 * 一個簡單的想法：每個物品都有「要」和「不要」兩種選擇，窮舉所有可能，並避免枚舉出背包超載的情形。建立一維 bool 陣列， solution[0] = true 表示第零個物品有放進背包。
 */
#include <stdio.h>
#define TRUE 1;
#define FALSE 0;

int solution[10];  // 十個物品
int answer[10];    // 正確答案

int weight[10] = {4, 54, 10, 17 ,18 ,20, 32, 50, 9 ,10};   // 十個物品分別的重量
int cost[10] = {10, 3, 21, 23 , 6, 40, 7 ,30 ,9 ,10};     // 十個物品分別的價值

const int maxW = 150;   // 背包承載上限
int maxC = 0;           // 出現過的最高總值

void backtrack(int n, int w, int c)
{
        printf("backtrack(%d, %d, %d) \n", n ,w, c);

        if (c > maxC)   // 紀錄總值最高的
        {
            maxC = c;
            printf("the current max total weight is %d\n", c);
            store_solution();
        }

        if (n == 10)
        {
            return;
        }

    // 放進背包
    if (w + weight[n] <= maxW)  // 檢查背包超載
    {
        solution[n] = TRUE; 
        backtrack(n+1, w + weight[n], c + cost[n]);
    }

    // 不放進背包
    solution[n] = FALSE;
    backtrack(n+1, w, c);
}



void store_solution()
{
    int i = 0;
    for (i=0; i<10; ++i) {
        answer[i] = solution[i];
    }
}

void 
main(int argc, char **argv) {
    backtrack(1, weight[0], cost[0]);

    // print the solution
    
    printf("@@@@@@@@@@@@@@@@THE SOLUTION IS @@@@@@@@@@@@@@@@@@@@@@: \n");
    printf("max value=%d\n", maxC);

    int i = 0;
    for (i=0; i<10; ++i) {
       // answer[i] = solution[i];
        if (solution[i]) {
            printf("%d\n", i);
        }
    }
}


