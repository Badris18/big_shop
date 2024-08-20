<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\v2\CategoryController;
use App\Http\Controllers\api\v2\BrandController;
use App\Http\Controllers\api\v2\ProductController;
use App\Http\Controllers\api\v2\CartController;
use App\Http\Controllers\api\v2\OrderController;
use App\Http\Controllers\api\v2\OrderItemController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/categories', [CategoryController::class,'index']);

Route::get('/brands', [BrandController::class,'index']);

Route::get('/products', [ProductController::class,'index']);

Route::get('/carts', [CartController::class,'index']);

Route::get('/orders', [OrderController::class,'index']);

Route::get('/order_items', [OrderItemController::class,'index']);