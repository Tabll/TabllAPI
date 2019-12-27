# Lecture 9 Live EDA Demo
*Update by 天述 `2018-11`*

# Importing the data


```python
import numpy as np
import pandas as pd

data = pd.read_csv('googleplaystore.csv')
```


```python
data.head()
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
      <th>App</th>
      <th>Category</th>
      <th>Rating</th>
      <th>Reviews</th>
      <th>Size</th>
      <th>Installs</th>
      <th>Type</th>
      <th>Price</th>
      <th>Content_Rating</th>
      <th>Genres</th>
      <th>Last_Updated</th>
      <th>Current_Ver</th>
      <th>Android_Ver</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>Pixel Draw - Number Art Coloring Book</td>
      <td>ART_AND_DESIGN</td>
      <td>2.3</td>
      <td>967</td>
      <td>2.8M</td>
      <td>100,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Everyone</td>
      <td>Art &amp; Design;Creativity</td>
      <td>June 20, 2018</td>
      <td>4.4</td>
      <td>1.1</td>
    </tr>
    <tr>
      <th>1</th>
      <td>FC Barcelona Official App</td>
      <td>SPORTS</td>
      <td>3.9</td>
      <td>92522</td>
      <td>56M</td>
      <td>5,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Everyone</td>
      <td>Sports</td>
      <td>July 26, 2018</td>
      <td>4.1</td>
      <td>4.0.14</td>
    </tr>
    <tr>
      <th>2</th>
      <td>Facebook</td>
      <td>SOCIAL</td>
      <td>4.1</td>
      <td>78158306</td>
      <td>Varies with device</td>
      <td>1,000,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Teen</td>
      <td>Social</td>
      <td>August 03, 2018</td>
      <td>5.0.1</td>
      <td>5.0.1</td>
    </tr>
    <tr>
      <th>3</th>
      <td>Nike</td>
      <td>SHOPPING</td>
      <td>4.7</td>
      <td>67071</td>
      <td>40M</td>
      <td>1,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Everyone</td>
      <td>Shopping</td>
      <td>August 01, 2018</td>
      <td>5.6.1</td>
      <td>3.4</td>
    </tr>
    <tr>
      <th>4</th>
      <td>eBay: Buy &amp; Sell this Summer - Discover Deals ...</td>
      <td>SHOPPING</td>
      <td>4.4</td>
      <td>2788923</td>
      <td>Varies with device</td>
      <td>100,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Teen</td>
      <td>Shopping</td>
      <td>July 30, 2018</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
  </tbody>
</table>
</div>



# Query
Query the columns of a frame with a boolean expression.

### Example 1:


```python
data[(data.Current_Ver == data.Android_Ver)]
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
      <th>App</th>
      <th>Category</th>
      <th>Rating</th>
      <th>Reviews</th>
      <th>Size</th>
      <th>Installs</th>
      <th>Type</th>
      <th>Price</th>
      <th>Content_Rating</th>
      <th>Genres</th>
      <th>Last_Updated</th>
      <th>Current_Ver</th>
      <th>Android_Ver</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>2</th>
      <td>Facebook</td>
      <td>SOCIAL</td>
      <td>4.1</td>
      <td>78158306</td>
      <td>Varies with device</td>
      <td>1,000,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Teen</td>
      <td>Social</td>
      <td>August 03, 2018</td>
      <td>5.0.1</td>
      <td>5.0.1</td>
    </tr>
  </tbody>
</table>
</div>



<b>The above will display rows where the current version = android version and so on


