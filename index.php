<?php

require_once __DIR__.'/helpers/functions.php';
require_once __DIR__ . '/config/Router.php';
////////////////////////////////////
require_once __DIR__ . '/controllers/AdminControllers/AdminController.php';
require_once __DIR__ . '/controllers/AdminControllers/ProductController.php';
require_once __DIR__ . '/controllers/AdminControllers/UsersController.php';
require_once __DIR__ . '/controllers/AdminControllers/OrderController.php';
require_once __DIR__ . '/controllers/AdminControllers/AdminsController.php';
require_once __DIR__ . '/controllers/AdminControllers/CategoryController.php';
//////////////////////////////////
require_once __DIR__ . '/controllers/PublicControllers/UserController.php';
require_once __DIR__ . '/controllers/PublicControllers/HomeController.php';
require_once __DIR__ . '/controllers/PublicControllers/ShopController.php';
require_once __DIR__ . '/controllers/PublicControllers/WishlistController.php';
require_once __DIR__ . '/controllers/PublicControllers/CartController.php';
require_once __DIR__ . '/controllers/PublicControllers/SearchController.php';
require_once __DIR__ . '/controllers/PublicControllers/HistoryController.php';

$router = new Router();


//Admin View Routes
//auth routes
$router->get('/admin', 'AdminController@login', 'admin.login');
$router->post('/admin/login', 'AdminController@authenticate', 'admin.authenticate');
$router->post('/admin-logout', 'AdminController@adminLogout', 'admin.logout');
//Manage Users Routes
$router->get('/users', 'UsersController@index', 'user.list');
$router->get('/users/create', 'UsersController@create', 'user.create');
$router->post('/users/create', 'UsersController@store', 'user.store');
$router->get('/users/{id}/edit', 'UsersController@edit');
$router->put('/users/{id}/edit', 'UsersController@update');
$router->delete('/users/{id}', 'UsersController@destroy', 'user.destroy');
$router->get('/users/{id}', 'UsersController@show', 'user.show');

//Manage Products Routes
$router->get('/products', 'ProductController@index', 'product.index');
$router->get('/products/create', 'ProductController@create', 'product.create');
$router->post('/products/create', 'ProductController@store', 'product.store');
$router->get('/products/{id}/edit', 'ProductController@edit', 'product.edit');
$router->put('/products/{id}/edit', 'ProductController@update', 'product.update');
$router->delete('/products/{id}', 'ProductController@destroy', 'product.destroy');
$router->get('/products/{id}', 'ProductController@show', 'product.show');

//Manage Orders Routes
$router->get('/orders', 'OrderController@index', 'order.index');
$router->get('/orders/{id}/edit', 'OrderController@edit', 'order.edit');
$router->put('/orders/{id}/edit', 'OrderController@update', 'order.update');
$router->delete('/orders/{id}', 'OrderController@destroy', 'order.destroy');

//Manage Categories Routes

$router->get('/categories', 'CategoryController@index', 'category.index');
$router->get('/categories/create', 'CategoryController@create', 'category.create');
$router->post('/categories/create', 'CategoryController@store', 'category.store');
$router->get('/categories/{id}/edit', 'CategoryController@edit', 'category.edit');
$router->put('/categories/{id}/edit', 'CategoryController@update', 'category.update');
$router->delete('/categories/{id}', 'CategoryController@destroy', 'category.destroy');

//Manage Admins Routes
$router->get('/admins', 'AdminsController@index', 'admins.list');
$router->get('/admins/create', 'AdminsController@create', 'admins.create');
$router->post('/admins/create', 'AdminsController@store', 'admins.store');
$router->get('/admins/{id}/edit', 'AdminsController@edit', 'admins.edit');
$router->put('/admins/{id}/edit', 'AdminsController@update', 'admins.update');
$router->delete('/admins/{id}', 'AdminsController@destroy', 'admins.destroy');

//////////////////////////////////////////////

// Public Views Routes
//user routes
$router->get('/user', 'UserController@index');
$router->post('/user/store', 'UserController@store');
$router->post('/user/login', 'UserController@login');
$router->post('/user-logout', 'UserController@userLogout', 'user.logout');

//shop products routes(Shop Page)
$router->get('/shop', 'ShopController@index');
$router->get('/shop/{id}', 'ShopController@show', 'product.show');
$router->post('/shop/{id}','ShopController@categorized');
$router->post('/shop-search', 'SearchController@search');

///home page routes (Landing Page)
$router->get('/home', 'HomeController@index', 'home.index');
$router->get('/home/{id}', 'HomeController@show', 'home.show');
//Wishlist
$router->post('/add-wishlist-item', 'WishlistController@addToWishlist', 'wishlist.store');
$router->get('/wishlist', 'WishlistController@showWishlist');
$router->delete('/remove-item/{id}', 'WishlistController@destroy');
// Purchase History Routes
// Profile Management
$router->get('/user/profile', 'UserController@viewProfile', 'user.profile');
$router->get('/user/{id}/edit', 'UserController@edit', 'user.edit');
$router->put('/user/{id}/update', 'UserController@update', 'user.update');
$router->put('/user/{id}/update-security', 'UserController@updateSecurity', 'user.update-security');

// Security Settings Routes
$router->get('/user/{id}/security', 'UserController@editSecurity', 'user.security');
$router->put('/user/{id}/update-security', 'UserController@updateSecurity', 'user.update-security');
// Cart Routes
$router->post('/addToCart','CartController@addToCart');
$router->get('/cart', 'CartController@index', 'cart.index');
$router->post('/cart-item-increase','CartController@increase');
$router->post('/cart-item-decrease','CartController@decrease');
$router->post('/checkout','CartController@checkout');
$router->get('/user/purchaseHistory', 'HistoryController@showHistory'); 

/////////////Dispatch
$router->dispatch();