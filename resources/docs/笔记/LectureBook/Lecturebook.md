# Python Basics
*Update by 天述 `2018-11`*
This is an introductory guide to python. Idea for beginners.

# Let's create a simple bank program

P.S. To run a cell and create the next simitaneously press `Shift` + `Enter`<br>
Also when outside of a cell (the left side of the cell goes blue) you can press 'a' to make a cell above and 'b' to make a cell below

# Variables


```python
action = "Withdraw"
# Action we're doing
balance = 50000
# Our original balance
interest = 0.4
# Interest of our account (4%)
amount = 50
# Amount used in a action
```

<b>Notice how in the code cell above a small [1] appears. This means this is the first line of code executed in the program. Keep an eye on this in case you run lines in the wrong order</b>


```python
print(type(action))
print(type(balance))
print(type(interest))
print(type(amount))
```

    <class 'str'>
    <class 'int'>
    <class 'float'>
    <class 'int'>


<b>This command is useful for telling us the datatype python has set as we don't declare this, but we can convert between relevant datatypes...</b>


```python
balance = float(balance)
print(type(balance))
```

    <class 'float'>


# Selection (If/Else)


```python
if action == "Withdraw":
    print("You're withdrawing funds")
```

    You're withdrawing funds


<b>Note that selection statements don't require brackets</b>


```python
if action == "Withdraw" and amount <= balance:
    print("You've decided to withdraw and have sufficent funds")
```

    You've decided to withdraw and have sufficent funds


<b>Chaining logic uses key words 'and' / 'or'. Lets also copy this cell</b>


```python
if action == "Withdraw" and amount <= balance:
    balance -= amount
    print(balance)
```

    49950.0


<b> Let's add other cases such as 'Deposit' and 'Calculate Interest'</b>


```python
if action == "Withdraw":
    print("Withdraw")
elif action == "Deposit":
    print("Deposit")
else:
    print("Calculate interest")
```

    Withdraw


<b> python uses 'elif' rather than 'else if'</b>

# Iteration

To calculate compound interest lets test both types of loop in python<br>
We will do this by saying for each month that balance increases by the amount we set in interest (4%)


```python
months = 5
```


```python
for i in range (0, 3):
    print(i)
```

    0
    1
    2


<b> Above is a for (Count-controlled) loop. i is the counter and will increase within the range we set. Our range is 0 to 3 which means it will go up to (but not including) 3. </b>


```python
for j in range(0,months):
    balance = balance * (1 + interest)
    print("Balance:"+balance)
```


    ---------------------------------------------------------------------------

    TypeError                                 Traceback (most recent call last)

    <ipython-input-10-0fe331476169> in <module>()
          1 for j in range(0,months):
          2     balance = balance * (1 + interest)
    ----> 3     print("Balance:"+balance)
    

    TypeError: must be str, not float


<b> Be careful with datatypes. Although python will let you print any datatype, if you're using a string, all other varaibles in the print must be converted to string</b>


```python
balance = 50000.0
print("Starting balance = "+str(balance))
for j in range(0,months):
    balance = balance * (1 + interest)
    print("Balance:"+str(balance))
```

    Starting balance = 50000.0
    Balance:70000.0
    Balance:98000.0
    Balance:137200.0
    Balance:192080.0
    Balance:268912.0


<b> We could also do this with a while loop (conditioned-controlled) although for a task with a fixed number of repetitions a for loop would typically be preferred </b>


```python
balance = 50000.0
print("Starting balance = "+str(balance))

counter = 0
while counter < months:
    balance = balance * (1 + interest)
    print("Balance:"+str(balance))
    counter += 1
```

    Starting balance = 50000.0
    Balance:70000.0
    Balance:98000.0
    Balance:137200.0
    Balance:192080.0
    Balance:268912.0


# Lists
Although understanding variables is essential, your likely to mostly use contructs such as lists and dictionaries


```python
myList = list()
# or
myList = []
```

<b>Creating an empty list</b>


```python
myList = [1,2,3]
```

<b> Creating a simple 3 item list </b>


```python
myList = ["abc", 2, "def"]
```

<b> Not fussy about mixing data </b>


```python
myList.append(4)
print(myList)
```

    ['abc', 2, 'def', 4]


