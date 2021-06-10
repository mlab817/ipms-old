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

Route::post('/projects/search', [ProjectController::class,'search'])->name('api.projects.search');
