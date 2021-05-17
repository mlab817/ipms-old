<?php

use App\Http\Controllers\Api\AllocationController;
use App\Http\Controllers\Api\ApprovalLevelController;
use App\Http\Controllers\Api\BasisController;
use App\Http\Controllers\Api\CipTypeController;
use App\Http\Controllers\Api\DisbursementController;
use App\Http\Controllers\Api\FeasibilityStudyController;
use App\Http\Controllers\Api\FsInfrastructureController;
use App\Http\Controllers\Api\FsInvestmentController;
use App\Http\Controllers\Api\FsStatusController;
use App\Http\Controllers\Api\FundingInstitutionController;
use App\Http\Controllers\Api\FundingSourceController;
use App\Http\Controllers\Api\GadController;
use App\Http\Controllers\Api\ImplementationModeController;
use App\Http\Controllers\Api\InfrastructureSectorController;
use App\Http\Controllers\Api\InfrastructureSubsectorController;
use App\Http\Controllers\Api\ModificationController;
use App\Http\Controllers\Api\NepController;
use App\Http\Controllers\Api\OfficeController;
use App\Http\Controllers\Api\OperatingUnitController;
use App\Http\Controllers\Api\OperatingUnitTypeController;
use App\Http\Controllers\Api\OuInfrastructureController;
use App\Http\Controllers\Api\OuInvestmentController;
use App\Http\Controllers\Api\PapTypeController;
use App\Http\Controllers\Api\PdpChapterController;
use App\Http\Controllers\Api\PdpIndicatorController;
use App\Http\Controllers\Api\PipTypologyController;
use App\Http\Controllers\Api\PreparationDocumentController;
use App\Http\Controllers\Api\PrerequisiteController;
use App\Http\Controllers\Api\ProjectStatusController;
use App\Http\Controllers\Api\ReadinessLevelController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ResettlementActionPlanController;
use App\Http\Controllers\Api\RightOfWayController;
use App\Http\Controllers\Api\ChartController;
use App\Http\Controllers\Api\SdgController;
use App\Http\Controllers\Api\SpatialCoverageController;
use App\Http\Controllers\Api\TenPointAgendaController;
use App\Http\Controllers\Api\TierController;
use App\Http\Resources\FundingInstitutionResource;
use App\Http\Resources\GadResource;
use App\Http\Resources\ImplementationModeResource;
use App\Http\Resources\InfrastructureSectorResource;
use App\Http\Resources\OfficeResource;
use App\Http\Resources\OperatingUnitResource;
use App\Http\Resources\PapTypeResource;
use App\Http\Resources\PdpChapterResource;
use App\Http\Resources\PdpIndicatorResource;
use App\Http\Resources\PipTypologyResource;
use App\Http\Resources\PrerequisiteResource;
use App\Http\Resources\ProjectStatusResource;
use App\Http\Resources\RegionResource;
use App\Models\Gad;
use App\Models\Office;
use App\Models\PdpIndicator;
use App\Models\PipTypology;
use App\Models\Prerequisite;
use App\Models\ProjectStatus;
use App\Models\Region;
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

