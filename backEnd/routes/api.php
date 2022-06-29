<?php

use App\Http\Controllers\UserAddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('useraddress', [UserAddressController::class, 'index']);
Route::post('useraddress', [UserAddressController::class, 'store']);
Route::get('useraddress/{id}', [UserAddressController::class, 'show']);
Route::put('useraddress/{id}', [UserAddressController::class, 'update']);
Route::delete('useraddress/{id}', [UserAddressController::class, 'destroy']);
