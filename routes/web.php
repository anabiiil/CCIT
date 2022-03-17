<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\SubscriptionController;

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



Route::get('/subscription',[SubscriptionController::class, 'index'])->name('subscription');

Auth::routes();

Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');


Route::post('/pay-now', [SubscriptionController::class, 'pay_now'])->middleware('auth')->name('pay-now');


Route::get('auth/{type}', [SocialController::class, 'login_with_social']);

Route::get('auth/{type}/callback', [SocialController::class, 'login_callback']);

Route::middleware(['auth','membership'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', [HomeController::class, 'index'])->name('home');

});
