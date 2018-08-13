# uDine


uDine is an online food ordering web application designed for colleges and universities. It is geared towards college students, faculty, and staff.

## Features

* Place orders
* Over 150+ school options
* Account creation
* Cross-platform

## Getting Started

### Users

Go to [www.udine.online](http://www.udine.online). If that does not work, visit the [Direct Link](http://udine.online.s3-website.us-east-2.amazonaws.com/)


### Developers

* [XAMPP](https://www.apachefriends.org/index.html) - Used to run the server locally.  Once installed run Apache and MySQL.

In the browser, type the following: “localhost:80” where 80 is the default port number used by the Apache server. You may need to change this depending on your port & firewall settings. To access the database you need to enter “localhost:80/phpmyadmin” and substitute the 80 if it does not load.To load the website, you need to type “localhost:80/uDine”1 where you will find all of the project files and can navigate between them. 

* This assumes you create a folder called “udine” in XAMPP’s htdocs folder in the C drive. When typing the folder name in the localhost address, it is case insensitive.

* Make sure you create the database table by importing the udine_create.sql file.

## Built With

HTML, CSS, and JavaScript.
* [BootStrap](https://getbootstrap.com/) - Front-end
* [Dine on Campus](https://www.dineoncampus.com/) - Menu Json 
* [mySQL](https://www.mysql.com/) - Database
* [Json Simple](https://github.com/fangyidong/json-simple) - Java Json Library Parser

### Change the School

Go to “uDine/Project/Json/src/Json.java”

go to line 162 and change the school name to one that is listed above.  Once you run the program the menu will update to the school of your choice.  One thing to keep in mind is most schools are closed over the summer so that means that the menu will not have any items for sale.


## Authors

Matthew Russell, 
Alex Steege
