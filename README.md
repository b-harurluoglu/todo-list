
# Getting started

## Installation

Clone the repository

    git clone git@github.com:b-harurluoglu/todo-list.git

Switch to the repo folder

    cd todo-list

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

    cp source/.env.example source/.env

Build the project

    docker-compose up -d

Install all the dependencies using composer

    docker-compose exec app composer install

Generate a new application key

    docker-compose exec app php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    docker-compose exec app php artisan migrate

Run the databse seeder

    docker-compose exec app php artisan db:seed

Run Task import command

    docker-compose exec app php artisan task:get


You can now access the server at http://todolist.localhost/

----------
