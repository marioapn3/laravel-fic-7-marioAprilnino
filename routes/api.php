<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CallbackController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);


Route::controller(AuthController::class)->group(function () {
    Route::post('/login',  'login');
    Route::post('/register', 'register');

    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});

Route::post('image/upload', [UploadController::class, 'uploadImage',]);
Route::post('image/upload-multiple', [UploadController::class, 'uploadMultipleImage',]);


//orders

Route::post('oders', [OrderController::class, 'order'])->middleware('auth:sanctum');


Route::post('midtrans/notification/handling', [CallbackController::class, 'receive']);
