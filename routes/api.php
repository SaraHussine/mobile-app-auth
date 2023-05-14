<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\api\auth\LoginController;
use App\Http\Controllers\user\api\auth\RegisterController;

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



    Route::post("user/login",[LoginController::class,'login']);
    Route::post("user/register",RegisterController::class);
    Route::get('user/logout/current-token',[LoginController::class,'logoutCurrentToken']);
    Route::get('user/logout/specific-token',[LoginController::class,'logoutSpecificToken']);
    Route::get('user/logout/all-tokens',[LoginController::class,'logoutAllTokens']);

