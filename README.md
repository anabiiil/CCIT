# CCIT TASK

## Installation

user this command

```bash
composer install
```
## Configure Stripe

add your stripe secret key and public key  in .env file


```bash
STRIPE_KEY=YOUR KEY
STRIPE_SECRET= YOUR SECRET
CASHIER_CURRENCY=SET_CURRENCY
CASHIER_LOGGER=stack
```

## Configure FACEBOOK 

Set your Facebook App  in .env file

```bash
FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
FACEBOOK_REDIRECT=
```

## Configure GOOGLE 

Set your Google App  in .env file

```bash
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT=
```

## Create Migrations AND Admin Seeder

following this command to create migrations


```bash
php artisan migrate --seed
```


## Run Project


```bash
php artisan serve
```


