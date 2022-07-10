<?php

use App\Http\Controllers\WalletController;
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
Route::post('auth/login-api' , [\App\Http\Controllers\AuthController::class , 'loginApi']);

Route::group(['middleware' => 'auth:sanctum'] , function (){
    Route::get('user/chart-data' , [\App\Http\Controllers\UserController::class , 'chartsData'])->name('user.chartData');
});
