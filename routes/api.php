<?php

use App\Http\Controllers\Api\AllocationController;
use App\Http\Controllers\Api\DisbursementController;
use App\Http\Controllers\Api\FeasibilityStudyController;
use App\Http\Controllers\Api\FsInfrastructureController;
use App\Http\Controllers\Api\FsInvestmentController;
use App\Http\Controllers\Api\NepController;
use App\Http\Controllers\Api\OuInfrastructureController;
use App\Http\Controllers\Api\OuInvestmentController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ResettlementActionPlanController;
use App\Http\Controllers\Api\RightOfWayController;
use App\Http\Controllers\Api\ChartController;
use App\Http\Resources\FundingInstitutionResource;
use App\Http\Resources\GadResource;
use App\Http\Resources\ImplementationModeResource;
use App\Http\Resources\InfrastructureSectorResource;
use App\Http\Resources\OfficeResource;
use App\Http\Resources\OperatingUnitResource;
use App\Http\Resources\PapTypeResource;
use App\Http\Resources\PdpChapterResource;
use App\Http\Resources\PdpIndicatorResource;
use App\Models\Gad;
use App\Models\PdpIndicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\RegionInfrastructureController;
use App\Http\Controllers\Api\RegionInvestmentController;
use App\Http\Controllers\Api\RoleController;
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

