# Build a CMS from scratch with Laravel and Vue

This is an example of how to build a CMS from scratch with Laravel and Vue. You can read the article on Pusher here:

* [Part One](https://pusher.com/tutorials/cms-laravel-vue-part-1)
* [Part Two](https://pusher.com/tutorials/cms-laravel-vue-part-2)
* [Part Three](https://pusher.com/tutorials/cms-laravel-vue-part-3)
* [Part Four](https://pusher.com/tutorials/cms-laravel-vue-part-4)
* [Part Five](https://pusher.com/tutorials/cms-laravel-vue-part-5)
* [Part Six](https://pusher.com/tutorials/cms-laravel-vue-part-6)

## Getting Started

-   Download or clone the project.
-   `cd` to the project directory.
-   Rename `.env.example` to `.env`
-   Run the command `composer install`.
-   Run the command `php artisan key:generate` to generate an application key.
-   Configure the database settings in the `.env` file.
-   Update the `PUSHER_APP_*` keys in the `.env` file.
-   Change the `BROADCAST_DRIVER` to `pusher`.
-   Migrate the database by running this command: `php artisan migrate --seed`.
-   Run the command: `php artisan serve` to start the app.


## Built With

-   [Laravel](https://laravel.com) framework
-   PHP
