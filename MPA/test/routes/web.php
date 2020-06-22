<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'ProductController@show',
    'as' => 'home.products'
]);

Route::get('/categories', 'CategoryController@show');

Route::get('/categories/{id}', 'CategoryController@showItems');


Route::get('/product', 'ProductController@show');

Route::get('/products/{id}', 'ProductController@showProducts');

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/increase-by-one/{id}', [
    'uses' => 'ProductController@getIncreaseByOne',
    'as' => 'product.increaseByOne'
]);

Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);


Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout'
]);

Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout'
]);


Route::get('/register', [
    'uses' => 'UserController@getRegister',
    'as' => 'user.register'
]);

Route::post('/register', [
    'uses' => 'UserController@postRegister',
    'as' => 'user.register'
]);

Route::get('/login', [
    'uses' => 'UserController@getLogin',
    'as' => 'user.login'
]);

Route::post('/login', [
    'uses' => 'UserController@postLogin',
    'as' => 'user.login'
]);

Route::get('/profile', [
    'uses' => 'UserController@getProfile',
    'as' => 'user.profile'
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout'
]);