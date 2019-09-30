__author__ = 'jiangchao'

class MyClass:
    _version = 'v1.0'
    def __init__(self, a ,b):
        self._a = a
        self._b = b

    def sum(self):
        count = self._a + self._b
        print(__author__ + self._version)
        print(str(count))

    @property
    def a(self):
        return self._a


def main():
    c = MyClass(3,5)
    c.sum();
    print(c.a)

if __name__ == '__main__':
    main()
