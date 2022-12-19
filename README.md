# CodeIgniter 4 REST API - Sample 

## What is this?

This is CodeIgniter 4 REST API sample project

### Routes

| Method | Route                    | Handler                                       | Before Filters | After Filters |
| ------ | ------------------------ | --------------------------------------------- | -------------- | ------------- |
| GET    | /                        | \App\Controllers\Home::index                  |                | toolbar       |
| GET    | api/v1/product           | \App\Controllers\ProductController::index     |                | toolbar       |
| GET    | api/v1/product/new       | \App\Controllers\ProductController::new       |                | toolbar       |
| GET    | api/v1/product/(.*)/edit | \App\Controllers\ProductController::edit/$1   |                | toolbar       |
| GET    | api/v1/product/(.*)      | \App\Controllers\ProductController::show/$1   |                | toolbar       |
| POST   | api/v1/product           | \App\Controllers\ProductController::create    |                | toolbar       |
| PATCH  | api/v1/product/(.*)      | \App\Controllers\ProductController::update/$1 |                | toolbar       |
| PUT    | api/v1/product/(.*)      | \App\Controllers\ProductController::update/$1 |                | toolbar       |
| DELETE | api/v1/product/(.*)      | \App\Controllers\ProductController::delete/$1 |                | toolbar       |
| CLI    | ci(.*)                   | \CodeIgniter\CLI\CommandRunner::index/$1      |                |               |



## Installation, updates, and more setup

Please read the original codeIgniter 4 [Click here](README-Origin.md)

## License
[MIT](LICENSE) ?

## Happy Coding!
