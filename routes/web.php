<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/' , [AuthController::class , 'index' ])->name('home');

Route::get('/logout' , [AuthController::class , 'logout'])->name('logout');


//Protected Routes
Route::group(['middleware' => 'auth'] , function (){
    Route::view('transactions','transactions.create')->name('transactions.create');
    Route::get('wallet' , [WalletController::class , 'show'])->name('wallet.show');
    Route::get('wallet/chart' , [WalletController::class , 'chart'])->name('wallet.chart');
    Route::get('referrals' , [UserController::class , 'referrals'])->name('user.referrals');
});

Route::group(['middleware' => ['auth' , 'admin']] , function (){
    Route::get('/admin' , [AdminController::class , 'index'])->name('admin.index');
});

Route::group(['middleware' => ['guest']] , function (){
    Route::get('/login' , [AuthController::class , 'loginPage'])->name('login');
    Route::post('/login' , [AuthController::class , 'login']);
    Route::get('/register' , [AuthController::class , 'registerPage'])->name('register');
    Route::get('/register/{referral?}' , [AuthController::class , 'registerPage'])->name('register_referral');
    Route::post('/register' , [AuthController::class , 'register']);
});
