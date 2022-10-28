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
 - ADMIN
    ```
    ADMIN_EMAIL:jpol@mailinator.com #You can this.
    ```
_Note: All the value above is a example an can be change depends on your setup._
#### Install all the dependecies using the command
`composer install`
#### Run the migration using this command
`php artisan migrate`

_Note: Make sure that you properly setup your .ENV database connection before running the migration_

## Simulate
- First thing to do is to seeder dummy data for orders table. We can achieve this by running the command:
`php artisan db:seed`

 _It will seed a data for users, orders and initialize the admin data._
- After a successfully seeding of the data you can check the list of orders using this API route `<base_url>/api/orders` via GET method.
    ```
    curl --location --request GET 'trial-project.test/api/orders'
    ```
- Chose an ID from the list and we can trigger the notification by updating an order using this the API route `<base_url>/api/orders/<order_id>` via PUT method.
    ```Sample CURL:
    curl --location --request PUT 'trial-project.test/api/orders/6' \
        --header 'Content-Type: application/json' \
        --header 'Cookie: XSRF-TOKEN=eyJpdiI6Ik52S2c5QWVZY3FTTHBRM3RlQ3VtUWc9PSIsInZhbHVlIjoibTVXQm1yK1FOakpCUS9ITGF5T3hCeGplaHVmbTUzKzNTOFlHeUNsNGg5dkhZRlQ4S1BsamI4MUNCaGRXcWNKWWtYc2YrcUNCL09hZGZLcFoyb1loQ0RuTldpYXJxbHZLUUhOL09jRGxzbDFRTEtid0ZubmRWM0ZHOFl6TWRIM28iLCJtYWMiOiI3NGJkMGM1YzAyZDJhNmVkNzY3YjhkZDMzZDIwYzQyMzY3N2MwMmNmYTI4YjQwMGY4YmI2OGJlYzVmMGRmNTk1IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InFrRjRUclhzTjNEbTk3MnlZeHd4SWc9PSIsInZhbHVlIjoiUll5U3dPTnE1dEc2RmxEOVlaQjBQVjhSM01HRUNlTSsrN2U5Nm9nZGtaUVNvOGd4VUFJVGh1aTlhNTQ5Q0dHMXMvSDRlcm5zRk9IQ0pPZE1pWU1NN1hvNitDdmxLbFYvYkFkaVpndXE5R1d4eW9QVGlQRk1uTjRlRGRCaGsyY3ciLCJtYWMiOiI5NGJmNTljMTcxNmY2NTNlNzI1MzlmYTkyZjE0MTAwNjRiYjQxNTEwMDE2YmU1MjYyNDJlNDY5MTc2MjZlY2E3IiwidGFnIjoiIn0%3D' \
        --data-raw '{
            "bl_release_date": "2022-10-10"
        }'```
- Once these criteria accomplished:
    - If freight_payer_self is 0/null
    - If it updates the bl_release_date from null to a new value.
- It will send an email notification to ADMIN_EMAIL (default: jpol@mailinator.com - This can be set via ENV)

