<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('home');
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])
        ->name('login');

    Route::get('/register', [RegisterController::class, 'index'])
        ->name('register');
});
