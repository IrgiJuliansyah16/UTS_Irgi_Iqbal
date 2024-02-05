<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//posts
$router->get('posts', 'PostsController@index');
$router->post('/posts', 'PostsController@store');
$router->get('/post/{id}', 'PostsController@show');
$router->put('/post/{id}', 'PostsController@update');
$router->delete('/post/{id}', 'PostsController@destroy');

//users
$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
$router->get('users/{id}', 'UsersController@show');
$router->put('users/{id}', 'UsersController@update');
$router->delete('users/{id}', 'UsersController@destroy');

//tags
$router->get('tags', 'TagsController@index');
$router->post('tags', 'TagsController@store');
$router->get('tags/{id}', 'TagsController@show');
$router->put('tags/{id}', 'TagsController@update');
$router->delete('tags/{id}', 'TagsController@destroy');

//categories
$router->get('categories', 'CategoriesController@index');
$router->post('categories', 'CategoriesController@store');
$router->get('categories/{id}', 'CategoriesController@show');
$router->put('categories/{id}', 'CategoriesController@update');
$router->delete('categories/{id}', 'CategoriesController@destroy');

//produk
$router->get('produks', 'ProduksController@index');
$router->post('produks', 'ProduksController@store');
$router->get('produks/{id}', 'ProduksController@show');
$router->put('produks/{id}', 'ProduksController@update');
$router->delete('produks/{id}', 'ProduksController@destroy');

//pesanans
$router->get('orders', 'OrdersController@index');
$router->get('orders/{id}', 'OrdersController@show');
$router->post('orders', 'OrdersController@store');
$router->put('orders/{id}', 'OrdersController@update');
$router->delete('orders/{id}', 'OrdersController@destroy');

//payments
Route::get('payments', 'PaymentsController@index');
Route::get('payments/{id}', 'PaymentsController@show');
Route::post('payments', 'PaymentsController@store');
Route::put('payments/{id}', 'PaymentsController@update');
Route::delete('payments/{id}', 'PaymentsController@destroy');

$router->group(['prefix' => 'auth'], function () use ($router){
    $router->post('/register','AuthController@register');
    $router->post('/login','AuthController@login');
});

$router->group(['middleware' => 'auth'], function () use ($router) {
    // Orders
    $router->get('orders', 'OrdersController@index');
    $router->get('orders/{id}', 'OrdersController@show');
    $router->post('orders', 'OrdersController@store');
    $router->put('orders/{id}', 'OrdersController@update');
    $router->delete('orders/{id}', 'OrdersController@destroy');

    // Payments
    $router->get('payments', 'PaymentsController@index');
    $router->get('payments/{id}', 'PaymentsController@show');
    $router->post('payments', 'PaymentsController@store');
    $router->put('payments/{id}', 'PaymentsController@update');
    $router->delete('payments/{id}', 'PaymentsController@destroy');
});