## Mia Share Assignment (Laravel8 todo list app)

Create a to-do list Laravel application (version 7.x/8.x) with the following functionality:

## Task Explaination

* User authentication and authorization
Two roles: user and administrator
Administrator has full permissions
* User can only create and delete their own to-do items
* Users can create a to-do list
* Users can mark to-do items as done
* Users can delete to-do items
* Administrators can see all users to-do items, including deleted to-do items

## How to Run

1. Clone source repository from GitHub
```
git clone git@github.com:jack9015/miashare_todo.git

cd miashare_todo
```

2. Copy `.env.example` to `.env` and make propriate changes
* Create MySQL Database with name `todo` or change [DB_DATABASE] field in `.env`
* Update [DB_USERNAME] and [DB_PASSWORD] according to the DB

3. Install Laravel environment and Run the app
```
composer install

php artisan migrate

php artisan db:seed

php artisan key:generate

php artisan serve
```

4. Make tests with following user permissions

admin user = admin@miashare.com
pass = test1234

normal user = user@miashare.com
pass = test1234