```python
data[(pd.isna(data.Current_Ver))]
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
      <th>App</th>
      <th>Category</th>
      <th>Rating</th>
      <th>Reviews</th>
      <th>Size</th>
      <th>Installs</th>
      <th>Type</th>
      <th>Price</th>
      <th>Content_Rating</th>
      <th>Genres</th>
      <th>Last_Updated</th>
      <th>Current_Ver</th>
      <th>Android_Ver</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>4</th>
      <td>eBay: Buy &amp; Sell this Summer - Discover Deals ...</td>
      <td>SHOPPING</td>
      <td>4.4</td>
      <td>2788923</td>
      <td>Varies with device</td>
      <td>100,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Teen</td>
      <td>Shopping</td>
      <td>July 30, 2018</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
    <tr>
      <th>6</th>
      <td>Scientific Calculator Free</td>
      <td>TOOLS</td>
      <td>1.0</td>
      <td>16395</td>
      <td>Varies with device</td>
      <td>1,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Everyone</td>
      <td>Tools</td>
      <td>June 28, 2018</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
  </tbody>
</table>
</div>



<b>Check if the current version in any of the rows is NaN

### Example 2


```python
data.query('Current_Ver == Android_Ver')
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
      <th>App</th>
      <th>Category</th>
      <th>Rating</th>
      <th>Reviews</th>
      <th>Size</th>
      <th>Installs</th>
      <th>Type</th>
      <th>Price</th>
      <th>Content_Rating</th>
      <th>Genres</th>
      <th>Last_Updated</th>
      <th>Current_Ver</th>
      <th>Android_Ver</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>2</th>
      <td>Facebook</td>
      <td>SOCIAL</td>
      <td>4.1</td>
      <td>78158306</td>
      <td>Varies with device</td>
      <td>1,000,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Teen</td>
      <td>Social</td>
      <td>August 03, 2018</td>
      <td>5.0.1</td>
      <td>5.0.1</td>
    </tr>
  </tbody>
</table>
</div>



<b> Using query is an alternative method (Like SQL) </b>


```python
data.query('Current_Ver != Android_Ver and Rating > 4')
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
      <th>App</th>
      <th>Category</th>
      <th>Rating</th>
      <th>Reviews</th>
      <th>Size</th>
      <th>Installs</th>
      <th>Type</th>
      <th>Price</th>
      <th>Content_Rating</th>
      <th>Genres</th>
      <th>Last_Updated</th>
      <th>Current_Ver</th>
      <th>Android_Ver</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>3</th>
      <td>Nike</td>
      <td>SHOPPING</td>
      <td>4.7</td>
      <td>67071</td>
      <td>40M</td>
      <td>1,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Everyone</td>
      <td>Shopping</td>
      <td>August 01, 2018</td>
      <td>5.6.1</td>
      <td>3.4</td>
    </tr>
    <tr>
      <th>4</th>
      <td>eBay: Buy &amp; Sell this Summer - Discover Deals ...</td>
      <td>SHOPPING</td>
      <td>4.4</td>
      <td>2788923</td>
      <td>Varies with device</td>
      <td>100,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Teen</td>
      <td>Shopping</td>
      <td>July 30, 2018</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
    <tr>
      <th>5</th>
      <td>Google Translate</td>
      <td>TOOLS</td>
      <td>4.5</td>
      <td>5745093</td>
      <td>Varies with device</td>
      <td>500,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Everyone</td>
      <td>Tools</td>
      <td>August 04, 2018</td>
      <td>6.7.8</td>
      <td>5.6.1</td>
    </tr>
  </tbody>
</table>
</div>




```python
data.query("Genres in ['Shopping', 'Tools']") # checking if the genre belongs to the list
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
      <th>App</th>
      <th>Category</th>
      <th>Rating</th>
      <th>Reviews</th>
      <th>Size</th>
      <th>Installs</th>
      <th>Type</th>
      <th>Price</th>
      <th>Content_Rating</th>
      <th>Genres</th>
      <th>Last_Updated</th>
      <th>Current_Ver</th>
      <th>Android_Ver</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>3</th>
      <td>Nike</td>
      <td>SHOPPING</td>
      <td>4.7</td>
      <td>67071</td>
      <td>40M</td>
      <td>1,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Everyone</td>
      <td>Shopping</td>
      <td>August 01, 2018</td>
      <td>5.6.1</td>
      <td>3.4</td>
    </tr>
    <tr>
      <th>4</th>
      <td>eBay: Buy &amp; Sell this Summer - Discover Deals ...</td>
      <td>SHOPPING</td>
      <td>4.4</td>
      <td>2788923</td>
      <td>Varies with device</td>
      <td>100,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Teen</td>
      <td>Shopping</td>
      <td>July 30, 2018</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
    <tr>
      <th>5</th>
      <td>Google Translate</td>
      <td>TOOLS</td>
      <td>4.5</td>
      <td>5745093</td>
      <td>Varies with device</td>
      <td>500,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Everyone</td>
      <td>Tools</td>
      <td>August 04, 2018</td>
      <td>6.7.8</td>
      <td>5.6.1</td>
    </tr>
    <tr>
      <th>6</th>
      <td>Scientific Calculator Free</td>
      <td>TOOLS</td>
      <td>1.0</td>
      <td>16395</td>
      <td>Varies with device</td>
      <td>1,000,000+</td>
      <td>Free</td>
      <td>0</td>
      <td>Everyone</td>
      <td>Tools</td>
      <td>June 28, 2018</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
  </tbody>