<b>Also happy to add items</b>


```python
myList[0] = "xyz"
print(myList)
```

    ['xyz', 2, 'def', 4]


<b> Changing items in a list also uses standard zero indexing (first item is 0) </b>


```python
for i in range(0, len(myList)):
    print(myList[i])
```

    xyz
    2
    def
    4


<b> Iterating through a list can be done two ways. The first is simply setting a range up to the length of the list </b>


```python
for i in myList:
    print(i)
```

    xyz
    2
    def
    4


<b> Even easier is using pythons default list loop which will enumerate all items. Instead of i holding the current loop iteration, it will hold the current item </b>

# Functions
You may not need to produce many functions in your project but understanding them is essential


```python
def myFunc():
    print("abc")
```

<b> Defining a function uses the key phrase 'def' and the function name with brackets </b>


```python
myFunc()
```

    abc


<b> To call it we simply type its name with brackets. As you can see the function prints "abc" as expected </b>


```python
def myFuncWithParams(x):
    print(x.lower())
```

<b> Functions may also require parameters. In this case our function should print whatever is passed to it in lowercase </b>


```python
myFuncWithParams("I lovE PythoN")
```

    i love python


# Python Essentials
This should build upon the last code demo with a few more advanced concepts.

# Imports


```python
import numpy as np # importing numpy as np
```

<b>You can import a Python module using the import command. You can also rename it (i.e. numpy to np)</b>


```python
data_new = [6, 7, 8, 0, 1]
data = np.array(data_new) # accessing numpy as np. Here I am converting a list to array
print(data)
```

    [6 7 8 0 1]


<b>Above we've used numpy to create a numpy array out of the list. This will be useful later as numpy arrays are used by modules later in your project</b>

# More Strings


```python
a = 'Big data'
print(type(a))
print(isinstance(a, str))
```

    <class 'str'>
    True


<b>You can return type of an object using type command. You can check whether an object is an instance of a particular type
using <em>isinstance</em> function.</b>


```python
x = ' This is big data examiner'
x[10] = 'f'
```


    ---------------------------------------------------------------------------

    TypeError                                 Traceback (most recent call last)

    <ipython-input-27-0f8fdae752aa> in <module>()
          1 x= ' This is big data examiner'
    ----> 2 x[10] = 'f'
    

    TypeError: 'str' object does not support item assignment



```python
x = x[0:9] + "a lecture"
print(x)
```

     This is a lecture


<b> Strings cannot be editied by character index but can be edited by using functions such as slicing </b>


```python
x = 'Java is a powerful programming language'
y = x.replace('Java', 'Python')
print(y)
```

    Python is a powerful programming language


<b> Replace is another useful function to replace characters and words </b>


```python
a = 'Python'
print(list(a))
print(a[:3])  
print(a[3:])
```

    ['P', 'y', 't', 'h', 'o', 'n']
    Pyt
    hon


<b> Python is also quite flexible in converting between datatypes. For example it will turn a string into a list of characters with ease </b>


```python
# String concentation is very important
p = "Python is the best programming language"
q = ", I have ever seen"
print(p+q)
```

    Python is the best programming language, I have ever seen


<b> String concatenation</b>


```python
print("Costs £%.3f for a %s"  %(1.35, 'bag of sweets'))
print("Costs £%.2f for a %s"  %(0.73, 'apple'))
print("Costs £%.d for a %s"  %(1.13, 'chococlate bar'))
```

    Costs £1.350 for a bag of sweets
    Costs £0.73 for a apple
    Costs £1 for a chococlate bar


<b>You have to do lot of string formatting while doing data analysis. You can format an argument as a string using %s, %d for an integer, %.3f for a number with 3 decimal points. To do more with string look into string formatting in python </b>

# Date-time


```python
# Python date and time module provides datetime, date and time types
from datetime import datetime, date, time
td = datetime(1989,6,9,5,1,30)  # do not write number 6 as 06, you will get an invalid token error.
print(td.day)
```

    9



```python
print(td.minute)
print(td.date())
print(td.time())
```

    1
    1989-06-09
    05:01:30



```python
print (td.strftime('%d/%m/%y %H:%M:%S'))
```

    09/06/89 05:01:30


