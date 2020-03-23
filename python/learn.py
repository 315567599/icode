import os
#import numpy as np

HELP_MSG = """
To create the conda environment:
$ conda env create -f {conda_env}.yaml

To update the conda environment:
$ conda env update -f {conda_env}.yaml

To register the conda environment in Jupyter:
$ conda activate {conda_env}
$ python -m ipykernel install --user --name {conda_env} --display-name "Python ({conda_env})"
"""

conda_env = "reco_base"

msg = HELP_MSG.format(conda_env=conda_env).split("\n")
for m in msg:
    print(m)
print(msg)

###
filepath= "license.txt"
assert not os.path.exists(filepath)

# Default column names
DEFAULT_USER_COL = "userID"
DEFAULT_ITEM_COL = "itemID"
DEFAULT_RATING_COL = "rating"
DEFAULT_LABEL_COL = "label"
DEFAULT_TIMESTAMP_COL = "timestamp"
DEFAULT_PREDICTION_COL = "prediction"
COL_DICT = {
    "col_user": DEFAULT_USER_COL, 
    "col_item": DEFAULT_ITEM_COL, 
    "col_rating": DEFAULT_RATING_COL, 
    "col_prediction": DEFAULT_PREDICTION_COL
}

dictionary=COL_DICT
invert = {v: k for k, v in dictionary.items()}
print(invert)

#

CHANNELS = ["defaults", "conda-forge", "pytorch", "fastai"]

for channel in CHANNELS:
   print("- {}\n".format(channel))

#
#def python_data():
#    cooccurrence1 = np.array([[1.0, 0.0, 1.0],
#                              [0.0, 2.0, 1.0],
#                              [1.0, 1.0, 2.0]])
#    cooccurrence2 = np.array([[2.0, 0.0, 0.0, 1.0],
#                              [0.0, 3.0, 0.0, 0.0],
#                              [0.0, 0.0, 2.0, 2.0],
#                              [1.0, 0.0, 2.0, 4.0]])
#    return cooccurrence1, cooccurrence2

#cooccurrence1, cooccurrence2 = python_data()
#
def is_jupyter():
    """Check if the module is running on Jupyter notebook/console.

    Returns:
        bool: True if the module is running on Jupyter notebook or Jupyter console,
        False otherwise.
    """
    try:
        shell_name = get_ipython().__class__.__name__
        if shell_name == "ZMQInteractiveShell":
            return True
        else:
            return False
    except NameError:
        return False

print(is_jupyter)
#

class Student:
    def __init__(self, age):
        self._age = age

    @property
    def age(self):
        return self._age
    
    @age.setter
    def age(self,age):
        self._age = age


s = Student(10);
s.age = 11;
print("student age is:" +  str(s.age))

#
dest_path = "/work/data/"
dirs, _ = os.path.split(dest_path)
print(dirs)
#
dirname,filename=os.path.split('/home/ubuntu/python_code/split_func/split_function.py')
print(dirname)
print(filename)

if not os.path.exists(dirname) or not os.path.exists(filename):
    print("path not exists")

#

#test(*args)：* 的作用其实就是把序列 args 中的每个元素，当作位置参数传进去。比如上面这个代码，如果 args 等于 (1,2,3) ，那么这个代码就等价于 test(1, 2, 3) 。

#test(**kwargs)：** 的作用则是把字典 kwargs 变成关键字参数传递。比如上面这个代码，如果 kwargs 等于 {‘a’:1,’b’:2,’c’:3} ，那这个代码就等价于 test(a=1,b=2,c=3) 。
#genres_header_100k = [*(str(i) for i in range(19))]
genres_header_100k = [str(i) for i in range(19)]
print(genres_header_100k)

#
filter_by="user"
if not (filter_by == "user" or filter_by == "item"):
    raise ValueError("filter_by should be either 'user' or 'item'.")



