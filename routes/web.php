<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => 'false']);

Route::middleware(['auth'])->group(function () {
    Route::view('home', 'home')->name('home');
    Route::resource('hospital', HospitalController::class);
    Route::post('/hospital/{slug}/changeStatus', [HospitalController::class, 'changeStatus'])->name('hospital.changeStatus');
    Route::resource('ticket', TicketController::class);
    Route::resource('user', UserController::class);
});
