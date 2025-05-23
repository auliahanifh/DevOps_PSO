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

use App\Http\Controllers\CartController;
Route::get('/', [CartController::class, 'index']);
Route::get('/add', 'App\Http\Controllers\CartController@add');
Route::post('/store', 'App\Http\Controllers\CartController@store');
Route::get('/edit/{kode}', 'App\Http\Controllers\CartController@edit');
Route::post('/update', 'App\Http\Controllers\CartController@update');
Route::get('/delete/{kode}','App\Http\Controllers\CartController@delete');
Route::get('/search','App\Http\Controllers\CartController@search');