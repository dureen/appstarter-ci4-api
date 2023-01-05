# CodeIgniter 4 REST API - Example 

## What is this?

This is CodeIgniter 4 REST API example project

### Routes
```
$routes->group('api/v1', static function ($routes) {
    $routes->resource('product', ['controller' => 'ProductController']);
});
```
Contains:
| Method | Route                    | Handler                                       | Description        |
| ------ | ------------------------ | --------------------------------------------- | ------------------ |
| GET    | /                        | \App\Controllers\Home::index                  | -                  |
| GET    | api/v1/product           | \App\Controllers\ProductController::index     | List of product    |
| GET    | api/v1/product/new       | \App\Controllers\ProductController::new       | -                  |
| GET    | api/v1/product/(.*)/edit | \App\Controllers\ProductController::edit/$1   | -                  |
| GET    | api/v1/product/(.*)      | \App\Controllers\ProductController::show/$1   | View a product     |
| POST   | api/v1/product           | \App\Controllers\ProductController::create    | Create new product |
| PATCH  | api/v1/product/(.*)      | \App\Controllers\ProductController::update/$1 | -                  |
| PUT    | api/v1/product/(.*)      | \App\Controllers\ProductController::update/$1 | Update a product   |
| DELETE | api/v1/product/(.*)      | \App\Controllers\ProductController::delete/$1 | Delete a product   |
| CLI    | ci(.*)                   | \CodeIgniter\CLI\CommandRunner::index/$1      | -                  |



## Installation, updates, and more setup

Please read the original codeIgniter 4 [README](README-Origin.md)



## Buy Me a Coffee
Click [here](https://ko-fi.com/sandw)

## Happy Coding!

## License
[MIT](LICENSE)