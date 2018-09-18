# ShopsManagementProject Developed by Laravel 5.7 & Vue JS 2

A [Laravel](http://laravel.com/) and [Vue JS](https://vuejs.org/) application for locate near shops with shops management and users management.

## Installation

-   composer install
-   npm install
-   Create database and fill the database name and username and password database in the .env file
-   php artisan migrate --seed or php artisan migrate:refresh **(if you have already the database with it tables). You will find a sample data generated automatically by the seed files**
-   php artisan serve
-   Use the [http://localhost:8000](http://localhost:8000) in the browser to view the application

## Modules

The application has several modules namely :

-   SignIn
-   SignUp
-   Shops Management **(CRUD for Back-office)**
-   Users Management **(CRUD for Back-office)**
-   List of near shops from the user address. Multiple Criterias are respected **(liked shops shouldn’t be displayed on the main page, disliked shops won’t be displayed within “Nearby Shops” list during the next 2 hours)**
-   Like and dislike shops
-   List of preferred shops with possibility of removing it from this list

## Live Demo

Here is the link for Live demo [Live Demo](http://elmabroukmarouane.pw/ShopsManagementProject)

## Accounts :

-   Super Administrator : Email : [super_admin@mail.com](super_admin@mail.com) Password : 123456

-   User : Email : [user@mail.com](user@mail.com) Password : 123456

## Contact :

EL MABROUK Marouane : [elmabroukmarouane@gmail.com](elmabroukmarouane@gmail.com)