<b> Datetime is a useful module for date and time formatting. It allows you to create a datetime object and then print and format elements as you wish. <br><br> Note that pressing shift + tab on a function should tell you its parameters</b>


```python
td = datetime(1989,6,9,5,1, 30)
td1 = datetime(1988,8, 31, 11, 2, 23)
new_time =td1 - td  # you can subtract two different date and time functions
print(new_time)
```

    -282 days, 6:00:53


<b> Dates and times can also be subtracted from one another to calculate difference </b>

# Handling Exceptions


```python
print (float('7.968'))
print (float('Big data'))
```

    7.968



    ---------------------------------------------------------------------------

    ValueError                                Traceback (most recent call last)

    <ipython-input-37-b9f28340c149> in <module>()
          1 print (float('7.968'))
    ----> 2 print (float('Big data'))
    

    ValueError: could not convert string to float: 'Big data'


<b> For obvious reasons a string cannot be converted to a float (numeric datatype). To avoid hitting this error we should use a try-except statement (just like a try-catch in Java) </b>


```python
def return_float(x):
    try:
        return float(x)
    except:
        return 0

print (return_float('4.55'))
print (return_float('big data'))
```

    4.55
    0


<b> The error for converting a string has been handled in the except section of the statement, so instead of printing an error, it returns 0 </b>

# Tuples


```python
deep_learning = ('SkLearn', 'Open cv', 'Torch')  # you can un pack a tuple
print(deep_learning[0])
```

    SkLearn


<b> Tuples are immutable which means their length can't be changed, but just like lists items can be fetched by index </b>


```python
x,y,z= deep_learning
print (x)
print (y)
print (z)
```

    SkLearn
    Open cv
    Torch


<b> Because our tuple is 3 items long it can also be converted into 3 seperate variables using x,y,z. (Same can be done with a list) </b>

# More Lists


```python
countries = ['Usa', 'Russia', 'Usa', 'Germany', 'France', 'Italy']
countries.count('Usa')  # .count can be used to count how many values are ther in a list/tuple
```




    2



<b> Use of the count function </b>


```python
x = [3,2,3]
x.extend([4,9,6])
print(x)
```

    [3, 2, 3, 4, 9, 6]


<b> When adding multiple items extend is used rather than append </b>


```python
x.sort()
print(x)
```

    [2, 3, 3, 4, 6, 9]


<b> Python also has a handy sort function </b>


```python
countries.sort()
print(countries)
countries.sort(key=len)  # countries are sorted according to number of characters
print(countries)
```

    ['France', 'Germany', 'Italy', 'Russia', 'Usa', 'Usa']
    ['Usa', 'Usa', 'Italy', 'France', 'Russia', 'Germany']


<b> You can also define the sort type if its not default (i.e. sorting by length rather than alphabet) </b>


```python
languages = ['Python', 'Pandas', 'Keras', 'Tensorflow']

for i,val in enumerate(languages):
    print (i,val)
```

    0 Python
    1 Pandas
    2 Keras
    3 Tensorflow


<b> When iterating over a sequence; to keep track of the index of the current element, you can use 'enumerate' which gives the counter (i) and the item (val) </b>


```python
first_name = ['Ben', 'John', 'Kevin']
last_name = ['Andrew', 'Bustard', 'McLaughlin']
combined = zip(first_name, last_name)

for i in combined:
    print(i)
```

    ('Ben', 'Andrew')
    ('John', 'Bustard')
    ('Kevin', 'McLaughlin')


<b> Zipping is also useful for combining lists into tuples (grouping items from seperate lists) </b>


```python
list(reversed(range(20)))
```




    [19, 18, 17, 16, 15, 14, 13, 12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0]



<b> Reversed list </b>

# Dictionaries


```python
myDict = {'a' : 3, 'b' : 6}
# key : value
```

<b> Dictionaries are another important construct. Dictionaries allow you to map keys to values, which allows us to get items by id rather than index </b>


```python
print(myDict.get('a'))
```

    3


<b> How you get an item by key from a dictionary </b>


```python
for value in myDict:
    print(value)
```

    a
    b


<b> Printing values (same can be done for keys by using key instead of value) </b>


```python
for key, value in myDict.items():
    print(key)
    print(value)
```

    a
    3
    b
    6


