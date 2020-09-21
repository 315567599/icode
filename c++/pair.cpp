#include <utility>
#include <functional>
#include <iostream>

int main() {
    int i = 0;
    auto p = std::make_pair(std::ref(i), std::ref(i));
    ++p.first;
    ++p.second;
    std::cout << "i: " << i << std::endl;
    return 0;
}

