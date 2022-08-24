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


Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::resource('home','HomeController');

Route::resource('product','ProductController');
Route::get('/product', 'ProductController@index')->name('product.index');

Route::Get('sales/clean', 'StorageController@clean')->name('sales/clean');

Route::resource('storage','StorageController');
Route::get('/storage', 'StorageController@index')->name('storage.index');
Route::get('/storage.create', 'StorageController@create')->name('storage.create');
Route::get('storage/{storage}/edit','StorageController@edit')->name('storage.edit')->middleware('auth');;

Route::Get('/sales', 'SalesController@index')->name('sales.index');
Route::Get('/sales/productByCategory/{id}', 'StorageController@byCategory');
Route::Get('/sales.store', 'SalesController@store')->name('sales.store');
Route::Get('/sales/{id}', 'SalesController@order')->name('sales.order');
Route::resource('sales','SalesController');
Route::get('sales/{id}/edit','SalesController@edit')->name('sales.edit');

Route::resource('category','CategoryController');
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::get('category/{category}/edit','CategoryController@edit')->name('category.edit');
Route::get('/category.create', 'CategoryController@create')->name('category.create');

Route::resource('client','ClientController');
Route::get('/client', 'ClientController@store')->name('client.index');
//Route::get('/client.update', 'ClientController@update')->name('client.update');

