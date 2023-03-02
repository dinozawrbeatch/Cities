<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Welcome'], function () {
    Route::get('/', 'IndexController')->name('welcome');
});

Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
    Route::get('/', 'IndexController')->name('user.index');
});

Route::group(['namespace' => 'City', 'prefix' => 'cities'], function () {
    Route::get('/', 'IndexController')->name('city.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
