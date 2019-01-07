# uDine

uDine is an online food ordering web application designed for colleges and universities. It is geared towards college students, faculty, and staff.

![uDine Logo](Project/Images/uDineLogoWhite.JPG)

## Features

* Place orders
* Over 150+ school options
* User accounts
* Cross-platform

## Getting Started

User data is not saved on a centralized server and it is **unique** to your local computer (see the Server-Side section below).

### Users/Client-Side

Go to [www.udine.online](http://www.udine.online). If that does not work, visit the [direct link](http://udine.online.s3-website.us-east-2.amazonaws.com/)


### Server-Side

* [XAMPP](https://www.apachefriends.org/index.html), [PHPMyAdmin](https://www.phpmyadmin.net/) - Used to run the server locally.  Once installed run Apache and mySQL.

In the browser, type the following: “localhost:80” where 80 is the default port number used by the Apache server. You may need to change this depending on your port & firewall settings. To access the database, go to **PHPMyAdmin** by entering “localhost:80/phpmyadmin” in the address bar and substitute the 80 if it does not load. To load the website, you need to type “localhost:80/uDine”<sup>1</sup> where you will find all of the project files and can navigate between them. 

1. This assumes you create a folder called “udine” in XAMPP’s htdocs folder in the C drive. When typing the folder name in the localhost address, it is case insensitive.

2. Make sure you create the database table by importing the udine_create.sql file.

## Built With

* [HTML](https://html.com/), [CSS](https://www.w3.org/Style/CSS/Overview.en.html), and [JavaScript](https://www.javascript.com/) - Front-end
* [jQuery](https://jquery.com//) - Front-end
* [Bootstrap](https://getbootstrap.com/) - Front-end
* [PHP](https://secure.php.net/) - Back-end
* [mySQL](https://www.mysql.com/) - Database

* [Dine on Campus](https://www.dineoncampus.com/) - Menu
* [Example JSON API](https://api.dineoncampus.com/v1/sites/cof/info.json/) - Colleges of the Fenway API
* [JSON Simple](https://github.com/fangyidong/json-simple) - Java JSON Library Parser

## Usage
### Placing an Order
![MenuOrder1](Project/Images/MenuOrdering1.JPG)
<b>Figure 1</b>: Selecting items from the cart.


![MenuOrder2](Project/Images/MenuOrdering2.JPG)
<b>Figure 2</b>: Viewing the cart.


![MenuOrder3](Project/Images/MenuOrdering3.JPG)
<b>Figure 3</b>: Checkout page.


![MenuOrder4](Project/Images/MenuOrdering4.JPG)
<b>Figure 4</b>: Order placement confirmation with pick-up time.

### Change the School

Go to “uDine/Project/Json/src/Json.java”

On lines 148 to 158, you can find API links to various schools that have a partnership with Dine On Campus. On line 162, you can change the school name to one that is listed in the Java file. Once you run the program, the menu will update to the school of your choice. One thing to keep in mind is most schools are closed over the summer which means that the menu will not have any items for sale.



## Authors

Alex Steege,
Matthew Russell
