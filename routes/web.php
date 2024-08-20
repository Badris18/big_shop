<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

use App\Http\Controllers\AuthController;

// Route::get('/login',[AuthController::class, 'login'])->name('home.login');
// Route::get('/forgot_password',[AuthController::class, 'forgot_password'])->name('home.forgot_password');
// Route::get('/register',[AuthController::class, 'register'])->name('home.register');



Route::get('/login',[AuthController::class, 'login'])->name('home.login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/profile',[AuthController::class, 'profile'])->name('home.profile');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register',[AuthController::class, 'register'])->name('home.register');
Route::post('/store', [AuthController::class, 'store'])->name('home.store');
Route::get('/forget_password',[AuthController::class, 'forget_password'])->name('home.forget_password');
