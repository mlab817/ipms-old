<?php

/**
 * ADMIN routes
 *
 *
 */

Route::get('', \App\Http\Controllers\Admin\AdminController::class)->name('index');

Route::put('/labels', \App\Http\Controllers\CreateLabelController::class)->name('create-label');

Route::resources([
    'announcements'         => \App\Http\Controllers\AnnouncementController::class,
    'links'                 => \App\Http\Controllers\Admin\LinkController::class,
    'offices'               => \App\Http\Controllers\Admin\OfficeController::class,
    'operating_units'       => \App\Http\Controllers\Admin\OperatingUnitController::class,
    'operating_unit_types'  => \App\Http\Controllers\Admin\OperatingUnitTypeController::class,
//        'permissions'           => \App\Http\Controllers\Admin\PermissionController::class,
    'roles'                 => \App\Http\Controllers\Admin\RoleController::class,
    'users'                 => \App\Http\Controllers\Admin\UserController::class,
    'teams'                 => \App\Http\Controllers\Admin\TeamController::class,
]);

Route::resource('permissions',\App\Http\Controllers\Admin\PermissionController::class)->except('create','show');
