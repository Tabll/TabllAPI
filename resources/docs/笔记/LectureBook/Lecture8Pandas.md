# Welcome to the Live Pandas Demo
*Update by 天述 `2018-11`*
Week 3 Lecture 8

## Import the Dataset
To use your dataset pandas must first load it into a dataframe (like a table)<br>Example:
- Read the csv into a dataframe
- Print out the 7 elements of the dataframe


```python
import pandas as pd
```

<b>Above is how you import the pandas library. This will need to be done each time you create a new Juptyer Notebook to ensure you have the correct libraries for you to work with</b>


```python
df = pd.read_csv("Games.csv")
```

<b> The above implies that Games.csv is saved in the same directory as your notebook. If it's not, enter the relative directory i.e. /MyDatasets/Example/Games.csv


```python
df.head(7)
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
      <th>Game</th>
      <th>Category</th>
      <th>Price</th>
      <th>QuantitySold</th>
      <th>UserRating</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>Mario</td>
      <td>Platform</td>
      <td>20</td>
      <td>500000.0</td>
      <td>Awful</td>
    </tr>
    <tr>
      <th>1</th>
      <td>Portal_2</td>
      <td>Puzzle</td>
      <td>25</td>
      <td>400000.0</td>
      <td>Good</td>
    </tr>
    <tr>
      <th>2</th>
      <td>Pokemon_Diamond</td>
      <td>Role-Playing</td>
      <td>40</td>
      <td>100000.0</td>
      <td>OK</td>
    </tr>
    <tr>
      <th>3</th>
      <td>No_Man's_Sky</td>
      <td>Survival</td>
      <td>60</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
    <tr>
      <th>4</th>
      <td>Half_Life</td>
      <td>Zombie</td>
      <td>20</td>
      <td>3.0</td>
      <td>Great</td>
    </tr>
    <tr>
      <th>5</th>
      <td>CSGO</td>
      <td>FPS</td>
      <td>£5</td>
      <td>10.0</td>
      <td>Bad</td>
    </tr>
    <tr>
      <th>6</th>
      <td>Portal</td>
      <td>puzle</td>
      <td>15</td>
      <td>300000.0</td>
      <td>OK</td>
    </tr>
  </tbody>
</table>
</div>




```python
df.info()
```

    <class 'pandas.core.frame.DataFrame'>
    RangeIndex: 7 entries, 0 to 6
    Data columns (total 5 columns):
    Game            7 non-null object
    Category        7 non-null object
    Price           7 non-null object
    QuantitySold    6 non-null float64
    UserRating      6 non-null object
    dtypes: float64(1), object(4)
    memory usage: 360.0+ bytes


<b>.info() prints a summary of the DataFrame. We can spot some issues with the dataset from this;
    <ul>
        <li>One QuantitySold and one UserRating cell are empty</li>
        <li>Price is an object (string) but should be an integer (int64)</li>
    </ul>    
</b>


```python
print(df["Category"].value_counts(ascending=True))
```

    FPS             1
    puzle           1
    Puzzle          1
    Survival        1
    Role-Playing    1
    Platform        1
    Zombie          1
    Name: Category, dtype: int64


## Cleaning the Data
It is important to clean the dataset as large datasets are typically unprocessed and are prone to errors.<br><b>Fully understand your rows with errors and correct them if possible before deleting any data</b><br><br>It is recommended to create functions, which you will be able to reuse throughout your project.<br><br>Common Steps:
- Remove any missing/invalid values (NaN) and remove the row
- Reset the index
- Pass your data through the function


```python
df = df.dropna()
df.head(7)
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
      <th>Game</th>
      <th>Category</th>
      <th>Price</th>
      <th>QuantitySold</th>
      <th>UserRating</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>Mario</td>
      <td>Platform</td>
      <td>20</td>
      <td>500000.0</td>
      <td>Awful</td>
    </tr>
    <tr>
      <th>1</th>
      <td>Portal_2</td>
      <td>Puzzle</td>
      <td>25</td>
      <td>400000.0</td>
      <td>Good</td>
    </tr>
    <tr>
      <th>2</th>
      <td>Pokemon_Diamond</td>
      <td>Role-Playing</td>
      <td>40</td>
      <td>100000.0</td>
      <td>OK</td>
    </tr>
    <tr>
      <th>4</th>
      <td>Half_Life</td>
      <td>Zombie</td>
      <td>20</td>
      <td>3.0</td>
      <td>Great</td>
    </tr>
    <tr>
      <th>5</th>
      <td>CSGO</td>
      <td>FPS</td>
      <td>£5</td>
      <td>10.0</td>
      <td>Bad</td>
    </tr>
    <tr>
      <th>6</th>
      <td>Portal</td>
      <td>puzle</td>
      <td>15</td>
      <td>300000.0</td>
      <td>OK</td>
    </tr>
  </tbody>
