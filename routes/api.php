<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\HospitalController;
use App\Http\Controllers\Api\UserController;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('profile')->group(function () {
            Route::get('/', 'profile');
            Route::post('/', 'update');
        });
        Route::post('/logout', 'logout');
    });

    Route::apiResource('hospital', HospitalController::class, ['only' => ['index', 'show']]);
});
