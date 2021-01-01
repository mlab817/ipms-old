<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\UserController;

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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function($router) {
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('api.authenticate');
    Route::post('register', [AuthController::class, 'register'])->name('api.register');
    Route::get('me', [AuthController::class, 'me'])->name('api.me');
    Route::get('logout', [AuthController::class, 'logout'])->name('api.logout');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UserController::class, 'index'])->name('api.users.index');
Route::get('users/{id}', [UserController::class, 'show'])->name('api.users.show');
Route::put('users/{id}', [UserController::class, 'update'])->name('api.users.update');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('api.users.destroy');
Route::post('users', [UserController::class, 'store'])->name('api.users.store');

Route::group(['prefix' => 'projects'], function($router) {
    Route::get('/', [ProjectController::class,'index'])->name('api.projects.index');
    Route::post('/', [ProjectController::class,'store'])->name('api.projects.store');
    Route::get('/{slug}', [ProjectController::class,'show'])->name('api.projects.show');
    Route::put('/{slug}', [ProjectController::class,'update'])->name('api.projects.update');
    Route::delete('/{slug}', [ProjectController::class,'destroy'])->name('api.projects.delete');
});
