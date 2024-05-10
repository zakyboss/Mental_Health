# Introduction to HTML

HTML (Hypertext Markup Language) is the standard markup language used to create and structure web pages. It provides a way to define the content, structure, and layout of a web page using a set of tags or elements. In this guide, we'll cover the basics of HTML and its essential concepts.

## What is HTML?

HTML is a markup language, which means it uses tags to define and structure the content of a web page. These tags are enclosed in angle brackets (`< >`) and provide semantic meaning to the content they surround. For example, the `<h1>` tag represents the main heading of a web page, while the `<p>` tag defines a paragraph of text.

## HTML Document Structure

An HTML document typically consists of the following structure:

```html
<!DOCTYPE html>
<html>
  <head>
    <!-- Metadata about the document -->
    <title>Page Title</title>
  </head>
  <body>
    <!-- The visible content of the page -->
    <h1>Hello, World!</h1>
    <p>This is a paragraph.</p>
  </body>
</html>
```

- `<!DOCTYPE html>`: This declaration tells the browser that the document is an HTML5 document.
- `<html>`: The root element that contains the entire HTML document.
- `<head>`: This section contains metadata about the document, such as the title, styles, and scripts.
- `<body>`: This section contains the visible content of the web page.

## HTML Elements

HTML elements are the building blocks of a web page. They are represented by tags and can have attributes that provide additional information or modify the behavior of the element. Here are some common HTML elements:

- Headings: `<h1>`, `<h2>`, `<h3>`, ..., `<h6>`
- Paragraphs: `<p>`
- Lists: `<ul>` (unordered list), `<ol>` (ordered list), `<li>` (list item)
- Links: `<a>`
- Images: `<img>`
- Divisions: `<div>`

## HTML Attributes

HTML attributes provide additional information or modify the behavior of an element. They are added within the opening tag of an element and take the format `attribute="value"`. For example:

```html
<a href="https://www.example.com">Link to Example</a>
```

In this example, the `href` attribute specifies the URL that the link points to.

## HTML Semantics

HTML5 emphasizes the use of semantic elements, which provide meaning and structure to the content on a web page. Some examples of semantic elements include:

- `<header>`: Represents the header section of a page or section.
- `<nav>`: Defines a section for navigation links.
- `<main>`: Contains the main content of a document.
- `<article>`: Represents a self-contained piece of content.
- `<section>`: Defines a section in a document.
- `<footer>`: Represents the footer section of a page or section.

Using semantic elements makes your HTML more accessible, easier to maintain, and more search engine friendly.


> "All will be right, look to the Light" _Anonymous_