//Route::group(['prefix'=>'v1'], function($router) {
//    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function($router) {
//        Route::post('authenticate', [AuthController::class, 'authenticate'])->name('api.authenticate');
//        Route::post('register', [AuthController::class, 'register'])->name('api.register');
//        Route::get('me', [AuthController::class, 'me'])->name('api.me');
//        Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
//    });
//
//    Route::middleware('auth:api')->get('/user', function (Request $request) {
//        return $request->user();
//    });
//
//    Route::group(['prefix' => 'users'], function($router) {
//        Route::get('/', [UserController::class, 'index'])->name('api.users.index');
//        Route::get('/{user}', [UserController::class, 'show'])->name('api.users.show');
//        Route::post('/{user}/syncRoles', [UserController::class, 'syncRoles'])->name('api.users.syncRoles');
//        Route::post('/{user}/syncPermissions', [UserController::class, 'syncPermissions'])->name('api.users.syncPermissions');
//        Route::put('/{user}', [UserController::class, 'update'])->name('api.users.update');
//        Route::delete('/{user}', [UserController::class, 'destroy'])->name('api.users.destroy');
//        Route::post('/', [UserController::class, 'store'])->name('api.users.store');
//
//        Route::get('/{user}/profile', [ProfileController::class, 'show'])->name('api.users.profile.show');
//        Route::post('/{user}/profile', [ProfileController::class, 'store'])->name('api.users.profile.store');
//        Route::put('/{user}/profile', [ProfileController::class, 'update'])->name('api.users.profile.update');
//        Route::delete('/{user}/profile', [ProfileController::class, 'destroy'])->name('api.users.profile.destroy');
//    });
//
//    Route::group(['prefix' => 'projects'], function($router) {
//        Route::get('/', [ProjectController::class,'index'])->name('api.projects.index');
//        Route::post('/', [ProjectController::class,'store'])->name('api.projects.store');
//        Route::get('/{project}', [ProjectController::class,'show'])->name('api.projects.show');
//        Route::put('/{project}', [ProjectController::class,'update'])->name('api.projects.update');
//        Route::delete('/{project}', [ProjectController::class,'destroy'])->name('api.projects.delete');
//    });
//
//    Route::group(['prefix' => 'permissions'], function($router) {
//       Route::get('/', [PermissionController::class,'index'])->name('api.permissions.index');
//       Route::post('/', [PermissionController::class,'store'])->name('api.permissions.store');
//       Route::get('/{permission}', [PermissionController::class,'show'])->name('api.permissions.show');
//       Route::put('/{permission}', [PermissionController::class,'update'])->name('api.permissions.update');
//       Route::delete('/{permission}', [PermissionController::class,'destroy'])->name('api.permissions.destroy');
//    });
//
//    Route::group(['prefix' => 'roles'], function($router) {
//        Route::get('/', [RoleController::class,'index'])->name('api.roles.index');
//        Route::post('/', [RoleController::class,'store'])->name('api.roles.store');
//        Route::get('/{name}', [RoleController::class,'show'])->name('api.roles.show');
//        Route::put('/{name}', [RoleController::class,'update'])->name('api.roles.update');
//        Route::delete('/{name}', [RoleController::class,'destroy'])->name('api.roles.destroy');
//        Route::post('/{name}/syncPermissions', [RoleController::class,'syncPermissions'])->name('api.roles.syncPermissions');
//    });
//
//    Route::get('/approval_levels', [ApprovalLevelController::class,'index'])->name('api.approval_levels.index');
//
//    Route::get('/bases', [BasisController::class,'index'])->name('api.bases.index');
//
//    Route::get('/cip_types', [CipTypeController::class,'index'])->name('api.cip_types.index');
//
//    Route::get('/fs_statuses', [FsStatusController::class,'index'])->name('api.fs_statuses.index');
//
//    Route::get('/funding_sources/chart', [FundingSourceController::class,'chart'])->name('api.funding_sources.chart');
//    Route::get('/funding_sources/{funding_source}/projects', [FundingSourceController::class,'show'])->name('api.funding_sources.show');
//    Route::get('/funding_sources', [FundingSourceController::class,'index'])->name('api.funding_sources.index');
//
//    Route::get('/funding_institutions', [FundingInstitutionController::class,'index'])->name('api.funding_institutions.index');
//
//    Route::get('/gads', [GadController::class,'index'])->name('api.gads.index');
//
//    Route::get('/implementation_modes', [ImplementationModeController::class,'index'])->name('api.implementation_modes.index');
//
//    Route::get('/infrastructure_sectors', [InfrastructureSectorController::class,'index'])->name('api.infrastructure_sectors.index');
//    Route::get('/infrastructure_subsectors', [InfrastructureSubsectorController::class,'index'])->name('api.infrastructure_subsectors.index');
//
//    Route::get('/operating_units', [OperatingUnitController::class,'index'])->name('api.operating_units.index');
//    Route::get('/operating_unit_types', [OperatingUnitTypeController::class,'index'])->name('api.operating_unit_types.index');
//
//    Route::get('/pap_types/chart', [PapTypeController::class,'chart'])->name('api.pap_types.chart');
//    Route::get('/pap_types/{pap_type}/projects', [PapTypeController::class,'show'])->name('api.pap_types.show');
//    Route::get('/pap_types', [PapTypeController::class,'index'])->name('api.pap_types.index');
//
//    Route::get('/pdp_chapters/{pdp_chapter}/projects',[PdpChapterController::class, 'show'])->name('api.pdp_chapters.show');
//    Route::get('/pdp_chapters', [PdpChapterController::class, 'index'])->name('api.pdp_chapters.index');
//
//    Route::get('/pdp_indicators', [PdpIndicatorController::class, 'index'])->name('api.pdp_indicators.index');
//
//    Route::get('/offices', [OfficeController::class,'index'])->name('api.offices.index');
//
//    Route::get('/pip_typologies', [PipTypologyController::class,'index'])->name('api.pip_typologies.index');
//
//    Route::get('/preparation_documents', [PreparationDocumentController::class,'index'])->name('api.preparation_documents.index');
//
//    Route::get('/prerequisites', [PrerequisiteController::class,'index'])->name('api.prerequisites.index');
//
//    Route::get('/project_statuses/{project_status}/projects', [ProjectStatusController::class,'show'])->name('api.project_statuses.show');
//    Route::get('/project_statuses', [ProjectStatusController::class,'index'])->name('api.project_statuses.index');
//
//    Route::get('/readiness_levels', [ReadinessLevelController::class,'index'])->name('api.readiness_levels.index');
//
//    Route::get('/regions/chart', [RegionController::class,'chart'])->name('api.regions.chart');
//    Route::get('/regions/{region}/projects', [RegionController::class,'show']);
//    Route::get('/regions', [RegionController::class,'index'])->name('api.regions.index');
//
//    Route::get('/sdgs', [SdgController::class,'index'])->name('api.sdgs.index');
//
//    Route::get('/spatial_coverages/chart', [SpatialCoverageController::class,'chart'])->name('api.spatial_coverages.chart');
//    Route::get('/spatial_coverages/{spatial_coverage}/projects', [SpatialCoverageController::class,'show'])->name('api.spatial_coverages.show');
//    Route::get('/spatial_coverages', [SpatialCoverageController::class,'index'])->name('api.spatial_coverages.index');
//
//    Route::get('/ten_point_agendas', [TenPointAgendaController::class,'index'])->name('api.ten_point_agenda.index');
//
//    Route::get('/tiers', [TierController::class,'index'])->name('api.tiers.index');
//
//    Route::post('/modifications/{modification}/approve',[ModificationController::class,'approve'])->name('api.modifications.approve');
//    Route::post('/modifications/{modification}/disapprove',[ModificationController::class,'disapprove'])->name('api.modifications.disapprove');
//    Route::get('/modifications',[ModificationController::class,'index'])->name('api.modifications.index');
//
//    Route::group(['prefix' => 'chart'], function() {
//        Route::get('/pip_by_region', [ChartController::class,'pip_by_region'])
//            ->name('api.chart.pip_by_region');
//        Route::get('/funding_sources', [ChartController::class,'funding_sources'])
//            ->name('api.chart.funding_sources');
//        Route::get('/spatial_coverages', [ChartController::class,'spatial_coverages'])
//            ->name('api.chart.spatial_coverages');
//        Route::get('/pip_by_pap_type', [ChartController::class,'pip_by_pap_type'])
//            ->name('api.chart.pip_by_pap_type');
//        Route::get('/implementation_start', [ChartController::class,'implementation_start'])
//            ->name('api.chart.implementation_start');
//        Route::get('/pip_by_main_funding_source', [ChartController::class,'pip_by_main_funding_source'])
//            ->name('api.chart.pip_by_main_funding_source');
//        Route::get('/office', [ChartController::class,'office'])
//            ->name('api.chart.office');
//        Route::get('/pip', [ChartController::class,'pip'])
//            ->name('api.chart.pip');
//        Route::get('/pip_by_spatial_coverage', [ChartController::class,'pip_by_spatial_coverage'])
//            ->name('api.chart.pip_by_spatial_coverage');
//        Route::get('/pip_by_office', [ChartController::class,'pip_by_office'])
//            ->name('api.chart.by_office');
//        Route::get('/cip_by_office', [ChartController::class,'cip_by_office'])
//            ->name('api.chart.cip_by_office');
//        Route::get('/cip_by_spatial_coverage', [ChartController::class,'cip_by_spatial_coverage'])
//            ->name('api.chart.cip_by_spatial_coverage');
//        Route::get('/pip_by_implementation_mode', [ChartController::class,'pip_by_implementation_mode'])
//            ->name('api.chart.pip_by_implementation_mode');
//        Route::get('/cip_by_implementation_mode', [ChartController::class,'cip_by_implementation_mode'])
//            ->name('api.chart.cip_by_implementation_mode');
//        Route::get('/pip_by_main_pdp_chapter', [ChartController::class,'pip_by_main_pdp_chapter'])
//            ->name('api.chart.pip_by_main_pdp_chapter');
//        Route::get('/pip_by_project_status', [ChartController::class,'pip_by_project_status'])
//            ->name('api.chart.pip_by_project_status');
//        Route::get('/pip_by_sdg', [ChartController::class,'pip_by_sdg'])
//            ->name('api.chart.pip_by_sdg');
//    });
//});

Route::post('/projects/search', [ProjectController::class,'search'])->name('api.projects.search');
