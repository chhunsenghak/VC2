<?php

use App\Http\Controllers\Admin\CommuneController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\VillageController;
use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\Auth\FrontuserController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StockTypeController;
use App\Http\Controllers\API\FrontUserController as UserController;
use App\Http\Controllers\API\ChatController as ChatController;
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
Route::post("/forgot/password", [AuthController::class, 'forgotPassword']);
Route::post("/reset/password", [AuthController::class, 'resetPassword']);

Route::prefix('/user')->middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/update', [FrontuserController::class, 'updateInformationUser']);
    Route::post('/update/profile', [FrontuserController::class, 'updateProfileUser']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/list', [UserController::class, 'index']);
    Route::put('/create/shop', [UserController::class,'edit']);
});

Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');

Route::prefix('/post')->middleware('auth:sanctum')->group(function () {
    Route::get('/list', [PostController::class, 'index']);
    Route::get('/show/{id}', [PostController::class, 'show']);
});

// PROVINCE ROUTES
Route::prefix('provinces')->group(function () {
    Route::get('/list', [ProvinceController::class, 'index']);
    Route::post('/create', [ProvinceController::class, 'store']);
    Route::get('/show/{id}', [ProvinceController::class, 'show']);
    Route::put('/update/{id}', [ProvinceController::class, 'update']);
    Route::delete('/delete/{id}', [ProvinceController::class, 'destroy']);
});

// DISTRICT ROUTES
Route::prefix('districts')->group(function () {
    Route::get('/list', [DistrictController::class, 'index']);
    Route::post('/create', [DistrictController::class, 'store']);
    Route::get('/show/{id}', [DistrictController::class, 'show']);
    Route::put('/update/{id}', [DistrictController::class, 'update']);
    Route::delete('/delete/{id}', [DistrictController::class, 'destroy']);
});

// COMMUNE ROUTES
Route::prefix('commune')->group(function () {
    Route::get('/list', [CommuneController::class, 'index']);
    Route::post('/create', [CommuneController::class, 'store']);
    Route::get('/show/{id}', [CommuneController::class, 'show']);
    Route::put('/update/{id}', [CommuneController::class, 'update']);
    Route::delete('/delete/{id}', [CommuneController::class, 'destroy']);
});

// VILLAGE ROUTES
Route::prefix('village')->group(function () {
    Route::get('/list', [VillageController::class, 'index']);
    Route::post('/create', [VillageController::class, 'store']);
    Route::get('/show/{id}', [VillageController::class, 'show']);
    Route::put('/update/{id}', [VillageController::class, 'update']);
    Route::delete('/delete/{id}', [VillageController::class, 'destroy']);
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
    Route::get('/sorted-products', [ProductController::class, 'sortedProducts']);
    Route::get('/list-name-products', [ProductController::class, 'listNameProducts']);
    Route::get('/sorted-products-price', [ProductController::class, 'sortedProductsPrice']);
    Route::get('/list-price-products', [ProductController::class, 'listPriceProducts']);
    Route::get('/list', [ProductController::class, 'index']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::get('/show/{id}', [ProductController::class, 'show']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
    Route::get("/user/list/{id}", [ProductController::class, 'listProduct']);
});

//ADDRESS ROUTES
Route::prefix('addresses')->group(function () {
    Route::get('/list', [AddressController::class, 'index']);
    Route::post('/create', [AddressController::class, 'store']);
    Route::get('/show/{id}', [AddressController::class, 'show']);
    Route::put('/update/{id}', [AddressController::class, 'update']);
    Route::delete('/delete/{id}', [AddressController::class, 'destroy']);
});

// STocks ROUTES
Route::prefix('stocks')->group(function () {
    Route::get('/list', [StockTypeController::class, 'index']);
});

Route::prefix("chat")->middleware('auth:sanctum')->group(function () {
    Route::get("/message", [ChatController::class, 'index']);
    Route::get("/getUser", [ChatController::class, 'getUser']);
    Route::get("/recieveMessage/{id}", [ChatController::class, 'recieverMessage']);
    Route::get("/getConversation/{receiver_id}", [ChatController::class, 'getConversation']);
    Route::post("/sendText", [ChatController::class, 'sendTextMessage']);
    Route::post("/sendImage/{receiver_id}", [ChatController::class, 'uploadMultipleImages']);
    Route::put("/edit/text/{id}", [ChatController::class, 'editText']);
    Route::delete("/remove/message/{id}", [ChatController::class, 'deleteTextMessage']);
    Route::delete("/remove/all/messages/{id}", [ChatController::class, 'removeAllConversations']);
    Route::delete("/remove/user/{id}", [ChatController::class, 'removeChatUser']);
});
//Update Bio Route
Route::middleware('auth:sanctum')->group(function () {
    Route::put('/update-bio', [AuthController::class, 'updateBio']);
    Route::put('/update-phoneNumber', [AuthController::class, 'updatePhoneNumber']);
    Route::post('/update-profile', [AuthController::class, 'updateProfilePicture']);
});
