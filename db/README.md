# SQL Basics

SQL (Structured Query Language) is a programming language used to manage and manipulate relational databases. It is widely used in various industries and applications that involve working with data stored in databases. Here are some basic SQL concepts that beginners should understand.

## Database and Tables

A database is a collection of related data organized in a structured manner. Within a database, data is stored in tables. Each table consists of rows (records) and columns (fields).

## SQL Statements

SQL uses various statements to interact with databases. Here are some common SQL statements:

### SELECT

The `SELECT` statement is used to retrieve data from a database. It allows you to specify which columns to retrieve and from which tables.

```sql
SELECT column1, column2
FROM table_name;
```

### INSERT

The `INSERT` statement is used to add new data to a table.

```sql
INSERT INTO table_name (column1, column2)
VALUES (value1, value2);
```

### UPDATE

The `UPDATE` statement is used to modify existing data in a table.

```sql
UPDATE table_name
SET column1 = value1, column2 = value2
WHERE condition;
```

### DELETE

The `DELETE` statement is used to remove data from a table.

```sql
DELETE FROM table_name
WHERE condition;
```

## Clauses

SQL clauses are used to filter, sort, and manipulate the data retrieved from a database.

### WHERE

The `WHERE` clause is used to filter rows based on a specified condition.

```sql
SELECT column1, column2
FROM table_name
WHERE condition;
```

### ORDER BY

The `ORDER BY` clause is used to sort the result set in ascending or descending order.

```sql
SELECT column1, column2
FROM table_name
ORDER BY column1 ASC (or DESC);
```

### JOIN

The `JOIN` clause is used to combine rows from two or more tables based on a related column between them.

```sql
SELECT column1, column2
FROM table1
JOIN table2
ON table1.column = table2.column;
```

## Data Types

SQL supports various data types to store different kinds of data. Some common data types include:

- `INT` (or `INTEGER`) for whole numbers
- `FLOAT` (or `DECIMAL`) for decimal numbers
- `VARCHAR` (or `TEXT`) for character strings
- `DATE` for date values
- `DATETIME` for date and time values

This is just a review.


> "Those who cannot remember the past are condemned to repeat it" _George Santayana_