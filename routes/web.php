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

Route::get('/', 'HomeController@home');
Route::get('/categories', 'CategoryController@categories');
Route::get('/category/{id}', 'CategoryController@category_page')->where('id', '[0-9]+');
Route::get('/page/{url}', 'PageController@page')->where('url', '[a-z]+');
Route::get('/product/{id}', 'ProductController@show')->where('id', '[0-9]+');
