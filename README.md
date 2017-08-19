##Lawline Development Test

This test was written on Laravel 5.2 using PHP 7.1.

To compile everything, please run the following commands:

- composer install
- Copy .env.example and rename to .env
- Run command: php artisan key:generate
    - Copy generated key to .env in APP_KEY
- php artisan key:generate
- php artisan migrate
- php db:seed