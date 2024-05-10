# HTML Tables

Tables are used to organize data in rows and columns, making it easier to read and understand. In HTML, we use the `<table>` element to create tables.

## Basic Table Structure

A basic HTML table consists of the following elements:

- `<table>` - Defines the table
- `<tr>` - Defines a table row
- `<th>` - Defines a table header cell
- `<td>` - Defines a table data cell

Here's an example:

```html
<table>
  <tr>
    <th>Name</th>
    <th>Age</th>
    <th>City</th>
  </tr>
  <tr>
    <td>John</td>
    <td>25</td>
    <td>New York</td>
  </tr>
  <tr>
    <td>Jane</td>
    <td>32</td>
    <td>London</td>
  </tr>
</table>
```

This will create a table with three columns (Name, Age, City) and two rows of data.

## Table Headers

The `<th>` element defines a table header cell, which is typically rendered in bold and centered text. Table headers are essential for identifying the meaning of the data in each column.

## Table Rows and Cells

The `<tr>` element defines a table row, and the `<td>` element defines a table data cell. Each row can have multiple cells, and each cell can contain text, images, or other HTML elements.

## Table Attributes

HTML tables also support various attributes that can be used to customize the appearance and behavior of the table. Here are some common attributes:

- `border` - Specifies the width of the table border
- `cellpadding` - Specifies the space between the cell content and the cell border
- `cellspacing` - Specifies the space between cells
- `width` - Specifies the width of the table
- `height` - Specifies the height of the table

Example with attributes:

```html
<table border="1" cellpadding="5" cellspacing="5" width="500">
  ...
</table>
```

## Styling Tables with CSS

While HTML attributes can provide basic styling for tables, it's recommended to use CSS for more advanced styling options. With CSS, you can control the appearance of tables, including colors, fonts, borders, and more.

> "Cheerly Cheerly then Cheer Up." _Anonymous_