</table>
</div>




```python
df = df.reset_index(drop = True)
df.head(7)
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
      <th>Game</th>
      <th>Category</th>
      <th>Price</th>
      <th>QuantitySold</th>
      <th>UserRating</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>Mario</td>
      <td>Platform</td>
      <td>20</td>
      <td>500000.0</td>
      <td>Awful</td>
    </tr>
    <tr>
      <th>1</th>
      <td>Portal_2</td>
      <td>Puzzle</td>
      <td>25</td>
      <td>400000.0</td>
      <td>Good</td>
    </tr>
    <tr>
      <th>2</th>
      <td>Pokemon_Diamond</td>
      <td>Role-Playing</td>
      <td>40</td>
      <td>100000.0</td>
      <td>OK</td>
    </tr>
    <tr>
      <th>3</th>
      <td>Half_Life</td>
      <td>Zombie</td>
      <td>20</td>
      <td>3.0</td>
      <td>Great</td>
    </tr>
    <tr>
      <th>4</th>
      <td>CSGO</td>
      <td>FPS</td>
      <td>£5</td>
      <td>10.0</td>
      <td>Bad</td>
    </tr>
    <tr>
      <th>5</th>
      <td>Portal</td>
      <td>puzle</td>
      <td>15</td>
      <td>300000.0</td>
      <td>OK</td>
    </tr>
  </tbody>
</table>
</div>



<b>When dropping rows, it is important to reset the index as otherwise you will have missing keys

To Do:
- Write a function which replaces words written in UserRating with numeric values e.g. Good = 4


```python
def replace_words_with_num(word):
    if word == "Great":
        return 5
    elif word == "Good":
        return 4
    elif word == "OK":
        return 3
    elif word == "Bad":
        return 2
    elif word == "Awful":
        return 1
```


```python
df["UserRating"] = df["UserRating"].apply(replace_words_with_num)
```


```python
df.head(7)
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
      <th>Game</th>
      <th>Category</th>
      <th>Price</th>
      <th>QuantitySold</th>
      <th>UserRating</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>Mario</td>
      <td>Platform</td>
      <td>20</td>
      <td>500000.0</td>
      <td>1</td>
    </tr>
    <tr>
      <th>1</th>
      <td>Portal_2</td>
      <td>Puzzle</td>
      <td>25</td>
      <td>400000.0</td>
      <td>4</td>
    </tr>
    <tr>
      <th>2</th>
      <td>Pokemon_Diamond</td>
      <td>Role-Playing</td>
      <td>40</td>
      <td>100000.0</td>
      <td>3</td>
    </tr>
    <tr>
      <th>3</th>
      <td>Half_Life</td>
      <td>Zombie</td>
      <td>20</td>
      <td>3.0</td>
      <td>5</td>
    </tr>
    <tr>
      <th>4</th>
      <td>CSGO</td>
      <td>FPS</td>
      <td>£5</td>
      <td>10.0</td>
      <td>2</td>
    </tr>
    <tr>
      <th>5</th>
      <td>Portal</td>
      <td>puzle</td>
      <td>15</td>
      <td>300000.0</td>
      <td>3</td>
    </tr>
  </tbody>
</table>
</div>



Example:
- Write a function which checks for underscores ( _ ), removes it, replaces it with a space and changes all letters to lower case
- Pass your data through the function


```python
def clean_name(txt):
    txt = txt.replace("_", " ")
    return txt.lower()     
```


```python
df["Game"] = df["Game"].apply(clean_name)
```

<b>This line applies the function we wrote above to the specified column and overwrites the old data with the new applied data


