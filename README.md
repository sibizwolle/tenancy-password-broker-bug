### Laravel Tenancy Password Broker Bug

This repository aims to provide the minimum setup required to reproduce a bug in tenancy.

## Setup

- After clone, copy over `.env.example` to   `.env`
- create a database for this project and use int in the .env
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan horizon`
- `php artisan tenants:create:dummy` ## this should be running on the queue and succeed
- `php artisan tenants:create:dummy` ## this should also run on the queue, but fail

The error that is given when visiting the failed jobs page in horizon looks something like this:
`Call to a member function prepare() on null`

It looks like there is no PDO set on `/vendor/laravel/framework/src/Illuminate/Database/Connection.php(414)`
