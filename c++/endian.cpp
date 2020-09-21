#include <arpa/inet.h>
#include <iostream>
using namespace std;

int main(){
    int a = 16;
    int b = htons(a);
    std::cout << a << std::endl;
    std::cout << b << std::endl;
    return 0;
}

