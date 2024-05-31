<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::delete('/logout', 'logout')->name('logout');
    Route::post('/', 'login')->name('authenticate');
});

Route::resource('posts', PostController::class)->middleware('auth');
