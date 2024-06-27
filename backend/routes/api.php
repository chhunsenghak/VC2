<?php

use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\Auth\FrontuserController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::prefix('/user')->middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/update', [FrontuserController::class, 'updateInformationUser']);
    Route::post('/update/profile', [FrontuserController::class, 'updateProfileUser']);
    Route::post("/forgot/password", [AuthController::class, 'forgotPassword']);
    Route::post("/reset/password", [AuthController::class, 'resetPassword']);
});
Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');
Route::get('/post/list', [PostController::class, 'index'])->middleware('auth:sanctum');


// PROVINCE ROUTES
Route::prefix('provinces')->group(function () {
   Route::get('/list', [ProvinceController::class, 'index']); 
   Route::post('/create', [ProvinceController::class,'store']);
   Route::get('/show/{id}', [ProvinceController::class,'show']);
   Route::put('/update/{id}', [ProvinceController::class, 'update']);
   Route::delete('/delete/{id}', [ProvinceController::class, 'destroy']);
});



// CATEGORY ROUTES
Route::prefix('category')->group(function () {
    Route::get('/list', [CategoryController::class, 'index']);
    Route::post('/create', [CategoryController::class, 'store']);
    Route::get('/show/{id}', [CategoryController::class, 'show']);
    Route::put('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/delete/{id}', [CategoryController::class, 'destroy']);
});

// PRODUCTS ROUTES
Route::prefix('products')->group(function () {
    Route::get('/list', [ProductController::class, 'index']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::get('/show/{id}', [ProductController::class, 'show']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
});
