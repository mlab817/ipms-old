<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resources([
    'projects' => \App\Http\Controllers\ProjectController::class,
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::resources([
        'approval_levels'       => \App\Http\Controllers\ApprovalLevelController::class,
        'bases'                 =>  \App\Http\Controllers\BasisController::class,
        'cip_types'             =>  \App\Http\Controllers\CipTypeController::class,
        'fs_statuses'           => \App\Http\Controllers\FsStatusController::class,
        'funding_institutions'  =>  \App\Http\Controllers\FundingInstitutionController::class,
        'funding_sources'       => \App\Http\Controllers\FundingSourceController::class,
        'gads'                  => \App\Http\Controllers\GadController::class,
        'implementation_modes'  => \App\Http\Controllers\ImplementationModeController::class,
        'infrastructure_sectors'=> \App\Http\Controllers\InfrastructureSectorController::class,
        'operating_units'       => \App\Http\Controllers\OperatingUnitController::class,
        'operating_unit_types'  => \App\Http\Controllers\OperatingUnitTypeController::class,
        'pap_types'             => \App\Http\Controllers\PapTypeController::class,
        'pdp_chapters'          => \App\Http\Controllers\Api\PdpChapterController::class,
        'pdp_indicators'        => \App\Http\Controllers\Api\PdpIndicatorController::class,
        'permissions'           => \App\Http\Controllers\PermissionController::class,
        'pip_typologies'        => \App\Http\Controllers\PipTypologyController::class,
        'preparation_documents' => \App\Http\Controllers\PreparationDocumentController::class,
        'prerequisites'         => \App\Http\Controllers\PrerequisiteController::class,
        'project_statuses'      => \App\Http\Controllers\ProjectStatusController::class,
        'readiness_levels'      => \App\Http\Controllers\ReadinessLevelController::class,
        'regions'               => \App\Http\Controllers\RegionController::class,
        'roles'                 => \App\Http\Controllers\RoleController::class,
        'sdgs'                  => \App\Http\Controllers\SdgController::class,
        'spatial_coverages'     => \App\Http\Controllers\SpatialCoverageController::class,
        'ten_point_agendas'     => \App\Http\Controllers\TenPointAgendaController::class,
        'tiers'                 => \App\Http\Controllers\TierController::class,
        'users'                 => \App\Http\Controllers\UserController::class,
    ]);
});

Route::post('test', function(\Illuminate\Http\Request $request) {
    $request->validate([
        'testValue' => 'required|gt:1000',
    ]);
    dd($request->testValue);
})->name('test');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
