<?php

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


//user routes

use App\Http\Controllers\AdminProductsController;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/products', 'ProductsController@index')->name("products");
Route::get('/products/{id}', 'ProductsController@show');
//admin routes
Route::get('/admin/', 'AdminProductsController@index')->name('adminHome');
Route::get('/admin/create', 'AdminProductsController@create');
Route::post('/admin/store', 'AdminProductsController@store')->name('newProduct');
Route::delete('/admin/product/{id}', 'AdminProductsController@destroy');
Route::get('/admin/{id}/edit', 'AdminProductsController@edit');
Route::put('/admin/product/{id}', 'AdminProductsController@update');