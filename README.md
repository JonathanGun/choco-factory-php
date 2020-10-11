# A-Chong-co Chocolate Factory Website

Simple Stock Management Website made using pure PHP, HTML, CSS, and JS. Here are the key features:

- Login and Register account,
- User can buy items,
- Superuser/Admin can create new item and restock item,
- Some functions updated using AJAX,
- Data are saved on MySQL databases,
- no framework library used, but I made my own, worked around MVC concept

## Requirements

1. PHP
1. Mysql
1. Your favorite browser

## Setting Up

1. Install Requirements (I used [XAMPP](https://www.apachefriends.org/download.html))
1. Clean (delete all files) inside PHP htdocs folder
1. Clone repo inside PHP htdocs folder
1. Restore `chocofac20201009.sql`
1. Copy `config.example.ini` ke `config.ini`, adjust

## Restoring Database

1. Open mysql on repo's root folder

```
mysql -u root -p
```

2. Create new database

```
CREATE DATABASE chocofac;
```

3. Execute queries

```
source chocofac20201009.sql
```

This will create:

- 200 users + 1 superuser
- 100 chocolates
- 2211 transactions

## Running

1. Run PHP and MySQL (again, I used XAMPP)
1. Open localhost:\$PORT (default is [localhost:80](localhost:80))

## Project Structure

```
htdocs
├───application
│   ├───config
│   ├───controllers
│   ├───models
│   └───views
├───framework
│   ├───core
│   └───database
├───mockup
├───public
│   ├───css
│   ├───html
│   │   ├───chocolate
│   │   ├───error
│   │   └───user
│   ├───images
│   ├───js
│   ├───templates
│   └───uploads
└───wwwroot
```

- application: contains MVC(models, views, controllers) and config folder
- framework: custom framework, based on MVC
- public/html: divided as per model
- public/images: sample images
- public/uploads: uploaded images goes here
- wwwroot: first redirect, sanitize url, runs framework

## Main Features

### Register

Register new account
![](screenshot/register.jpg)

### Login

Must login before entering website
![](screenshot/login.jpg)

### Search by name

using search bar on top (optional; can choose on dashboard)

### Chocolate Detail

Click on a chocolate card to see detail

### Buy Chocolate

Click `Buy Now` on Chocolate Detail page (as user)

Enter amount and address

Click `Buy` to buy, or `Cancel` to cancel

### Add Chocolate Stock

Click `Add Stock` on Chocolate Detail page (as superuser)

Enter amount

Click `Add` to add stock, or `Cancel` to cancel

### Transaction History

Click `History` on navigation bar (on top of the page) (as user)

### Add New Chocolate

Click `Add New chocolate` on navigation bar (on top of the page) (as superuser)

Enter details

Click `Add` to add new chocolate, or `Cancel` to cancel

## Bonus Features

### Cookie Access Token

Using SHA-1 of salted username+password+secret

Set Cookie expired time (1 day)

### Real Time Stock

check again on database, not only on frontend

WIP ajax on buy chocolate

### Responsive Layout

utilising CSS Grid, mimicking Bootstrap Grid Layout (`row` class)

### Successful Add/Buy Feedback

so the user know if it is succesful

## Pembagian Tugas

### Front End

1. Login: 13518084
1. Register: 13518084
1. Dashboard: 13518084
1. Search Result: 13518084
1. Chocolate Detail: 13518084
1. Buy Chocolate: 13518084
1. Add Stock Chocolate: 13518084
1. Transaction History: 13518084
1. Add New Chocolate: 13518084
1. Bonus: 13518084

### Back End

1. Login: 13518084
1. Register: 13518084
1. Dashboard: 13518084
1. Search Result: 13518084
1. Chocolate Detail: 13518084
1. Buy Chocolate: 13518084
1. Add Stock Chocolate: 13518084
1. Transaction History: 13518084
1. Add New Chocolate: 13518084
1. Bonus: 13518084

### References

Basic PHP Knowledge

- XAMPP: https://www.javatpoint.com/xampp
- MySQL: https://www.tutorialspoint.com/mysql/index.htm

Creating Custom Framework

- MVC: https://www.codeproject.com/Articles/1080626/Code-Your-Own-PHP-MVC-Framework-in-Hour
- Templating: https://softwareengineering.stackexchange.com/questions/159529/how-to-structure-template-system-using-plain-php

Other PHP Knowledge

- Pagination: https://www.malasngoding.com/membuat-paging-dengan-php-dan-mysql/
- AJAX: https://www.w3schools.com/php/php_ajax_php.asp

Frontend Design

- Responsive Table: https://codepen.io/andornagy/pen/EVXpbR
- CSS Grid: https://speckyboy.com/replicate-bootstrap-grid-using-css-grid/

## Author

Jonathan Yudi Gunawan - 13518084

## Ideas

- superuser notified when stock empty
