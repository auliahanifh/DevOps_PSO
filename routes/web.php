<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\CartController;
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
Route::get('/', [SessionController::class, 'index'])->name('index');
Route::post('/login', [SessionController::class, 'login'])->name('login');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

Route::get('/add', 'App\Http\Controllers\CartController@add');
Route::post('/store', 'App\Http\Controllers\CartController@store');
Route::get('/edit/{kode}', 'App\Http\Controllers\CartController@edit');
Route::post('/update', 'App\Http\Controllers\CartController@update');
Route::get('/delete/{kode}','App\Http\Controllers\CartController@delete');
Route::get('/search','App\Http\Controllers\CartController@search');