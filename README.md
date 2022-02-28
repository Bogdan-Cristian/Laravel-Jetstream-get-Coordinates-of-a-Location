<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project Description
This is an Application for Location Coordinates. You can insert an Address and get the Long-Latitude of the Location. You can also search for other Locations in the radius of it. It will only indicate the cities.
The Project is based on Laravel Jetstream which is an implementation of Authentification.
The Frontend is developed on InertiaJS and TailwindCSS.

## Project Installation
- **git clone https://github.com/Bogdan-Cristian/Laravel-Jetstream-get-Coordinates-of-a-Location.git**
- **composer install**
- **npm install**
- **cp .env.exampe ./.env**
- **Setup .env Data for database (or dont if you want to use SQlite like in the .env.example)**
- **php artisan key:generate**
- **php artisan migrate**
- **Add Environment variable GOOGLE_API_KEY and assert it the API-Key**
- **Use an option for starting the server:**
  - php -S localhost:80 -t public
  - php artisan serve
  - Setup an Apache local Web-Server with the entry-point ./public

## Main-Application routes
 - **Registration (/register)**
 - **Login (/login)**
 - **Main Dashboard of the Application (/dashboard)**
 - **Address-Management where you can insert an Address and get the coordinates (/addresses)**
 - **Search for cities in the radius of an Address (/searchradius)**

## Application Preview
 - **Dashboard <br> <img src="https://github.com/Bogdan-Cristian/Laravel-Jetstream-get-Coordinates-of-a-Location/blob/main/ReadMeImages/dashboard.png?raw=true" height="200px"></img>**
 - **Addresses <br> <img height="200px" src="https://github.com/Bogdan-Cristian/Laravel-Jetstream-get-Coordinates-of-a-Location/blob/main/ReadMeImages/addresses.png?raw=true"></img>**
 - **Search Radius <br> <img height="200px" src="https://github.com/Bogdan-Cristian/Laravel-Jetstream-get-Coordinates-of-a-Location/blob/main/ReadMeImages/search.png?raw=true">**
 - **Register <br> <img height="200px" src="https://github.com/Bogdan-Cristian/Laravel-Jetstream-get-Coordinates-of-a-Location/blob/main/ReadMeImages/register.png?raw=true">**
 - **Login <br> <img height="200px" src="https://github.com/Bogdan-Cristian/Laravel-Jetstream-get-Coordinates-of-a-Location/blob/main/ReadMeImages/login.png?raw=true">**