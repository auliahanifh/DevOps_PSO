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
    return view('welcome');
});

Route::get('/cart', 'App\Http\Controllers\CartController@index');
Route::get('/cart/add', 'App\Http\Controllers\CartController@add');
Route::post('/cart/store', 'App\Http\Controllers\CartController@store');
Route::get('/cart/edit/{kode}', 'App\Http\Controllers\CartController@edit');
Route::post('/cart/update', 'App\Http\Controllers\CartController@update');
Route::get('/cart/delete/{kode}','App\Http\Controllers\CartController@delete');
Route::get('/cart/search','App\Http\Controllers\CartController@search');