```python
df.head(7)
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
      <th>Game</th>
      <th>Category</th>
      <th>Price</th>
      <th>QuantitySold</th>
      <th>UserRating</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>mario</td>
      <td>Platform</td>
      <td>20</td>
      <td>500000.0</td>
      <td>1</td>
    </tr>
    <tr>
      <th>1</th>
      <td>portal 2</td>
      <td>Puzzle</td>
      <td>25</td>
      <td>400000.0</td>
      <td>4</td>
    </tr>
    <tr>
      <th>2</th>
      <td>pokemon diamond</td>
      <td>Role-Playing</td>
      <td>40</td>
      <td>100000.0</td>
      <td>3</td>
    </tr>
    <tr>
      <th>3</th>
      <td>half life</td>
      <td>Zombie</td>
      <td>20</td>
      <td>3.0</td>
      <td>5</td>
    </tr>
    <tr>
      <th>4</th>
      <td>csgo</td>
      <td>FPS</td>
      <td>£5</td>
      <td>10.0</td>
      <td>2</td>
    </tr>
    <tr>
      <th>5</th>
      <td>portal</td>
      <td>puzle</td>
      <td>15</td>
      <td>300000.0</td>
      <td>3</td>
    </tr>
  </tbody>
</table>
</div>



Example:

- Write a function which checks for symbols e.g £ and removes it
- Pass your data through the function


```python
def remove_symbol(symbol):
    symbol = symbol.replace("£", "")
    return float(symbol)
```

<b>We need to ensure that the datatype is set to float, otherwise it returns a string


```python
df["Price"] = df["Price"].apply(remove_symbol)
```


```python
df.head(7)
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
      <th>Game</th>
      <th>Category</th>
      <th>Price</th>
      <th>QuantitySold</th>
      <th>UserRating</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>mario</td>
      <td>Platform</td>
      <td>20.0</td>
      <td>500000.0</td>
      <td>1</td>
    </tr>
    <tr>
      <th>1</th>
      <td>portal 2</td>
      <td>Puzzle</td>
      <td>25.0</td>
      <td>400000.0</td>
      <td>4</td>
    </tr>
    <tr>
      <th>2</th>
      <td>pokemon diamond</td>
      <td>Role-Playing</td>
      <td>40.0</td>
      <td>100000.0</td>
      <td>3</td>
    </tr>
    <tr>
      <th>3</th>
      <td>half life</td>
      <td>Zombie</td>
      <td>20.0</td>
      <td>3.0</td>
      <td>5</td>
    </tr>
    <tr>
      <th>4</th>
      <td>csgo</td>
      <td>FPS</td>
      <td>5.0</td>
      <td>10.0</td>
      <td>2</td>
    </tr>
    <tr>
      <th>5</th>
      <td>portal</td>
      <td>puzle</td>
      <td>15.0</td>
      <td>300000.0</td>
      <td>3</td>
    </tr>
  </tbody>
</table>
</div>



Option 1:


```python
for index, row in df.iterrows():
    print(row["Game"])
```

    mario
    portal 2
    pokemon diamond
    half life
    csgo
    portal


<b>Reading through each row in a loop, and returning the "Game" cell for each row

Option 2:


```python
games = list(df['Game'])
for game in games:
    print(game)
```

    mario
    portal 2
    pokemon diamond
    half life
    csgo
    portal


<b>Fetching all the items in the "Game" column before the loop and then printing them all out


```python
df.info()
```

    <class 'pandas.core.frame.DataFrame'>
    RangeIndex: 6 entries, 0 to 5
    Data columns (total 5 columns):
    Game            6 non-null object
    Category        6 non-null object
    Price           6 non-null float64
    QuantitySold    6 non-null float64
    UserRating      6 non-null int64
    dtypes: float64(2), int64(1), object(2)
    memory usage: 320.0+ bytes


<b> As you can see we've fixed the issues; All 5 rows are complete and datatypes (float/int) are correct </b>

# Selecting items using logic

At several stages in your analysis, it is important to narrow down what items you are looking for. Pandas has an inbuilt way of doing this, that is very efficient and simple to do.


```python
cheapGames = df[df["Price"] < 25]
print(cheapGames)
```

            Game  Category  Price  QuantitySold  UserRating
    0      mario  Platform   20.0      500000.0           1
    3  half life    Zombie   20.0           3.0           5
    4       csgo       FPS    5.0          10.0           2
    5     portal     puzle   15.0      300000.0           3


