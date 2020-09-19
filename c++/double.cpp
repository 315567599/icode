#include <iostream>
#include <string.h>
#include <stdint.h>

int main() {
    double d = 100.11;
    int64_t value;
    memcpy(&value, &d, sizeof(int64_t));
    std::cout << d <<std::endl;
    std::cout << value <<std::endl;
    return 0;
}
