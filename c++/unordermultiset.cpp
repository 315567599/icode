#include <iostream>
#include <string>
#include <unordered_set>
using namespace std;

int main(){
    unordered_multiset<string> cities {
        "shanghai","beijing","guangzhou","suzhou","chengdu","nanjing"
    };

    cities.insert({"london", "perrier"});

    for (const auto& elem : cities){
        cout << elem << " ";
    }
    cout << endl;
    return 0;
}
