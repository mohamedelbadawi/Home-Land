# HOMELAND.

It's laravel app to sell or rent buildings using Repository design pattern.
### Tools and technologies
- laravel, Html, css, js .


Clone the repository

    git clone https://github.com/mohamedelbadawi/Home-Land.git

Switch to the repo folder

    cd Home-Land


Install all the dependencies using composer

    composer install
    composer update

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    
## to launch the server
```bash
php artisan serve
```
The  project is now up and running! Access it at http://localhost:8000.

