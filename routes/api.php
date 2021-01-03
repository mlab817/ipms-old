<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleController;
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
Route::post('users/{id}/syncRoles', [UserController::class, 'syncRoles'])->name('api.users.syncRoles');
Route::post('users/{id}/syncPermissions', [UserController::class, 'syncPermissions'])->name('api.users.syncPermissions');
Route::put('users/{id}', [UserController::class, 'update'])->name('api.users.update');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('api.users.destroy');
Route::post('users', [UserController::class, 'store'])->name('api.users.store');

Route::group(['prefix' => 'projects'], function($router) {
    Route::get('/', [ProjectController::class,'index'])->name('api.projects.index');
    Route::post('/', [ProjectController::class,'store'])->name('api.projects.store');
    Route::get('/{project}', [ProjectController::class,'show'])->name('api.projects.show');
    Route::put('/{project}', [ProjectController::class,'update'])->name('api.projects.update');
    Route::delete('/{project}', [ProjectController::class,'destroy'])->name('api.projects.delete');
});

Route::group(['prefix' => 'permissions'], function($router) {
   Route::get('/', [PermissionController::class,'index'])->name('api.permissions.index');
   Route::post('/', [PermissionController::class,'store'])->name('api.permissions.store');
   Route::get('/{permission}', [PermissionController::class,'show'])->name('api.permissions.show');
   Route::put('/{permission}', [PermissionController::class,'update'])->name('api.permissions.update');
   Route::delete('/{permission}', [PermissionController::class,'destroy'])->name('api.permissions.destroy');
});

Route::group(['prefix' => 'roles'], function($router) {
    Route::get('/', [RoleController::class,'index'])->name('api.roles.index');
    Route::post('/', [RoleController::class,'store'])->name('api.roles.store');
    Route::get('/{name}', [RoleController::class,'show'])->name('api.roles.show');
    Route::put('/{name}', [RoleController::class,'update'])->name('api.roles.update');
    Route::delete('/{name}', [RoleController::class,'destroy'])->name('api.roles.destroy');
    Route::post('/{name}/syncPermissions', [RoleController::class,'syncPermissions'])->name('api.roles.syncPermissions');
});
