<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\PaymentController;

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
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);

//Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::get('/clients',[ClientController::class,'getAll']);
    Route::post('/clients',[ClientController::class,'store']);
    Route::get('/payments',[PaymentController::class,'getByClientId']);
    Route::post('/payments',[PaymentController::class,'store']);
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});