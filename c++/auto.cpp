#include <cstdio>
#include<stdint.h>
#include <iostream>
#include <string>
#include <vector>

using namespace std;

int main()
{
    int x = 1234;
    std::string str = "Hello std::string";
    printf("%x, %x\n",x, (uint8_t) x);
    printf("%x, %x\n",x, (uint8_t) x>> 8);
    printf("%s 向你问好!\n", "Consolelinux2");
    std::cout << str << std::endl;
    //
    std::vector<int> vec;
    vec.push_back(x);
    for (auto elem : vec) {
        std::cout << elem << endl;
    }
    return 0;
}
