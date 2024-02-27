## About MundosE-API

This repository presents a Laravel 10(API) project that uses Guzzle to get provinces data from [apis.datos.gob](https://apis.datos.gob.ar/georef/api/provincias). It includes a list of provinces, CRUD of people and mailing with Mailtrap when registering.

## What's in the project?

1. Models, Migrations, Seeder, Sending Mail
2. CRUD of People
3. Listing and restoring deleted person records
4. Use of seeder with provinces
5. Use of external APIs
6. Example of Swagger in the controller people

## Steps to use the project

1. Clone the project from [mundose-api](https://github.com/cromero2386/mundose-api.git)
2. To clone run
   2.1 `git clone https://github.com/cromero2386/mundose-api.git`
3. Go to the root directory of the project:
   3.1 Create and configure the necessary `.env` following the example of `.env.example`.
   3.2 And run the command `composer install` to download the dependencies.

### How to create a model, migrations and controller

-   Go to the root directory of the project and execute the following command in console

```
php artisan make:model Person -mcr
```

-   `m` This option indicates that a migration should be generated together with the model.
-   `c` This option indicates that a controller should be generated together with the model.
-   `r` This option indicates that a resource should be generated together with the model. It generates the structure of the basic functions in the controller.

### How to install a library?

-   For example if I want to install the Laravel Socialite package

```
composer require laravel/socialite
```

### Use of api.datos.gob.ar

-   In the file that is in database/seeders/ProvinceSeeder.php I obtain and perform the following:

1. Get to url `https://apis.datos.gob.ar/georef/api/provincias`
2. Makes a map of the response.
3. Execute a laravel update or create to insert or update provinces.
