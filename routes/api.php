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

        Route::get('/{project}/region_investments', [RegionInvestmentController::class,'index'])
            ->name('api.projects.region_investments.index');
        Route::post('/{project}/region_investments', [RegionInvestmentController::class,'store'])
            ->name('api.projects.region_investments.store');
        Route::get('/{project}/region_investments/{region_investment}', [RegionInvestmentController::class,'show'])
            ->name('api.projects.region_investments.show');
        Route::put('/{project}/region_investments/{region_investment}', [RegionInvestmentController::class,'update'])
            ->name('api.projects.region_investments.update');
        Route::delete('/{project}/region_investments/{region_investment}', [RegionInvestmentController::class,'destroy'])
            ->name('api.projects.region_investments.destroy');

        Route::get('/{project}/region_infrastructures', [RegionInfrastructureController::class,'index'])
            ->name('api.projects.region_infrastructures.index');
        Route::post('/{project}/region_infrastructures', [RegionInfrastructureController::class,'store'])
            ->name('api.projects.region_infrastructures.store');
        Route::get('/{project}/region_infrastructures/{region_infrastructure}', [RegionInfrastructureController::class,'show'])
            ->name('api.projects.region_infrastructures.show');
        Route::put('/{project}/region_infrastructures/{region_infrastructure}', [RegionInfrastructureController::class,'update'])
            ->name('api.projects.region_infrastructures.update');
        Route::delete('/{project}/region_infrastructures/{region_infrastructure}', [RegionInfrastructureController::class,'destroy'])
            ->name('api.projects.region_infrastructures.destroy');

        Route::get('/{project}/nep',[NepController::class,'index'])->name('api.projects.nep.index');
        Route::get('/{project}/nep/{nep}',[NepController::class,'show'])->name('api.projects.nep.show');
        Route::post('/{project}/nep/{nep}',[NepController::class,'store'])->name('api.projects.nep.store');
        Route::put('/{project}/nep/{nep}',[NepController::class,'update'])->name('api.projects.nep.update');
        Route::delete('/{project}/nep/{nep}',[NepController::class,'destroy'])->name('api.projects.nep.destroy');

        Route::get('/{project}/ou_infrastructures',[OuInfrastructureController::class,'index'])
            ->name('api.projects.ou_infrastructures.index');
        Route::post('/{project}/ou_infrastructures',[OuInfrastructureController::class,'store'])
            ->name('api.projects.ou_infrastructures.store');
        Route::get('/{project}/ou_infrastructures/{ouInfrastructure}',[OuInfrastructureController::class,'show'])
            ->name('api.projects.ou_infrastructures.show');
        Route::put('/{project}/ou_infrastructures/{ouInfrastructure}',[OuInfrastructureController::class,'update'])
            ->name('api.projects.ou_infrastructures.update');
        Route::delete('/{project}/ou_infrastructures/{ouInfrastructure}',[OuInfrastructureController::class,'destroy'])
            ->name('api.projects.ou_infrastructures.destroy');

        Route::get('/{project}/region_infrastructures',[RegionInfrastructureController::class,'index'])
            ->name('api.projects.region_infrastructures.index');
        Route::post('/{project}/region_infrastructures',[RegionInfrastructureController::class,'store'])
            ->name('api.projects.region_infrastructures.store');
        Route::get('/{project}/region_infrastructures/{regionInfrastructure}',[RegionInfrastructureController::class,'show'])
            ->name('api.projects.region_infrastructures.show');
        Route::put('/{project}/region_infrastructures/{regionInfrastructure}',[RegionInfrastructureController::class,'update'])
            ->name('api.projects.region_infrastructures.update');
        Route::delete('/{project}/region_infrastructures/{regionInfrastructure}',[RegionInfrastructureController::class,'destroy'])
            ->name('api.projects.region_infrastructures.destroy');

        Route::get('/{project}/fs_infrastructures',[FsInfrastructureController::class,'index'])
            ->name('api.projects.fs_infrastructures.index');
        Route::post('/{project}/fs_infrastructures',[FsInfrastructureController::class,'store'])
            ->name('api.projects.fs_infrastructures.store');
        Route::get('/{project}/fs_infrastructures/{fsInfrastructure}',[FsInfrastructureController::class,'show'])
            ->name('api.projects.fs_infrastructures.show');
        Route::put('/{project}/fs_infrastructures/{fsInfrastructure}',[FsInfrastructureController::class,'update'])
            ->name('api.projects.fs_infrastructures.update');
        Route::delete('/{project}/fs_infrastructures/{fsInfrastructure}',[FsInfrastructureController::class,'destroy'])
            ->name('api.projects.fs_infrastructures.destroy');

        Route::get('/{project}/fs_investments',[FsInvestmentController::class,'index'])
            ->name('api.projects.fs_investments.index');
        Route::post('/{project}/fs_investments',[FsInvestmentController::class,'store'])
            ->name('api.projects.fs_investments.store');
        Route::get('/{project}/fs_investments/{fsInvestment}',[FsInvestmentController::class,'show'])
            ->name('api.projects.fs_investments.show');
        Route::put('/{project}/fs_investments/{fsInvestment}',[FsInvestmentController::class,'update'])
            ->name('api.projects.fs_investments.update');
        Route::delete('/{project}/fs_investments/{fsInvestment}',[FsInvestmentController::class,'destroy'])
            ->name('api.projects.fs_investments.destroy');

        Route::get('/{project}/ou_investments',[OuInvestmentController::class,'index'])
            ->name('api.projects.ou_investments.index');
        Route::post('/{project}/ou_investments',[OuInvestmentController::class,'store'])
            ->name('api.projects.ou_investments.store');
        Route::get('/{project}/ou_investments/{ouInvestment}',[OuInvestmentController::class,'show'])
            ->name('api.projects.ou_investments.show');
        Route::put('/{project}/ou_investments/{ouInvestment}',[OuInvestmentController::class,'update'])
            ->name('api.projects.ou_investments.update');
        Route::delete('/{project}/ou_investments/{ouInvestment}',[OuInvestmentController::class,'destroy'])
            ->name('api.projects.ou_investments.destroy');

        Route::get('/{project}/fs',[FeasibilityStudyController::class,'index'])
            ->name('api.projects.fs.index');
        Route::post('/{project}/fs',[FeasibilityStudyController::class,'store'])
            ->name('api.projects.fs.store');
        Route::get('/{project}/fs/{fs}',[FeasibilityStudyController::class,'show'])
            ->name('api.projects.fs.show');
        Route::put('/{project}/fs/{fs}',[FeasibilityStudyController::class,'update'])
            ->name('api.projects.fs.update');
        Route::delete('/{project}/fs/{fs}',[FeasibilityStudyController::class,'destroy'])
            ->name('api.projects.fs.destroy');

        Route::get('/{project}/rap',[ResettlementActionPlanController::class,'index'])
            ->name('api.projects.rap.index');
        Route::post('/{project}/rap',[ResettlementActionPlanController::class,'store'])
            ->name('api.projects.rap.store');
        Route::get('/{project}/rap/{rap}',[ResettlementActionPlanController::class,'show'])
            ->name('api.projects.rap.show');
        Route::put('/{project}/rap/{rap}',[ResettlementActionPlanController::class,'update'])
            ->name('api.projects.rap.update');
        Route::delete('/{project}/rap/{rap}',[ResettlementActionPlanController::class,'destroy'])
            ->name('api.projects.rap.destroy');

        Route::get('/{project}/row',[RightOfWayController::class,'index'])
            ->name('api.projects.row.index');
        Route::post('/{project}/row',[RightOfWayController::class,'store'])
            ->name('api.projects.row.store');
        Route::get('/{project}/row/{row}',[RightOfWayController::class,'show'])
            ->name('api.projects.row.show');
        Route::put('/{project}/row/{row}',[RightOfWayController::class,'update'])
            ->name('api.projects.row.update');
        Route::delete('/{project}/row/{row}',[RightOfWayController::class,'destroy'])
            ->name('api.projects.row.destroy');

        Route::get('/{project}/allocation',[AllocationController::class,'index'])
            ->name('api.projects.allocation.index');
        Route::post('/{project}/allocation',[AllocationController::class,'store'])
            ->name('api.projects.allocation.store');
        Route::get('/{project}/allocation/{allocation}',[AllocationController::class,'show'])
            ->name('api.projects.allocation.show');
        Route::put('/{project}/allocation/{allocation}',[AllocationController::class,'update'])
            ->name('api.projects.allocation.update');
        Route::delete('/{project}/allocation/{allocation}',[AllocationController::class,'destroy'])
            ->name('api.projects.allocation.destroy');

        Route::get('/{project}/disbursement',[DisbursementController::class,'index'])
            ->name('api.projects.disbursement.index');
        Route::post('/{project}/disbursement',[DisbursementController::class,'store'])
            ->name('api.projects.disbursement.store');
        Route::get('/{project}/disbursement/{disbursement}',[DisbursementController::class,'show'])
            ->name('api.projects.disbursement.show');
        Route::put('/{project}/disbursement/{disbursement}',[DisbursementController::class,'update'])
            ->name('api.projects.disbursement.update');
        Route::delete('/{project}/disbursement/{disbursement}',[DisbursementController::class,'destroy'])
            ->name('api.projects.disbursement.destroy');
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
        return \App\Http\Resources\FundingInstitutionResource::collection(\App\Models\FundingInstitution::all());
    });

    Route::get('/gads', function () {
        return \App\Http\Resources\GadResource::collection(\App\Models\Gad::all());
    });

    Route::get('/implementation_modes', function () {
        return \App\Http\Resources\ImplementationModeResource::collection(\App\Models\ImplementationMode::all());
    });

    Route::get('/infrastructure_sectors', function () {
        return \App\Http\Resources\InfrastructureSectorResource::collection(\App\Models\InfrastructureSector::with('children')->get());
    });

    Route::get('/operating_units', function () {
        return \App\Http\Resources\OperatingUnitResource::collection(\App\Models\OperatingUnit::all());
    });

    Route::get('/pap_types', function() {
        return \App\Http\Resources\PapTypeResource::collection(\App\Models\PapType::all());
    });

    Route::get('/pdp_chapters', function() {
        return \App\Http\Resources\PdpChapterResource::collection(\App\Models\PdpChapter::all());
    });

    Route::get('/pdp_indicators', function() {
        $indicators = \App\Models\PdpIndicator::where('id','<=',20)->with(['children' => function($q) {
            $q->with('children');
        }, 'parent' => function ($q) {
            $q->with('parent');
        }])->get();

        return \App\Http\Resources\PdpIndicatorResource::collection($indicators);
    });

    Route::get('/offices', function() {
        return \App\Http\Resources\OfficeResource::collection(\App\Models\Office::all());
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
        Route::get('/regions', [ChartController::class,'regions'])->name('chart.regions');
        Route::get('/funding_sources', [ChartController::class,'funding_sources'])->name('chart.funding_sources');
    });
});
