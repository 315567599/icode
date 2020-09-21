#include <tuple>
#include <iostream>
#include <string>
using namespace std;

int main(){
    tuple<int, float, string> t(10,6.3,"nico");
    cout<< get<0>(t) << " ";
    cout<< get<1>(t) << " ";
    cout<< get<2>(t) << " ";
    return 0;
}
