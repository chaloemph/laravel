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

Route::view('/test', 'home');

Route::get('/product/createvalidate', 'ProductController@createvalidate')->name('createvalidate');

Route::post('/validate','ProductController@validatecheck')->name('validate');



Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/loop', 'FirstController@loop');

Route::get('/script','FirstController@script' );

Route::get('/number/{id?}', 'FirstController@show');

Route::get('/555','FirstController@index' );

Route::get('/add', 'ProductController@insert');


Route::get('/product', 'ProductController@index')->name('product');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product/store', 'ProductController@store')->name('product.store');
Route::get('/product/{product}', 'ProductController@show')->name('product.show');
Route::put('/product/{id}', 'ProductController@update')->name('product.update');
Route::delete('/product/{id}', 'ProductController@destroy')->name('product.delete');;
Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');

Route::get('/customers', 'CustomerController@list')->name('customer');
Route::post('/customers/store', 'CustomerController@store')->name('customer.store');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
