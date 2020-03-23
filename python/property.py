class Sutdent:
    def __init__(self,age):
        self._age = 10;

    @property
    def age(self):
        return self._age

    @age.setter
    def age(self, age):
        self._age = age;



s = Sutdent(10);
s.age =  11;
print("sudent age is: " + str(s.age) )
        