Route::group(['prefix'=>'v1'], function($router) {
    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function($router) {
        Route::post('authenticate', [AuthController::class, 'authenticate'])->name('api.authenticate');
        Route::post('register', [AuthController::class, 'register'])->name('api.register');
        Route::get('me', [AuthController::class, 'me'])->name('api.me');
        Route::get('logout', [AuthController::class, 'logout'])->name('api.logout');
    });

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => 'users'], function($router) {
        Route::get('/', [UserController::class, 'index'])->name('api.users.index');
        Route::get('/{user}', [UserController::class, 'show'])->name('api.users.show');
        Route::post('/{user}/syncRoles', [UserController::class, 'syncRoles'])->name('api.users.syncRoles');
        Route::post('/{user}/syncPermissions', [UserController::class, 'syncPermissions'])->name('api.users.syncPermissions');
        Route::put('/{user}', [UserController::class, 'update'])->name('api.users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('api.users.destroy');
        Route::post('/', [UserController::class, 'store'])->name('api.users.store');

        Route::get('/{user}/profile', [ProfileController::class, 'show'])->name('api.users.profile.show');
        Route::post('/{user}/profile', [ProfileController::class, 'store'])->name('api.users.profile.store');
        Route::put('/{user}/profile', [ProfileController::class, 'update'])->name('api.users.profile.update');
        Route::delete('/{user}/profile', [ProfileController::class, 'destroy'])->name('api.users.profile.destroy');
    });

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

    Route::get('/approval_levels', function () {
        return \App\Http\Resources\ApprovalLevelResource::collection(\App\Models\ApprovalLevel::all());
    });

    Route::get('/bases', function () {
        return \App\Http\Resources\BasisResource::collection(\App\Models\Basis::all());
    });

    Route::get('/cip_types', function () {
        return \App\Http\Resources\CipTypeResource::collection(\App\Models\CipType::all());
    });

    Route::get('/fs_statuses', function () {
        return \App\Http\Resources\FsStatusResource::collection(\App\Models\FsStatus::all());
    });

    Route::get('/funding_sources', function () {
        return \App\Http\Resources\FundingSourceResource::collection(\App\Models\FundingSource::all());
    });

    Route::get('/funding_institutions', function () {
        return FundingInstitutionResource::collection(\App\Models\FundingInstitution::all());
    });

    Route::get('/gads', function () {
        return GadResource::collection(Gad::all());
    });

    Route::get('/implementation_modes', function () {
        return ImplementationModeResource::collection(\App\Models\ImplementationMode::all());
    });

    Route::get('/infrastructure_sectors', function () {
        return InfrastructureSectorResource::collection(\App\Models\InfrastructureSector::with('children')->get());
    });

    Route::get('/operating_units', function () {
        return OperatingUnitResource::collection(\App\Models\OperatingUnit::all());
    });

    Route::get('/pap_types', function() {
        return PapTypeResource::collection(\App\Models\PapType::all());
    });

    Route::get('/pdp_chapters', function() {
        return PdpChapterResource::collection(\App\Models\PdpChapter::all());
    });

    Route::get('/pdp_indicators', function() {
        $indicators = PdpIndicator::where('id','<=',20)->with(['children' => function($q) {
            $q->with('children');
        }, 'parent' => function ($q) {
            $q->with('parent');
        }])->get();

        return PdpIndicatorResource::collection($indicators);
    });

    Route::get('/offices', function() {
        return OfficeResource::collection(\App\Models\Office::all());
    });

    Route::get('/pip_typologies', function() {
        return \App\Http\Resources\PipTypologyResource::collection(\App\Models\PipTypology::all());
    });

    Route::get('/prerequisites', function() {
        return \App\Http\Resources\PrerequisiteResource::collection(\App\Models\Prerequisite::all());
    });

    Route::get('/project_statuses', function() {
        return \App\Http\Resources\ProjectStatusResource::collection(\App\Models\ProjectStatus::all());
    });

    Route::get('/regions', function() {
        return \App\Http\Resources\RegionResource::collection(\App\Models\Region::all());
    });

    Route::get('/sdgs', function() {
        return \App\Http\Resources\SdgResource::collection(\App\Models\Sdg::all());
    });

    Route::get('/spatial_coverages', function() {
        return \App\Http\Resources\SpatialCoverageResource::collection(\App\Models\SpatialCoverage::all());
    });

    Route::get('/ten_point_agendas', function() {
        return \App\Http\Resources\TenPointAgendaResource::collection(\App\Models\TenPointAgenda::all());
    });

    Route::get('/tiers', function () {
        return \App\Http\Resources\TierResource::collection(\App\Models\Tier::all());
    });

    Route::group(['prefix' => 'reports'], function() {
        Route::get('/funding_sources', [ReportController::class,'getInvestmentByFundingSource']);
        Route::get('/regions', [ReportController::class,'getInvestmentByRegion']);
    });

    Route::group(['prefix' => 'chart'], function() {
        Route::get('/pip_by_region', [ChartController::class,'pip_by_region'])
            ->name('api.chart.pip_by_region');
        Route::get('/funding_sources', [ChartController::class,'funding_sources'])
            ->name('api.chart.funding_sources');
        Route::get('/spatial_coverages', [ChartController::class,'spatial_coverages'])
            ->name('api.chart.spatial_coverages');
        Route::get('/pip_by_pap_type', [ChartController::class,'pip_by_pap_type'])
            ->name('api.chart.pip_by_pap_type');
        Route::get('/implementation_start', [ChartController::class,'implementation_start'])
            ->name('api.chart.implementation_start');
        Route::get('/pip_by_main_funding_source', [ChartController::class,'pip_by_main_funding_source'])
            ->name('api.chart.pip_by_main_funding_source');
        Route::get('/office', [ChartController::class,'office'])
            ->name('api.chart.office');
        Route::get('/pip', [ChartController::class,'pip'])
            ->name('api.chart.pip');
        Route::get('/pip_by_spatial_coverage', [ChartController::class,'pip_by_spatial_coverage'])
            ->name('api.chart.pip_by_spatial_coverage');
        Route::get('/pip_by_office', [ChartController::class,'pip_by_office'])
            ->name('api.chart.by_office');
        Route::get('/cip_by_office', [ChartController::class,'cip_by_office'])
            ->name('api.chart.cip_by_office');
        Route::get('/cip_by_spatial_coverage', [ChartController::class,'cip_by_spatial_coverage'])
            ->name('api.chart.cip_by_spatial_coverage');
        Route::get('/pip_by_implementation_mode', [ChartController::class,'pip_by_implementation_mode'])
            ->name('api.chart.pip_by_implementation_mode');
        Route::get('/cip_by_implementation_mode', [ChartController::class,'cip_by_implementation_mode'])
            ->name('api.chart.cip_by_implementation_mode');
        Route::get('/pip_by_main_pdp_chapter', [ChartController::class,'pip_by_main_pdp_chapter'])
            ->name('api.chart.pip_by_main_pdp_chapter');
        Route::get('/pip_by_project_status', [ChartController::class,'pip_by_project_status'])
            ->name('api.chart.pip_by_project_status');
        Route::get('/pip_by_sdg', [ChartController::class,'pip_by_sdg'])
            ->name('api.chart.pip_by_sdg');
    });
});