</table>
</div>



# Date and Time
By default pandas will try to guess the datatypes of each column. 

For example if they are all floating point numbers e.g. 0.001 then pandas will store all the numbers in memory in this format

This greatly reduces the memory use and makes it easier to perform calculations on the data
Some types are hard to process automatically e.g. Dates you can specify the types of any column manually when loading in the data. 

You can specify the types of any column manually when loading in the data. Here we convert the <b>Last_Updated</b> column to be a DateTime column. 


```python
data.Last_Updated = pd.to_datetime(data.Last_Updated, format='%B %d, %Y')
```

<b> Converting to Datetime (B = Month as full name). This may not always be applicable

The format above must match the format within the column, you can find date formats at http://strftime.org/


```python
data.Last_Updated # this converts the column to a DateTime format
```




    0   2018-06-20
    1   2018-07-26
    2   2018-08-03
    3   2018-08-01
    4   2018-07-30
    5   2018-08-04
    6   2018-06-28
    Name: Last_Updated, dtype: datetime64[ns]



<b>You can see above the the new data type for the Last Updated column is a DateTime64 field.

# Index
Your index is a column which provides a unique ID for each row. Operations can be performed on it e.g. changing the index column to be a DateTime index


```python
data.index = pd.DatetimeIndex(data.Last_Updated, name='Index')
```

<b> Your index can be reassigned to another column (Last_Updated). DateTimeIndex is used to maintain it's format as DateTime in this specific example


```python
data[['App']]
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
      <th>App</th>
    </tr>
    <tr>
      <th>Index</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>2018-06-20</th>
      <td>Pixel Draw - Number Art Coloring Book</td>
    </tr>
    <tr>
      <th>2018-07-26</th>
      <td>FC Barcelona Official App</td>
    </tr>
    <tr>
      <th>2018-08-03</th>
      <td>Facebook</td>
    </tr>
    <tr>
      <th>2018-08-01</th>
      <td>Nike</td>
    </tr>
    <tr>
      <th>2018-07-30</th>
      <td>eBay: Buy &amp; Sell this Summer - Discover Deals ...</td>
    </tr>
    <tr>
      <th>2018-08-04</th>
      <td>Google Translate</td>
    </tr>
    <tr>
      <th>2018-06-28</th>
      <td>Scientific Calculator Free</td>
    </tr>
  </tbody>
</table>
</div>



<b>Here you can see the Index has become the DateTime column to allow us to analyse rows by date. Pandas has powerful functions to manage Time analysis. </b>


```python
# Because Last_Updated has been turned into a DateTime column, you can access the specific day, month and year etc
for index, row in data.iterrows():
    last_updated = row['Last_Updated']
    print('{}/{}/{}'.format(last_updated.day, last_updated.month, last_updated.year))
```

    20/6/2018
    26/7/2018
    3/8/2018
    1/8/2018
    30/7/2018
    4/8/2018
    28/6/2018


If you use <b>last_updated.weekday</b>, the weekday numbers are an integer from 0 to 6 corresponding to Monday to Sunday

# Categories

Categoricals are a pandas data type corresponding to categorical variables in statistics. A categorical variable takes on a limited, and usually fixed, number of possible values e.g. gender

We want to set a description for each of the user ratings based on their values in the <b>Rating</b> column.


```python
rating_bins = [0, 1, 2, 3, 4, 5] # there are 5 bins here: 0-1, 1-2, 2-3, 3-4, 4-5
bin_names = ['Poor', 'Low', 'Okay', 'Good', 'Great'] # length must be 1 less than the number of bins

data['Rating Description'] = pd.cut(data['Rating'], rating_bins, labels=bin_names)
```

<b> Cut uses numeric ranges and a list to reassign values. ie. if item is in range 0-1, reassign to 'Poor' (first items in both lists)


```python
data[['App', 'Rating Description']]
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
      <th>App</th>
      <th>Rating Description</th>
    </tr>
    <tr>
      <th>Index</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>2018-06-20</th>
      <td>Pixel Draw - Number Art Coloring Book</td>
      <td>Okay</td>
    </tr>
    <tr>
      <th>2018-07-26</th>
      <td>FC Barcelona Official App</td>
      <td>Good</td>
    </tr>
    <tr>
      <th>2018-08-03</th>
      <td>Facebook</td>
      <td>Great</td>
    </tr>
    <tr>
      <th>2018-08-01</th>
      <td>Nike</td>
      <td>Great</td>
    </tr>
    <tr>
      <th>2018-07-30</th>
      <td>eBay: Buy &amp; Sell this Summer - Discover Deals ...</td>
      <td>Great</td>
    </tr>
    <tr>
      <th>2018-08-04</th>
      <td>Google Translate</td>
      <td>Great</td>
    </tr>
    <tr>
      <th>2018-06-28</th>
      <td>Scientific Calculator Free</td>
      <td>Poor</td>
    </tr>
  </tbody>
