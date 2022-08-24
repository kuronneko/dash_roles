<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# wikiPlantas

### Description: 
wikiPlantas is a web application designed to build a repository with information about plants and herbs.

### Features:
* Laravel-Permission System Implemented
* Stisla UI
* Tags System
* Attach Multiple Images

### Technologies/Libraries:
Laravel 8, PHP 7.4, Bootstrap 4, CSS, Javascript, Jquery, Laravel-Permissions, Laravel-Collective, StislaUI

### Preview:
<p> <img src="https://github.com/kuronneko/kuronneko.github.io/blob/master/assets/img/portfoliowp.png" width="450"> </p>

## How to install
* cp .env.example .env
* composer install
* php artisan key:generate
* php artisan storage:link
* php artisan migrate
* npm install && npm run dev
* php artisan db:seed --class=SeederTablaPermisos
* php artisan db:seed --class=SeederTablaTags
* register as Super Admin Account: admin@gmail.com

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
