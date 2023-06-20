# Ticket support


## Features

- Public user can create/raise a ticket
- Public user will get an unique id along with link to check the status of ticket
- Public user can check status of the ticket by applying the unique id
- Supporters need to log into the system ti view the tickets
- Not answered tickets will highlighted
- Supporters can provide answers to tickets
- Once a ticket is being answered ,Specific user will get an update through email
- When setup the project run the seeders.By default there ara 100 tickets and 10 supporter account will create.

## Credentials for supporters
- Username : supporter1@test.com,supporter2@test.com,supporter3@test.com....supporter10@test.com
- password :password



## Tech stack

- Laravel - 10.13.5
- Livewire - 2.12.3
- rappasoft/laravel-livewire-tables - 2.14.0
- laracasts/flash - 3.2.2
- laravel/ui - 4.2.2
- Jquery
- Bootstrap

## Installation

Clone this project and navigate to the root folder of project
```sh
copy .env.example .env
```
update the .env credentials
```
composer install
php artisan key:generate
php artisan migrate:fresh --seed
npm istall
npm run dev/npm run build
php artisan serve
```
*Note - To load the asset files must need to run npm run dev/npm run build.