<b>Using pandas dataframe rules to select rows where the price is less than 25 from df. This method returns another dataframe for which each item meets our criteria


```python
significantRevenue = df[(df["Price"] > 20) & (df["QuantitySold"] >= 100000)]
print(significantRevenue)
```

                  Game      Category  Price  QuantitySold  UserRating
    1         portal 2        Puzzle   25.0      400000.0           4
    2  pokemon diamond  Role-Playing   40.0      100000.0           3


<b>This is combining two logical rules for our data extraction.<br><br>Each rule is in brackets and are connected by either:<br>an '&' (AND symbol)<br>an '|' (OR symbol)


```python
print(significantRevenue["Game"])
```

    1           portal 2
    2    pokemon diamond
    Name: Game, dtype: object


<b>Once you have extracted the data as shown above, you have made another dataframe from which you can use all the same functions as any other dataframe

# Adding New Column

Sometimes it might be easier to add a column to your dataset, which can summarise two columns together.

Option 1:


```python
df["RevenueOption1"] = df["Price"]*df["QuantitySold"]
```

<b> We've cleaned our data and so the columns we need are both identified as floats. That means we can multiply the columns </b>

Option 2:


```python
df.insert(4, "RevenueOption2", df["Price"]*df["QuantitySold"])
```

<b> Option 2 allows you to specify what index you want your new column to be inserted to.  


```python
df.head(7)
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
      <th>Game</th>
      <th>Category</th>
      <th>Price</th>
      <th>QuantitySold</th>
      <th>RevenueOption2</th>
      <th>UserRating</th>
      <th>RevenueOption1</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>mario</td>
      <td>Platform</td>
      <td>20.0</td>
      <td>500000.0</td>
      <td>10000000.0</td>
      <td>1</td>
      <td>10000000.0</td>
    </tr>
    <tr>
      <th>1</th>
      <td>portal 2</td>
      <td>Puzzle</td>
      <td>25.0</td>
      <td>400000.0</td>
      <td>10000000.0</td>
      <td>4</td>
      <td>10000000.0</td>
    </tr>
    <tr>
      <th>2</th>
      <td>pokemon diamond</td>
      <td>Role-Playing</td>
      <td>40.0</td>
      <td>100000.0</td>
      <td>4000000.0</td>
      <td>3</td>
      <td>4000000.0</td>
    </tr>
    <tr>
      <th>3</th>
      <td>half life</td>
      <td>Zombie</td>
      <td>20.0</td>
      <td>3.0</td>
      <td>60.0</td>
      <td>5</td>
      <td>60.0</td>
    </tr>
    <tr>
      <th>4</th>
      <td>csgo</td>
      <td>FPS</td>
      <td>5.0</td>
      <td>10.0</td>
      <td>50.0</td>
      <td>2</td>
      <td>50.0</td>
    </tr>
    <tr>
      <th>5</th>
      <td>portal</td>
      <td>puzle</td>
      <td>15.0</td>
      <td>300000.0</td>
      <td>4500000.0</td>
      <td>3</td>
      <td>4500000.0</td>
    </tr>
  </tbody>
</table>
</div>



# Combining 2 datasets

One dataset will not contain all the information you will need. Adding multiple datasets is necessary to gather grater meaning to solving your problem. 

Common steps:

- Create a new dataframe and read in a new csv file which you will use to combine with your existing one
- Combine the 2 datasets together 


```python
df2 = pd.read_csv("GamesRegionSales.csv")
df2.head(7)
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
      <th>Game;NA_Sales;EU_Sales</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>csgo;12;3000</td>
    </tr>
    <tr>
      <th>1</th>
      <td>mario;200000;300000</td>
    </tr>
    <tr>
      <th>2</th>
      <td>pokemon diamond;300;400</td>
    </tr>
    <tr>
      <th>3</th>
      <td>half life;500;600000</td>
    </tr>
    <tr>
      <th>4</th>
      <td>portal 2;100000;300000</td>
    </tr>
    <tr>
      <th>5</th>
      <td>portal;30000;50000</td>
    </tr>
  </tbody>
</table>
</div>



<b>This file has not opened correctly, because read_csv seperates comma by default, but this dataset uses a semi-colon as a seperator. To fix this issue we have to specify what we want to seperate the dataset with after reading it in.<br><br>Use sep="" when you read in the csv to specify which character to seperate it by.


