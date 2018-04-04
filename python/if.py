age = 3
if age >=18:
    print('adult')
elif age >= 6:
    print('teenager')
else:
    print('kid')

#
s = input('birth:')
birth = int(s)
if birth<2000:
    print('00qian')
else:
    print('00hou')

#
names=['michael','bob','tracy']
for name in names:
    print(name)

#
def my_abs(x):
    if x>=0:
        return x
    else:
        return -x

print("-99abs:", my_abs(-99))
