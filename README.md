<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Server Requirements:
- PHP >= 7.3
- Composer >= 2.4.1
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
## Installation
#### Setup the follow in .ENV file (Laravel provide a .env.example as ENV file template) 
- Database
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3307
    DB_DATABASE=trial-project
    DB_USERNAME=root
    DB_PASSWORD=
    ```
- MAIL
    ```
    MAIL_MAILER=smtp
    MAIL_HOST=mailhog
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=null
    MAIL_FROM_NAME="${APP_NAME}"
    ```
    If you wish to use `log` as primary mailer you case setup the MAIL env like this.
    ```
    MAIL_MAILER=log
    ```
 - QUEUE_CONNECTION
    ```
    QUEUE_CONNECTION=sync
    ```
    For Redis you should setup this:
    ```
    QUEUE_CONNECTION=redis
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    ```
#### Install all the dependecies using the command
`composer install`
#### Run the migration using this command
`php artisan migrate`

_Note: Make sure that you properly setup your .ENV database connection before running the migration_

## Simulate
- First thing to do is to seeder dummy data for users and orders table. We can achieve this by running the command:
`php artisan db:seed`
 _It will seed a data for users, orders and initialize the admin data._
- After a successfully seeding the data we can trigger now the notification by accessing the API route `<base_url>/api/admin/notify/order/for-payment-request` via GET method.
