<?php

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

Route::get('/regions', function () {
    return response()->json(\App\Models\Region::all());
});

Route::get('/implementation_modes', function () {
    return response()->json(\App\Models\ImplementationMode::all());
});

Route::get('/cip_types', function () {
    return response()->json(\App\Models\CipType::all());
});

Route::get('/pip_typologies', function () {
    return response()->json(\App\Models\PipTypology::all());
});

Route::get('/gads', function () {
    return response()->json(\App\Models\Gad::all());
});

Route::get('/operating_units', function () {
    return response()->json(\App\Models\OperatingUnit::all());
});

Route::get('/offices', function () {
    return response()->json(\App\Models\Office::all());
});

Route::get('/operating_unit_types', function () {
    return response()->json(\App\Models\OperatingUnitType::all());
});

Route::get('/pdp_chapters', function () {
    return response()->json(\App\Models\PdpChapter::all());
});

Route::get('/prerequisites', function () {
    return response()->json(\App\Models\Prerequisite::all());
});


Route::get('/spatial_coverages', function () {
    return response()->json(\App\Models\SpatialCoverage::all());
});

Route::get('/sdgs', function () {
    return response()->json(\App\Models\Sdg::all());
});

Route::get('/tpas', function () {
    return response()->json(\App\Models\TenPointAgenda::all());
});

Route::get('/tiers', function () {
    return response()->json(\App\Models\Tier::all());
});

Route::get('/infrastructure_sectors', function () {
    return response()->json(\App\Models\InfrastructureSector::all());
});

Route::get('/infrastructure_subsectors', function () {
    return response()->json(\App\Models\InfrastructureSubsector::all());
});

Route::get('/funding_sources', function () {
    return response()->json(\App\Models\FundingSource::all());
});

Route::get('/funding_institutions', function () {
    return response()->json(\App\Models\FundingInstitution::all());
});

Route::get('/covid_interventions', function () {
    return response()->json(\App\Models\CovidIntervention::all());
});

Route::get('/all', function () {
    return response()->json([
        'regions' => \App\Models\Region::all(),
        'implementation_modes' => \App\Models\ImplementationMode::all(),
        'cip_types' => \App\Models\CipType::all(),
        'pip_typologies' => \App\Models\PipTypology::all(),
        'gads' => \App\Models\Gad::all(),
        'operating_units' => \App\Models\OperatingUnit::all(),
        'offices' => \App\Models\Office::all(),
        'operating_unit_types' => \App\Models\OperatingUnitType::all(),
        'pdp_chapters' => \App\Models\PdpChapter::all(),
        'prerequisites' => \App\Models\Prerequisite::all(),
        'spatial_coverages' => \App\Models\SpatialCoverage::all(),
        'sdgs' => \App\Models\Sdg::all(),
        'tpas' => \App\Models\TenPointAgenda::all(),
        'tiers' => \App\Models\Tier::all(),
        'infrastructure_sectors' => \App\Models\InfrastructureSector::all(),
        'infrastructure_subsectors' => \App\Models\InfrastructureSubsector::all(),
        'funding_sources' => \App\Models\FundingSource::all(),
        'funding_institutions' => \App\Models\FundingInstitution::all(),
        'project_statuses' => \App\Models\ProjectStatus::all(),
        'submission_statuses' => \App\Models\SubmissionStatus::all(),
        'approval_levels' => \App\Models\ApprovalLevel::all(),
    ]);
});
