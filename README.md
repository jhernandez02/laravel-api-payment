<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# REST API PAYMENT CLIENTE

Following we have a sequence of instructions to install and run the app.
You need to create a database first, then you need to configure it in the .env file.
You must configure the email credentials to send emails, in the .env file.

## How to install data base

    composer install
    php artisan migrate
    php artisan db:seed

## Run the app

    php artisan serve

# REST API PAYMENT CLIENTE

Following we have a sequence of requests that will be used to test the API.

## User Login

### Request

`POST /api/payments`

    curl --request POST \
        --url http://localhost:8000/api/login \
        --header 'Content-Type: application/json' \
        --data '{"user": "admin@example.com","password": "123456"}'

### Response

    {
        "user": {
            "id": 1,
            "name": "Web Administrator",
            "email": "admin@example.com",
            "email_verified_at": null,
            "created_at": "2022-10-17T22:02:44.000000Z",
            "updated_at": null
        },
        "token": "1|kQ3srQniIUo0814uekjUJekAT644W7E0Axkrkc7q"
    }

## Get list of Clients

### Request

`GET /api/clients`

    curl --request GET \
        --url 'http://localhost:8000/api/payments?client=3' \
        --header 'Authorization: Bearer 1|kQ3srQniIUo0814uekjUJekAT644W7E0Axkrkc7q'

### Response

    [
        {
            "id": 1,
            "email": "client01@example.com",
            "join_date": "2022-01-01"
        },
        {
            "id": 2,
            "email": "client02@example.com",
            "join_date": "2022-01-01"
        },
        {
            "id": 3,
            "email": "client03@example.com",
            "join_date": "2022-01-01"
        }
    ]

## Create a new Client

### Request

`POST /api/clients`

    curl --request POST \
        --url http://localhost:8000/api/clients \
        --header 'Authorization: Bearer 1|kQ3srQniIUo0814uekjUJekAT644W7E0Axkrkc7q' \
        --header 'Content-Type: application/json' \
        --data '{
            "email": "client04@example.com"
        }'

### Response

    {
        "email": "client04@example.com",
        "join_date": "2022-10-17",
        "updated_at": "2022-10-17T05:54:57.000000Z",
        "created_at": "2022-10-17T05:54:57.000000Z",
        "id": 4
    }
    
## Get list of Payments by Clients

### Request

`GET /api/payments?client=3`

    curl --request GET \
        --url 'http://localhost:8000/api/payments?client=3' \
        --header 'Authorization: Bearer 1|kQ3srQniIUo0814uekjUJekAT644W7E0Axkrkc7q'

### Response
    [
        {
            "uuid": "86d757bd-7aae-488f-a9cc-22f1cc268a44",
            "payment_date": "2019-02-01",
            "expires_at": "2019-03-01",
            "status": "paid",
            "user_id": 3,
            "clp_usd": 810
        }
    ]

## Create a new Paymnent

### Request

`POST /api/payments`

    curl --request POST \
        --url http://localhost:8000/api/payments \
        --header 'Authorization: Bearer 1|kHqbthgEmRCyVg2ShurlO6DtveN6DIcxNLOj23CS' \
        --header 'Content-Type: application/json' \
        --data '{
            "client_id": 2
        }'

### Response

    {
        "uuid": "65b30e46-e7d8-4c6b-baa2-82035496d4db",
        "payment_date": "2022-10-17",
        "expires_at": "2022-11-17",
        "status": "65b30e46-e7d8-4c6b-baa2-82035496d4db",
        "user_id": 2,
        "clp_usd": null
    }