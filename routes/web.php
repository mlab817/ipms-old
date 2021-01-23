<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\SocialLoginController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/{provider}', [SocialLoginController::class, 'redirectToProvider'])->name('auth.redirectToProvider');
Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback'])->name('auth.handleProviderCallback');

Route::resource('chart', \App\Http\Controllers\ChartController::class);