</table>
</div>



As you can see, a <b>Rating Description</b> column has been added with the appropriate description depending on where the app's rating fell within the bins

# Sorting

Lets sort the apps by their number of installs. You also sort by multiple columns by using a list of strings in the <b>by</b> argument of the sort_values() method.

You can choose to sort in ascending or descending order by specifying a boolean to the <b>ascending</b> argument. 
The argument <b>inplace=True</b> means that a dataframe will not be returned when the operation is finished and the operation will be performed on the same dataframe (overwrite)


```python
data.sort_values(by='Last_Updated', ascending=False, inplace=True) # in descending order
data[['App', 'Last_Updated']]
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
      <th>App</th>
      <th>Last_Updated</th>
    </tr>
    <tr>
      <th>Index</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>2018-08-04</th>
      <td>Google Translate</td>
      <td>2018-08-04</td>
    </tr>
    <tr>
      <th>2018-08-03</th>
      <td>Facebook</td>
      <td>2018-08-03</td>
    </tr>
    <tr>
      <th>2018-08-01</th>
      <td>Nike</td>
      <td>2018-08-01</td>
    </tr>
    <tr>
      <th>2018-07-30</th>
      <td>eBay: Buy &amp; Sell this Summer - Discover Deals ...</td>
      <td>2018-07-30</td>
    </tr>
    <tr>
      <th>2018-07-26</th>
      <td>FC Barcelona Official App</td>
      <td>2018-07-26</td>
    </tr>
    <tr>
      <th>2018-06-28</th>
      <td>Scientific Calculator Free</td>
      <td>2018-06-28</td>
    </tr>
    <tr>
      <th>2018-06-20</th>
      <td>Pixel Draw - Number Art Coloring Book</td>
      <td>2018-06-20</td>
    </tr>
  </tbody>
</table>
</div>



# Grouping

<b>Groupby applies to a column of values and it creates an object that consists of a data frame for each value that the column takes.


```python
grouped_data = data['App'].groupby(data['Content_Rating'])
```


```python
# Gives a summary of the grouped data
grouped_data.describe()
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
      <th>count</th>
      <th>unique</th>
      <th>top</th>
      <th>freq</th>
    </tr>
    <tr>
      <th>Content_Rating</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Everyone</th>
      <td>5</td>
      <td>5</td>
      <td>Nike</td>
      <td>1</td>
    </tr>
    <tr>
      <th>Teen</th>
      <td>2</td>
      <td>2</td>
      <td>eBay: Buy &amp; Sell this Summer - Discover Deals ...</td>
      <td>1</td>
    </tr>
  </tbody>
</table>
</div>



As you can see, there are 5 apps with a content rating of <b>Everyone</b> and 2 apps with a content rating of <b>Teen</b>


```python
# To view the grouped data - not very understandable
list(grouped_data)
```




    [('Everyone', Index
      2018-08-04                         Google Translate
      2018-08-01                                     Nike
      2018-07-26                FC Barcelona Official App
      2018-06-28               Scientific Calculator Free
      2018-06-20    Pixel Draw - Number Art Coloring Book
      Name: App, dtype: object), ('Teen', Index
      2018-08-03                                             Facebook
      2018-07-30    eBay: Buy & Sell this Summer - Discover Deals ...
      Name: App, dtype: object)]



<b> Print is not always easy to read </b>


```python
# Iterating over the grouped data - which might be easier to view
for name, group in grouped_data:
    print(name)
    print('********************************')
    print(group)
```

    Everyone
    ********************************
    Index
    2018-08-04                         Google Translate
    2018-08-01                                     Nike
    2018-07-26                FC Barcelona Official App
    2018-06-28               Scientific Calculator Free
    2018-06-20    Pixel Draw - Number Art Coloring Book
    Name: App, dtype: object
    Teen
    ********************************
    Index
    2018-08-03                                             Facebook
    2018-07-30    eBay: Buy & Sell this Summer - Discover Deals ...
    Name: App, dtype: object


