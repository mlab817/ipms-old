<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('basis', 'BasisCrudController');
    Route::crud('approvallevel', 'ApprovalLevelCrudController');
    Route::crud('operatingunit', 'OperatingUnitCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('permission', 'PermissionCrudController');
    Route::crud('ciptype', 'CipTypeCrudController');
    Route::crud('fsstatus', 'FsStatusCrudController');
    Route::crud('fundinginstitution', 'FundingInstitutionCrudController');
    Route::crud('fundingsource', 'FundingSourceCrudController');
    Route::crud('gad', 'GadCrudController');
    Route::crud('implementationmode', 'ImplementationModeCrudController');
    Route::crud('infrastructuresector', 'InfrastructureSectorCrudController');
    Route::crud('operatingunittype', 'OperatingUnitTypeCrudController');
    Route::crud('paptype', 'PapTypeCrudController');
    Route::crud('pdpchapter', 'PdpChapterCrudController');
    Route::crud('pdpindicator', 'PdpIndicatorCrudController');
    Route::crud('pdpoutcome', 'PdpOutcomeCrudController');
    Route::crud('pdpsuboutcome', 'PdpSuboutcomeCrudController');
    Route::crud('piptypology', 'PipTypologyCrudController');
    Route::crud('preparationdocument', 'PreparationDocumentCrudController');
    Route::crud('prerequisite', 'PrerequisiteCrudController');
    Route::crud('projectstatus', 'ProjectStatusCrudController');
    Route::crud('readinesslevel', 'ReadinessLevelCrudController');
    Route::crud('region', 'RegionCrudController');
    Route::crud('province', 'ProvinceCrudController');
    Route::crud('sdg', 'SdgCrudController');
    Route::crud('spatialcoverage', 'SpatialCoverageCrudController');
    Route::crud('tenpointagenda', 'TenPointAgendaCrudController');
    Route::crud('tier', 'TierCrudController');
    Route::crud('infrastructuresubsector', 'InfrastructureSubsectorCrudController');
}); // this should be the absolute last line of this file