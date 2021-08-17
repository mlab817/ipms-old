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
    'approval_levels'       => \App\Http\Controllers\Admin\ApprovalLevelController::class,
    'bases'                 => \App\Http\Controllers\Admin\BasisController::class,
    'cip_types'             => \App\Http\Controllers\Admin\CipTypeController::class,
    'covid_interventions'   => \App\Http\Controllers\Admin\CovidInterventionController::class,
    'fs_statuses'           => \App\Http\Controllers\Admin\FsStatusController::class,
    'funding_institutions'  => \App\Http\Controllers\Admin\FundingInstitutionController::class,
    'funding_sources'       => \App\Http\Controllers\Admin\FundingSourceController::class,
    'gads'                  => \App\Http\Controllers\Admin\GadController::class,
    'implementation_modes'  => \App\Http\Controllers\Admin\ImplementationModeController::class,
    'infrastructure_sectors'=> \App\Http\Controllers\Admin\InfrastructureSectorController::class,
    'infrastructure_subsectors'=> \App\Http\Controllers\Admin\InfrastructureSubsectorController::class,
    'links'                 => \App\Http\Controllers\Admin\LinkController::class,
    'offices'               => \App\Http\Controllers\Admin\OfficeController::class,
    'operating_units'       => \App\Http\Controllers\Admin\OperatingUnitController::class,
    'operating_unit_types'  => \App\Http\Controllers\Admin\OperatingUnitTypeController::class,
    'pap_types'             => \App\Http\Controllers\Admin\PapTypeController::class,
    'pdp_chapters'          => \App\Http\Controllers\Admin\PdpChapterController::class,
    'pdp_indicators'        => \App\Http\Controllers\Admin\PdpIndicatorController::class,
//        'permissions'           => \App\Http\Controllers\Admin\PermissionController::class,
    'pip_typologies'        => \App\Http\Controllers\Admin\PipTypologyController::class,
    'preparation_documents' => \App\Http\Controllers\Admin\PreparationDocumentController::class,
    'prerequisites'         => \App\Http\Controllers\Admin\PrerequisiteController::class,
    'project_statuses'      => \App\Http\Controllers\Admin\ProjectStatusController::class,
    'readiness_levels'      => \App\Http\Controllers\Admin\ReadinessLevelController::class,
    'regions'               => \App\Http\Controllers\Admin\RegionController::class,
    'roles'                 => \App\Http\Controllers\Admin\RoleController::class,
    'sdgs'                  => \App\Http\Controllers\Admin\SdgController::class,
    'spatial_coverages'     => \App\Http\Controllers\Admin\SpatialCoverageController::class,
    'ten_point_agendas'     => \App\Http\Controllers\Admin\TenPointAgendaController::class,
    'tiers'                 => \App\Http\Controllers\Admin\TierController::class,
    'users'                 => \App\Http\Controllers\Admin\UserController::class,
    'teams'                 => \App\Http\Controllers\Admin\TeamController::class,
]);

Route::resource('permissions',\App\Http\Controllers\Admin\PermissionController::class)->except('create','show');
