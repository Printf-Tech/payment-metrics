<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

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

/*Route::middleware('auth:sanctum')->get('/userw', function (Request $request) {
    return $request->user();
});*/

Route::get('/user/{id?}', [UserController::class,'index']);
Route::post('/user/storage', [UserController::class,'storage']);

Route::get('/payment/{id?}', [PaymentController::class,'index']);
Route::post('/payment/storage', [PaymentController::class,'storage']);
