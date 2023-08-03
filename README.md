## About the Project

This is a simple task manager application created in Laravel
This application requires PHP ^8.1

## Installation RUN the commands below in the terminal
- cd ~/path/to/the/directory/where/you/download/the/project
- cp .env.example .env
- composer install
- docker compose build
- docker compose ps -a (To see the list of containers started) 
- docker compose up -d
- docker exec -it Laravel_php /bin/sh
- php artisan migrate (to run migration files)
- Create your database
- Copy .env.example and rename it to .env
- Add the database configuration to the .env file
- Run the migrations (php artisan migrate)
- Copy the url:8000 (see how to use the application below)


## TO RUN PHPUNIT TEST
- cd ~/path/to/the/directory/where/you/download/the/project
- cp .env.example .env
- composer install
- docker compose build
- docker compose ps -a (To see the list of containers started)
- docker exec Laravel_php -it /bin/sh
- php artisan test


## HOW to use the application
- To view a specific tasks (GET request) .........http://0.0.0.0:8000/api/v1/tasks/id
- - To view all tasks (GET request)....................................................http://0.0.0.0:8000/api/v1/tasks
- To create task (POST request).......................................................http://0.0.0.0:8000/api/v1/tasks
- To edit a task (PUT request).......................................................http://0.0.0.0:8000/api/v1/tasks/id
- To delete a task (DELETE request) ........................http://0.0.0.0:8000/api/v1/tasks/id


