#include <iostream>
#include <functional>

int main() {
    std::function<float (float, float)> add = [](float a, float b) {
        return a + b;
    };
    std::cout<< add(1,2) << std::endl;
    //
    //std::string str = "\x16\x03\x01\x02\x00\x01\x00\x01\xfc\x03\x03";
    std::string str = std::string("\x16\x03\x01\x02\x00\x01\x00\x01\xfc\x03\x03", 11);
    std::cout << str << std::endl;
    return 0;
}
