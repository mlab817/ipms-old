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

Route::redirect('/', 'login');

Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/logout_other_devices', \App\Http\Controllers\Auth\LogoutOtherDevicesController::class)->name('logout_other_devices');
Route::post('/change_password', \App\Http\Controllers\Auth\ChangePasswordController::class)->name('change_password');
Route::get('/settings',\App\Http\Controllers\SettingsController::class)->name('settings');

Route::get('/projects/office', [\App\Http\Controllers\ProjectController::class,'office'])->name('projects.office');
Route::get('/projects/own', [\App\Http\Controllers\ProjectController::class,'own'])->name('projects.own');
Route::get('/projects/{project}/trip/edit', [\App\Http\Controllers\TripController::class,'edit'])->name('trips.edit');
Route::get('/projects/{project}/trip/create', [\App\Http\Controllers\TripController::class,'create'])->name('trips.create');
Route::get('/projects/{project}/trip', [\App\Http\Controllers\TripController::class,'show'])->name('trips.show');
Route::put('/projects/{project}/trip', [\App\Http\Controllers\TripController::class,'update'])->name('trips.update');
Route::post('/projects/{project}/trip', [\App\Http\Controllers\TripController::class,'store'])->name('trips.store');

Route::resources([
    'projects' => \App\Http\Controllers\ProjectController::class,
    'reviews'   => \App\Http\Controllers\ReviewController::class,
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
        'infrastructure_subsectors'=> \App\Http\Controllers\InfrastructureSubsectorController::class,
        'offices'               => \App\Http\Controllers\OfficeController::class,
        'operating_units'       => \App\Http\Controllers\OperatingUnitController::class,
        'operating_unit_types'  => \App\Http\Controllers\OperatingUnitTypeController::class,
        'pap_types'             => \App\Http\Controllers\PapTypeController::class,
        'pdp_chapters'          => \App\Http\Controllers\PdpChapterController::class,
        'pdp_indicators'        => \App\Http\Controllers\PdpIndicatorController::class,
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

Route::get('/email', function () {
    $user = \App\Models\User::find(1);

    event(new \App\Events\UserCreated($user));

//    (new \App\Models\User(['email' => 'test@test.com']))->notify(new \App\Notifications\NewUserNotification($user));
});
