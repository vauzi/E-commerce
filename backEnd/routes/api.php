<?php

use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user-address', [UserAddressController::class, 'index']);
    Route::post('user-address', [UserAddressController::class, 'store']);
    Route::get('user-address/{id}', [UserAddressController::class, 'show']);
    Route::put('user-address/{id}', [UserAddressController::class, 'update']);
    Route::delete('user-address/{id}', [UserAddressController::class, 'destroy']);
});


Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('category/{category}', [ProductCategoryController::class, 'show']);
    Route::post('category', [ProductCategoryController::class, 'store']);
    Route::put('category/{category}', [ProductCategoryController::class, 'update']);
    Route::delete('category/{category}', [ProductCategoryController::class, 'destroy']);
});
Route::post('product', [ProductController::class, 'store']);

Route::get('category', [ProductCategoryController::class, 'index']);

Route::get('product', [ProductController::class, 'index']);