<b> Looping over items can be better for reading


```python
# Use of aggregate functions on the grouped data e.g. mean, count
grouped_data = data.groupby(by='Content_Rating')

print('Aggregate Function Mean:')
print(grouped_data[['Rating']].mean()) # get the average rating between content rating groups

print('\nAggregate Function Count:') # count the apps within the content rating groups
print(grouped_data['App'].count())
```

    Aggregate Function Mean:
                    Rating
    Content_Rating        
    Everyone          3.28
    Teen              4.25
    
    Aggregate Function Count:
    Content_Rating
    Everyone    5
    Teen        2
    Name: App, dtype: int64


<b> Grouping by content rating and outputting the mean for categories, as well as the total items in that category

# Pivot

The <b>Pivot</b> function returns reshaped DataFrame organized by given index / column values. You reshape data (produce a “pivot” table) based on column values

Pivot can be used to create a derived table out of a given one. E.g. Group by content rating and show the reviews of each app

### Example 1


```python
pd.pivot_table(data, index=['Content_Rating', 'App'], values='Reviews') 
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
      <th></th>
      <th>Reviews</th>
    </tr>
    <tr>
      <th>Content_Rating</th>
      <th>App</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th rowspan="5" valign="top">Everyone</th>
      <th>FC Barcelona Official App</th>
      <td>92522</td>
    </tr>
    <tr>
      <th>Google Translate</th>
      <td>5745093</td>
    </tr>
    <tr>
      <th>Nike</th>
      <td>67071</td>
    </tr>
    <tr>
      <th>Pixel Draw - Number Art Coloring Book</th>
      <td>967</td>
    </tr>
    <tr>
      <th>Scientific Calculator Free</th>
      <td>16395</td>
    </tr>
    <tr>
      <th rowspan="2" valign="top">Teen</th>
      <th>Facebook</th>
      <td>78158306</td>
    </tr>
    <tr>
      <th>eBay: Buy &amp; Sell this Summer - Discover Deals Now!</th>
      <td>2788923</td>
    </tr>
  </tbody>
</table>
</div>



<b>Here the table is pivoted and grouped by content rating and app. It's key is a combination of "Content_rating" and "app" and is only displaying the Reviews column 

### Example 2
Lets say we have a small faculty of students, 4 boys and 4 girls with their years and respective average mark for the year


```python
# Create the data frame
raw_data = {'Breed': ['Golden Retriever', 'German Shepard', 'German Shepard', 'German Shepard', 'Golden Retriever', 'Golden Retriever'], 
        'Age': [3,2,2,3,2,3], 
        'Score': [78, 84, 71, 66, 90, 86]}
another_df = pd.DataFrame(raw_data, columns = ['Breed', 'Age', 'Score'])
another_df
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
      <th>Breed</th>
      <th>Age</th>
      <th>Score</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>Golden Retriever</td>
      <td>3</td>
      <td>78</td>
    </tr>
    <tr>
      <th>1</th>
      <td>German Shepard</td>
      <td>2</td>
      <td>84</td>
    </tr>
    <tr>
      <th>2</th>
      <td>German Shepard</td>
      <td>2</td>
      <td>71</td>
    </tr>
    <tr>
      <th>3</th>
      <td>German Shepard</td>
      <td>3</td>
      <td>66</td>
    </tr>
    <tr>
      <th>4</th>
      <td>Golden Retriever</td>
      <td>2</td>
      <td>90</td>
    </tr>
    <tr>
      <th>5</th>
      <td>Golden Retriever</td>
      <td>3</td>
      <td>86</td>
    </tr>
  </tbody>
</table>
</div>




```python
pd.pivot_table(another_df, index=['Breed','Age'], aggfunc='mean')
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
      <th></th>
      <th>Score</th>
    </tr>
    <tr>
      <th>Breed</th>
      <th>Age</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th rowspan="2" valign="top">German Shepard</th>
      <th>2</th>
      <td>77.5</td>
    </tr>
    <tr>
      <th>3</th>
      <td>66.0</td>
    </tr>
    <tr>
      <th rowspan="2" valign="top">Golden Retriever</th>
      <th>2</th>
      <td>90.0</td>
    </tr>
    <tr>
      <th>3</th>
      <td>82.0</td>
    </tr>
  </tbody>
</table>
</div>



Here we have pivoted the table and grouped by <b>Class</b> and <b>Year</b>. We then used the aggregate function mean to get the average testscore  
