<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/', 'doLogin')->name('doLogin');
    Route::delete('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'doRegister')->name('doRegister');
});

Route::resource('posts', PostController::class)->middleware('auth');
