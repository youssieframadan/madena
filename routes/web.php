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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/results', function () {
    return view('results');
});

Route::get('/product', function () {
    return view('product.show');
});

Route::post('/results', 'ProductsController@search');

Route::get('login/facebook', 'LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'LoginController@handleProviderCallback');

Route::get('/categories','APIController@category');
Route::get('/category/{category_id}/types','APIController@type');

Route::post('/addproduct','ProductsController@store');
Route::delete('product/{id}/delete', 'ProductsController@destroy');
Route::get('product/{id}', 'ProductsController@show');
Route::post('product/{id}/likes', 'ProductsController@like');
Route::post('product/{id}/comments', 'ProductsController@comment');
Route::post('product/{id}/dislike', 'ProductsController@dislike');

Route::put('product/{id}/edit', 'ProductsController@update');
Route::get('productapi/{id}', 'ProductsController@productapi');


Route::post('/login','LoginController@store');
Route::post('/register','RegisterController@store');
Route::get('/logout','LoginController@destroy');




Route::get('/store/{store}', 'StoresController@show');

Route::post('/addstore','StoresController@store');

Route::post('/mystores','StoresController@userStores');

Route::get('/dashboard/{id}','DashboardController@index');


Route::get('/iamgesapi/{id}','ImagesController@imageapi');