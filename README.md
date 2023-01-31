### Laravel Tenancy Password Broker Bug

This repository aims to provide the minimum setup required to reproduce a bug in tenancy.

## Setup

- After clone, copy over `.env.example` to   `.env`
- `composer install`
- create a database for this project and use it in the .env

Run the following commands:

- `php artisan key:generate`
- `php artisan migrate`
- `php artisan horizon`

Open another terminal window and run the following commands:

- `php artisan tenants:create:dummy` ## this should be running on the queue and succeed
- `php artisan tenants:create:dummy` ## this should also run on the queue, but fail

The `tenants:create:dummy` command will create a dummy tenant trough the queue. When the tenant is finished, the `CreateDummyUser` job will create a dummy user and send an reset password notification, using the Password facade. The fist time this runs on the queue, its successful. But the second time it gives the error: `Call to a member function prepare() on null`

It looks like there is no PDO set on `/vendor/laravel/framework/src/Illuminate/Database/Connection.php(414)`
