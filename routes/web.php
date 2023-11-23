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

$router->get('/hello-lumen', function () use ($router){
    return "<h1>Lumen</h1><p>Hi good developer, thank for using Lumen</p>";
});

$router->get('/welcome', function () {
    return "<h1>Selamat Datang di Web</h1><p>Mari belajar Lumen.</p>";
});

$router->get('/welcome/{name}', function ($name) {
    return "<h1>Selamat Datang $name</h1><p>Mari belajar Lumen.</p>";
});

$router->get('/hallo/{name}', function ($name) {
    return "<h1>HAllO!!  $name</h1><p>Kita akan memulai pembelajaran</p>";
});

$router->get('/start/{name}', function ($name) {
    return "<h1>Get Started  $name</h1><p>Mari Kita Mulai ya teman teman</p>";
});

$router->get('/tugas', ['middleware' => 'login', function(){
    return "<h1>Hallo Jumpa Lagi kita</h1>";
}]);

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

//comments
$router->get('comments', 'CommentsController@index');
$router->post('comments', 'CommentsController@store');
$router->get('comments/{id}', 'CommentsController@show');
$router->put('comments/{id}', 'CommentsController@update');
$router->delete('comments/{id}', 'CommentsController@destroy');

//categories
$router->get('categories', 'CategoriesController@index');
$router->post('categories', 'CategoriesController@store');
$router->get('categories/{id}', 'CategoriesController@show');
$router->put('categories/{id}', 'CategoriesController@update');
$router->delete('categories/{id}', 'CategoriesController@destroy');