<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\SubscriptionsController;

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

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('subscription', [SubscriptionsController::class, 'subscription'])->name('subscription');
    Route::post('unsubscribe/{id}', [SubscriptionsController::class, 'unsubscribe'])->name('unsubscribe');
});