<b> Printing both key and value in loop </b>


```python
myDict.update({'a' : 4})
print(myDict)
```

    {'a': 4, 'b': 6}


<b> Updating an item by key </b>


```python
myDict.update({'c' : 12})
print(myDict)
```

    {'a': 4, 'b': 6, 'c': 12}


<b> Adding an item is the same (will add if item is not found) </b>


```python
print(myDict.pop('a'))
print(myDict)
```

    4
    {'b': 6, 'c': 12}


<b> Delete using pop (which also returns the value of the item) </b>

# Cleaning data

Raw data is messy, so you have to clean the data set to make it ready for analysis. Here we have a list of countries that consist of unnecessary punctuations, capilitalization and white space.

- importing a python module called [regular expression](https://docs.python.org/2/library/re.html)
- creating a funtion called removeBadCharacters, to remove the unnecessary punctuations
- using some of python's inbuilt functions to clean text



```python
countries = ['       Argentina', '$USA$', 'france', 'GerMany', 'Kenya!', 'India##', 'Spain(www.spain.com)']
import re
```

<b> Above is an typical example of the kind of data formatting you may need to clean. Creating functions to apply cleaning is a very good idea (especially when you start using pandas) </b>


```python
def removeBadCharacters(text):
    return re.sub(r'[^\w\s]','',text)
```


```python
for i in range(0, len(countries)):
    countries[i] = removeBadCharacters(countries[i])
print(countries)
```

    ['       Argentina', 'USA', 'france', 'GerMany', 'Kenya', 'India', 'Spainwwwspaincom']


<b> the function removeBadCharacters uses re to apply a regex (a special chracter sequence) that substitues all punctuation with null (removes them). It returns this new format as listed above </b>


```python
for i in range(0, len(countries)):
    countries[i] = countries[i].strip()
print(countries)
```

    ['Argentina', 'USA', 'france', 'GerMany', 'Kenya', 'India', 'Spainwwwspaincom']


<b> Strip is one of python's inbuilt functions. It removes all leading and ending whitespace </b>


```python
for i in range(0, len(countries)):
    countries[i] = countries[i].lower().capitalize()
print(countries)
```

    ['Argentina', 'Usa', 'France', 'Germany', 'Kenya', 'India', 'Spainwwwspaincom']


<b> lower() makes all characters lowercase and .capitalize() makes the first letter a uppercase </b>

<b> The formatting is nearly complete but the last item which had a URL in brackets is still incorrect. Try creating a function called removeUrl which turns a string such as "Spain(www.spain.com)" to "Spain" </b>

# Visualisation


```python
import matplotlib.pyplot as plt
```


```python
plt.plot([1,2,3,4])
plt.ylabel('Some numbers')
plt.show()
```


![png](https://tabll-1252262977.cos.ap-shanghai.myqcloud.com/images/notes/LectureBook/output_128_0.png)



```python
y = [3, 10, 7, 5, 3, 4.5, 6, 8.1]
x = range(len(y))
print(x)
```

    range(0, 8)



```python
plt.bar(x, y, color="blue")
plt.show()
```


![png](output_130_0.png)



```python
myDict = {'PersonA':26, 'PersonB': 17, 'PersonC':30}
plt.bar(list(myDict.keys()), list(myDict.values()))
```




    <BarContainer object of 3 artists>




![png](https://tabll-1252262977.cos.ap-shanghai.myqcloud.com/images/notes/LectureBook/output_131_1.png)



```python
x = np.linspace(0,10,10)
y1 = x
y2 = x**2
y3 = x**3
y4 = np.sqrt(x)
```


```python
fig = plt.figure()  # an empty figure with no axes
fig, ax_lst = plt.subplots(2, 2)
plt.subplot(2,2,1)
plt.plot(x, y1, 'ro')
plt.subplot(2,2,2)
plt.plot(x, y2, 'bo')
plt.subplot(2,2,3)
plt.plot(x, y3, 'go')
plt.subplot(2,2,4)
plt.plot(x, y4, 'yo')
```




    [<matplotlib.lines.Line2D at 0x7f7d58664278>]




    <Figure size 432x288 with 0 Axes>



![png](https://tabll-1252262977.cos.ap-shanghai.myqcloud.com/images/notes/LectureBook/output_133_2.png)


# The Live EDA Demo

This demo extends what we've covered about python and also introduces the basics of some other essential library's such as pandas. This guide should act as a simplification of the kind of notebook you will produce through your project.

# Importing Data & Cleaning


```python
import pandas as pd
```

<b> Pandas is the package you will be learning next. It's used for accessing and modifying datasets. For now we will just use it to open our 'games' dataset and print </b>


```python
df = pd.read_csv('games.csv')
df.head()
```




<div>
<style scoped>
    .dataframe tbody tr th:only-of-type {
        vertical-align: middle;
    }

    .dataframe tbody tr th {
        vertical-align: top;
    }

    .dataframe thead th {
        text-align: right;
    }
</style>
<table border="1" class="dataframe">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>Rank</th>
      <th>Name</th>
      <th>Platform</th>
      <th>Year</th>
      <th>Genre</th>
      <th>Publisher</th>
      <th>NA_Sales</th>
      <th>EU_Sales</th>
      <th>JP_Sales</th>
      <th>Other_Sales</th>
      <th>Global_Sales</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>1</td>
      <td>Wii Sports</td>
      <td>Wii</td>
      <td>2006.0</td>
      <td>Sports</td>
      <td>Nintendo</td>
      <td>41.49</td>
      <td>29.02</td>
      <td>3.77</td>
      <td>8.46</td>
      <td>82.74</td>
    </tr>
    <tr>
      <th>1</th>
      <td>2</td>
      <td>Super Mario Bros.</td>
      <td>NES</td>
      <td>1985.0</td>
      <td>Platform</td>
      <td>Nintendo</td>
      <td>29.08</td>
      <td>3.58</td>
      <td>6.81</td>
      <td>0.77</td>
      <td>40.24</td>
    </tr>
    <tr>
      <th>2</th>
      <td>3</td>
      <td>Mario Kart Wii</td>
      <td>Wii</td>
      <td>2008.0</td>
      <td>Racing</td>
      <td>Nintendo</td>
      <td>15.85</td>
      <td>12.88</td>
      <td>3.79</td>
      <td>3.31</td>
      <td>35.82</td>
    </tr>
    <tr>
      <th>3</th>
      <td>4</td>
      <td>Wii Sports Resort</td>
      <td>Wii</td>
      <td>2009.0</td>
      <td>Sports</td>
      <td>Nintendo</td>
      <td>15.75</td>
      <td>11.01</td>
      <td>3.28</td>
      <td>2.96</td>
      <td>33.00</td>
    </tr>
    <tr>
      <th>4</th>
      <td>5</td>
      <td>Pokemon Red/Pokemon Blue</td>
      <td>GB</td>
      <td>1996.0</td>
      <td>Role-Playing</td>
      <td>Nintendo</td>
      <td>11.27</td>
      <td>8.89</td>
      <td>10.22</td>
      <td>1.00</td>
      <td>31.37</td>
    </tr>
  </tbody>
</table>
</div>




```python
# df = pd.read_csv('_____.tab', sep='\t') --> Needed for household dataset tab files
df2 = pd.read_csv("example.tab", sep='\t')
df2.head()
```




<div>
<style scoped>
    .dataframe tbody tr th:only-of-type {
        vertical-align: middle;
    }

    .dataframe tbody tr th {
        vertical-align: top;
    }

    .dataframe thead th {
        text-align: right;
    }
</style>
<table border="1" class="dataframe">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>Name</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>Apple</td>
      <td>3.3</td>
    </tr>
    <tr>
      <th>1</th>
      <td>Banana</td>
      <td>1.3</td>
    </tr>
  </tbody>
</table>
</div>



<b> Pandas allows us to open a csv/tab file and save it as a dataframe (called 'df'). This is extremely useful as it will mostly organise the data as we want, and allows us to easily get columns/rows. df.head() is used to print the top of the table just to have a quick peek. </b>


```python
print(df.shape)
```

    (16598, 11)


<b> Shape tells us its structure. This dataset has 16598 rows and 11 columns. </b>


```python
print(df.dtypes)
```

    Rank              int64
    Name             object
    Platform         object
    Year            float64
    Genre            object
    Publisher        object
    NA_Sales        float64
    EU_Sales        float64
    JP_Sales        float64
    Other_Sales     float64
    Global_Sales    float64
    dtype: object


<b> dtypes tells us datatypes of the columns </b>


```python
print(df.loc[0])
```

    Rank                     1
    Name            Wii Sports
    Platform               Wii
    Year                  2006
    Genre               Sports
    Publisher         Nintendo
    NA_Sales             41.49
    EU_Sales             29.02
    JP_Sales              3.77
    Other_Sales           8.46
    Global_Sales         82.74
    Name: 0, dtype: object


<b> Using df.loc (locate) gets row data by index, so here we've selected the first row and printed out all of its detials </b>


```python
for i in range(0, 20):
    print(df.loc[i]["Genre"])
```

    Sports
    Platform
    Racing
    Sports
    Role-Playing
    Puzzle
    Platform
    Misc
    Platform
    Shooter
    Simulation
    Racing
    Role-Playing
    Sports
    Sports
    Misc
    Action
    Action
    Platform
    Misc


<b> Above is a basic example of iterating through rows in our data. At each iteration we've used df.loc[i] to get the current row's data, and then specify we only want "Genre" returned. Through learning pandas you will find more efficient ways of doing this</b>


```python
for i in range(0, df.shape[0]):
    if df.loc[i]["Genre"] == "Misc":
        df.drop(i, inplace=True)
```


```python
print(df["Genre"])
```

    0              Sports
    1            Platform
    2              Racing
    3              Sports
    4        Role-Playing
    5              Puzzle
    6            Platform
    8            Platform
    9             Shooter
    10         Simulation
    11             Racing
    12       Role-Playing
    13             Sports
    14             Sports
    16             Action
    17             Action
    18           Platform
    20       Role-Playing
    21           Platform
    22           Platform
    23             Action
    24             Action
    25       Role-Playing
    26       Role-Playing
    27             Puzzle
    28             Racing
    29            Shooter
    30       Role-Playing
    31            Shooter
    32       Role-Playing
                 ...     
    16568          Puzzle
    16569         Shooter
    16570      Simulation
    16571       Adventure
    16572       Adventure
    16573          Racing
    16574          Racing
    16575       Adventure
    16576          Sports
    16577         Shooter
    16578          Sports
    16579          Sports
    16580       Adventure
    16581          Sports
    16582          Action
    16583          Action
    16584          Puzzle
    16585         Shooter
    16586       Adventure
    16587          Sports
    16588          Puzzle
    16589          Action
    16590    Role-Playing
    16591       Adventure
    16592      Simulation
    16593        Platform
    16594         Shooter
    16595          Racing
    16596          Puzzle
    16597        Platform
    Name: Genre, Length: 14859, dtype: object


<b> Above we use drop in the loop to remove any games with a "Misc" game category. It is a simple (and by no means the most effiencent way) of removing rows based on a check </b>

<b> You'll have to do a lot more cleaning than this so follow the codecademy pandas closely to learn how to use it more effectively and efficiently than this </b>

# Analysing data

Once your data is clean and you've set up your dataframe for analysis, begin testing and further understanding your data


```python
platforms = dict(df["Platform"].value_counts())
print(platforms)
```

    {'PS2': 1939, 'DS': 1770, 'PS3': 1205, 'X360': 1139, 'PS': 1120, 'PSP': 1107, 'Wii': 1045, 'PC': 936, 'XB': 778, 
    'GBA': 712, 'GC': 520, '3DS': 456, 'PSV': 389, 'PS4': 321, 'N64': 301, 'SNES': 222, 'XOne': 198, 'SAT': 158,  
    '2600': 128, 'WiiU': 122, 'NES': 96, 'GB': 90, 'DC': 52, 'GEN': 26, 'NG': 12, 'WS': 6, 'SCD': 4, '3DO': 3, 'TG16': 2, 'PCFX': 1, 'GG': 1}


<b> Pandas has some simple tools to see your data. For example by counting we can simply see how popular categories of data are, but vizualisations are much better... </b>


```python
import matplotlib.pyplot as plt
```

<b> Matplotlib is a basic graphical package for python. We'll use it to make some simple graphs and draw some meaning from our data </b>


```python
plt.plot(platforms.keys(), platforms.values())
```




    [<matplotlib.lines.Line2D at 0x7f7d4b9b0438>]




![image](https://tabll-1252262977.cos.ap-shanghai.myqcloud.com/images/notes/LectureBook/output_158_1.png)


<b> As you can see the default can be messy. To clear it up lets make it bigger and change to a bar chart </b>


```python
plt.figure(figsize=(15,9))
plt.plot(platforms.keys(), platforms.values())
```




    [<matplotlib.lines.Line2D at 0x7f7d4b8c97b8>]




![image](https://tabll-1252262977.cos.ap-shanghai.myqcloud.com/images/notes/LectureBook/output_160_1.png)


<b> We've added a parameter for figsize when we initilize the figure. Now its a little easier to read but the chart type still doesn't make sense</b>


```python
plt.figure(figsize=(15,9))
plt.bar(list(platforms.keys()), list(platforms.values()))
```




    <BarContainer object of 31 artists>




![image](https://tabll-1252262977.cos.ap-shanghai.myqcloud.com/images/notes/LectureBook/output_162_1.png)


<b> Great, now we can see the data and understand it effectively. By creating multiple charts and comparing variables we can start to draw greater meaning from the data and help us make a discovery </b>


```python
platform = []
popularity = []
numberOfPlatforms = 9

for key in sorted(platforms, key=platforms.get, reverse=True):
    platform.append(key)
    popularity.append(platforms.get(key))
    
platform_sample = platform[0:numberOfPlatforms]
popularity_sample = popularity[0:numberOfPlatforms]

print(platform_sample)
print(popularity_sample)
```

    ['PS2', 'DS', 'PS3', 'X360', 'PS', 'PSP', 'Wii', 'PC', 'XB']
    [1939, 1770, 1205, 1139, 1120, 1107, 1045, 936, 778]


<b> Before moving onto the next visualisation I'm sorting the keys/values we have for each platform and splitting these into lists. This way I can get the data for the 9 most popular platforms which will help simplify the chart </b>


```python
other = 0
for i in range(numberOfPlatforms, len(popularity)):
    other += popularity[i]
platform_sample.append("Other")
popularity_sample.append(other)

print(platform_sample)
print(popularity_sample)
```

    ['PS2', 'DS', 'PS3', 'X360', 'PS', 'PSP', 'Wii', 'PC', 'XB', 'Other']
    [1939, 1770, 1205, 1139, 1120, 1107, 1045, 936, 778, 3820]


<b> I'm also including a loop to sum all other items not included in these lists, which is named the "Other" category. This is important to reflect the fact that there are more than 9 platforms </b>


```python
fig1, ax1 = plt.subplots()
ax1.pie(popularity_sample, labels=platform_sample, autopct='%1.1f%%', shadow=False, startangle=90)
ax1.axis('equal')  # Equal aspect ratio ensures that pie is drawn as a circle.

plt.show()
```


![image](https://tabll-1252262977.cos.ap-shanghai.myqcloud.com/images/notes/LectureBook/output_168_0.png)


<b> Now we have a pie chart the accurately reflects our data, with some summarisation in the "other" category. <br><br> For a challenge, when you've got a better understadning of pandas, try creating dataframes for different years and build a chart to compare how popular certain gaming platforms were in each year side-by-side</b>

## What else should you include in your notebook

<ul>
    <li>More advanced visualisations; There are more more effective and advanced charts to use in matplotlib and seaborn </li>
    <li>Extra datasets; Gather more insight and collect more data to build a greater understanding in your analysis </li>
    <li>Look from a different angle; Analyse all relevant data you have in several different ways and think outisde the box to make a useful discovery </li>
    <li>Consider using machine learning; Use machine learning to build a model which can use your analysis to predict future trends </li>
</ul>

<b> Don't worry about this too much yet, we'll cover all of this throughout the course. For now get more familiar with python and begin learning pandas and then matplotlib/seaborn </b>

# The Live Pandas Demo

This demo will show you how pandas works.

```python
import pandas as pd
```


```python
data
```


```python
%time
```

    CPU times: user 3 µs, sys: 0 ns, total: 3 µs
    Wall time: 5.48 µs


$$ P(A \mid B) = \frac{P(B \mid A) \, P(A)}{P(B)} $$