```python
df2 = pd.read_csv("GamesRegionSales.csv", sep=";")
df2.head(7)
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
      <th>Game</th>
      <th>NA_Sales</th>
      <th>EU_Sales</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>csgo</td>
      <td>12</td>
      <td>3000</td>
    </tr>
    <tr>
      <th>1</th>
      <td>mario</td>
      <td>200000</td>
      <td>300000</td>
    </tr>
    <tr>
      <th>2</th>
      <td>pokemon diamond</td>
      <td>300</td>
      <td>400</td>
    </tr>
    <tr>
      <th>3</th>
      <td>half life</td>
      <td>500</td>
      <td>600000</td>
    </tr>
    <tr>
      <th>4</th>
      <td>portal 2</td>
      <td>100000</td>
      <td>300000</td>
    </tr>
    <tr>
      <th>5</th>
      <td>portal</td>
      <td>30000</td>
      <td>50000</td>
    </tr>
  </tbody>
</table>
</div>



<b>As you may notice, this dataset is not in the same order as the first one, and that is why we have to make sure that the indexes in both datasets line up


```python
for index,row in df2.iterrows():
    print(df.index[df["Game"] == row["Game"]][0])
```

    4
    0
    2
    3
    1
    5


<b>Above, we are looping through the items in df2 and printing the index of each item in df where the "Game" matches the "Game" in our current iteration of df2.<br>For example, the first game in df2 is the 5th game (index 4) in df


```python
def addSalesDataNA(gameName):
    return list(df2["NA_Sales"][df2["Game"] == gameName])[0]
```


```python
def addSalesDataEU(gameName):
    return list(df2["EU_Sales"][df2["Game"] == gameName])[0]
```

<b>These functions take the name of the game and return the sales for that game. They do so by returning the EU_Sales from df2 where the game name matches the game in df2 ([df2["Game"] == gameName]). This returns a list with one item so we can get the first item by index ([0]). 


```python
df["NA_Sales"] = df["Game"].apply(addSalesDataNA)
df["EU_Sales"] = df["Game"].apply(addSalesDataEU)
df.head(7)
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
      <th>Game</th>
      <th>Category</th>
      <th>Price</th>
      <th>QuantitySold</th>
      <th>RevenueOption2</th>
      <th>UserRating</th>
      <th>RevenueOption1</th>
      <th>NA_Sales</th>
      <th>EU_Sales</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>mario</td>
      <td>Platform</td>
      <td>20.0</td>
      <td>500000.0</td>
      <td>10000000.0</td>
      <td>1</td>
      <td>10000000.0</td>
      <td>200000</td>
      <td>300000</td>
    </tr>
    <tr>
      <th>1</th>
      <td>portal 2</td>
      <td>Puzzle</td>
      <td>25.0</td>
      <td>400000.0</td>
      <td>10000000.0</td>
      <td>4</td>
      <td>10000000.0</td>
      <td>100000</td>
      <td>300000</td>
    </tr>
    <tr>
      <th>2</th>
      <td>pokemon diamond</td>
      <td>Role-Playing</td>
      <td>40.0</td>
      <td>100000.0</td>
      <td>4000000.0</td>
      <td>3</td>
      <td>4000000.0</td>
      <td>300</td>
      <td>400</td>
    </tr>
    <tr>
      <th>3</th>
      <td>half life</td>
      <td>Zombie</td>
      <td>20.0</td>
      <td>3.0</td>
      <td>60.0</td>
      <td>5</td>
      <td>60.0</td>
      <td>500</td>
      <td>600000</td>
    </tr>
    <tr>
      <th>4</th>
      <td>csgo</td>
      <td>FPS</td>
      <td>5.0</td>
      <td>10.0</td>
      <td>50.0</td>
      <td>2</td>
      <td>50.0</td>
      <td>12</td>
      <td>3000</td>
    </tr>
    <tr>
      <th>5</th>
      <td>portal</td>
      <td>puzle</td>
      <td>15.0</td>
      <td>300000.0</td>
      <td>4500000.0</td>
      <td>3</td>
      <td>4500000.0</td>
      <td>30000</td>
      <td>50000</td>
    </tr>
  </tbody>
</table>
</div>



<b> There are other ways of doing this but this is a simple method that could be useful for adding a small dataset </b>
