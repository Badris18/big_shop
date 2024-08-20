<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\HomeController;



Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/privacy',[HomeController::class,'privacy'])->name('home.privacy');

Route::get('/cookie',[HomeController::class,'cookie'])->name('home.cookie');

Route::get('/login',[HomeController::class,'login'])->name('home.login');

Route::get('/register',[HomeController::class,'register'])->name('home.register');

Route::get('/forget_password',[HomeController::class,'forget_password'])->name('home.forget_password');

use App\Http\Controllers\InvoiceController;

Route::get('/invoice/generate-pdf/{id}', [InvoiceController::class, 'generateInvoicePdf'])->name('invoice.generate-pdf');
Route::get('/invoice/download-pdf/{id}', [InvoiceController::class, 'downloadInvoicePdf'])->name('invoice.download-pdf');
Route::get('/invoice/stream-pdf/{id}', [InvoiceController::class, 'streamInvoicePdf'])->name('invoice.stream-pdf');
Route::get('/invoice/send-email/{id}', [InvoiceController::class, 'sendInvoiceEmail'])->name('invoice.send-email');