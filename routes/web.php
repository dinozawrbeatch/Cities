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
    Route::post('/', 'StoreController')->name('user.store');
    Route::get('/{user}', 'ShowController')->name('user.show');
});

Route::group(['namespace' => 'City', 'prefix' => 'cities'], function () {
    Route::get('/', 'IndexController')->name('city.index');
    Route::get('/{city}', 'ShowController')->name('city.show');

    Route::group(['namespace' => 'Review', 'prefix' => 'reviews'], function () {
        Route::get('/{city}', 'IndexController')->name('city.reviews.index');
    });
});

Route::group(['namespace' => 'Review', 'prefix' => 'reviews'], function () {
    Route::post('/', 'StoreController')->name('review.store');
    Route::put('/{review}', 'UpdateController')->name('review.update');
    Route::get('/{review}/edit', 'EditController')->name('review.edit');
    Route::delete('/{review}', 'DeleteController')->name('review.delete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
