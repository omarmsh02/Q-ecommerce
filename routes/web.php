<?php

require_once __DIR__ . '/config/Router.php';
require_once __DIR__ . '/controllers/ProductController.php';
require_once __DIR__ . '/controllers/UserController.php';


$router = new Router();


//$router->get('/', function(){
//    return view('home');
//}, 'home');

//users routes
$router->get('/users', 'UserController@index', 'user.list');

$router->get('/users/create', 'UserController@create', 'user.create');
$router->post('/users/create', 'UserController@store', 'user.store');

$router->get('/users/{id}/edit', 'UserController@edit', 'user.edit');
$router->put('/users/{id}/edit', 'UserController@update', 'user.update');

$router->delete('/users/{id}', 'UserController@destroy', 'user.destroy');
$router->get('/users/{id}', 'UserController@show', 'user.show');

//products routes
$router->get('/products', 'ProductController@index', 'product.index');

$router->get('/products/create', 'ProductController@create', 'product.create');
$router->post('/products/create', 'ProductController@store', 'product.store');

$router->get('/products/{id}', 'ProductController@show', 'product.show');



$router->dispatch();








