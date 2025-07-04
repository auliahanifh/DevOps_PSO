<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PassResetController;
use Ensi\LaravelPrometheus\Controllers\MetricsController;
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
Route::get('/register', [SessionController::class, 'registerForm'])
    ->name('registerForm')
    ->middleware('guest');
Route::post('/register', [SessionController::class, 'register'])
    ->name('register')
    ->middleware('guest');

Route::get('/', [SessionController::class, 'index'])->name('index');
Route::post('/login', [SessionController::class, 'login'])->name('login');
Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

//Sebelum login
Route::get('/forgot-password', [PassResetController::class, 'showForgotForm'])
    ->middleware('guest')
    ->name('password.request');
Route::post('/forgot-password', [PassResetController::class, 'sendResetLinkEmail'])
    ->middleware('guest')
    ->name('password.email');
Route::get('/reset-password/{token}', [PassResetController::class, 'showResetForm'])
    ->middleware('guest')
    ->name('password.reset');
Route::post('/reset-password', [PassResetController::class, 'resetPassword'])
    ->middleware('guest')
    ->name('password.update');

//Setelah login
Route::get('/change-password', [PassResetController::class, 'showChangePasswordForm'])
    ->middleware('auth')
    ->name('password.change');
Route::post('/change-password', [PassResetController::class, 'changePassword'])
    ->middleware('auth')
    ->name('password.change.post');

Route::get('/setting', function () {
    return view('page.setting');
})->name('setting')->middleware('auth');

Route::delete('/account/delete', [SessionController::class, 'deleteAccount'])->name('account.delete')->middleware('auth');

Route::get('/add', 'App\Http\Controllers\CartController@add');
Route::post('/store', 'App\Http\Controllers\CartController@store');
Route::get('/edit/{kode}', 'App\Http\Controllers\CartController@edit');
Route::post('/update', 'App\Http\Controllers\CartController@update');
Route::get('/delete/{kode}','App\Http\Controllers\CartController@delete');
Route::get('/search','App\Http\Controllers\CartController@search');

Route::get('/metrics', MetricsController::class) ->name('metrics');