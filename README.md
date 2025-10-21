# Laravel REST API
 
We do _not_ use default `SPA Authentication` https://laravel.com/docs/11.x/sanctum#spa-authentication
 
## Endpoints
 
| URL          | HTTP method | Auth | JSON Response       |
| ------------ | ----------- | ---- | --------------------|
| /user/login  | POST        |      | user's token        |
| /user        | GET         | Y    | all users           | 
| /movies      | GET         |      | all movies          |
| /movies      | POST        | Y    | new movies added    |
| /movies      | PATCH       | Y    | edited movies       |
| /movies      | DELETE      | Y    | id                  |
| /directors   | GET         |      | all directors       |
| /directors   | POST        | Y    | new directors added | 
| /directors   | PATCH       | Y    | edited directors    |
| /directors   | DELETE      | Y    | id                  |
| /studios     | GET         |      | all studios         |
| /studios     | POST        | Y    | new studios added   |
| /studios     | PATCH       | Y    | edited studios      |
| /studios     | DELETE      | Y    | id                  |
| /actors      | GET         |      | all actors          |
| /actors      | POST        | Y    | new actors added    |
| /actors      | PATCH       | Y    | edited actors       |
| /actors      | DELETE      | Y    | id                  |
| /categories  | GET         |      | all categories      |
| /categories  | POST        | Y    | new categories added|
| /categories  | PATCH       | Y    | edited categories   |
| /categories  | DELETE      | Y    | id                  |
 
## Steps
 
1. `composer create-project laravel/laravel laravel-rest-api`
2. `cd laravel-rest-api`
3. `php artisan serve`
4. Edit `.env`, set up mysql database
5. `php artisan install:api`
6. Change User seed && `php artisan db:seed`
7. `php artisan make:controller UsersController`
8. `php artisan make:migration create_products_table`
9. `php artisan migrate`
10. `php artisan make:controller ProductsController`
11. `php artisan make:request ProductRequest`
12. `php artisan config:publish cors`