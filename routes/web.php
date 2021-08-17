<?php

use Illuminate\Support\Facades\Route;

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

// Resources secured by auth
Route::middleware(['auth','user.activated'])->group(function () {

    Route::post('password/change', [\App\Http\Controllers\Auth\PasswordChangeController::class,'update'])->name('change_password_update');
    Route::get('password/change', [\App\Http\Controllers\Auth\PasswordChangeController::class,'index'])->name('change_password_index');

    Route::middleware(['password.changed'])->group(function() {

        Route::post('/switchRole', \App\Http\Controllers\SwitchRoleController::class)->name('roles.switch');

        Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');

        Route::get('/account/logins', [\App\Http\Controllers\AccountController::class,'logins'])->name('account.logins');

        Route::post('/auth/password/change', \App\Http\Controllers\Auth\ChangePasswordController::class)->name('password.change');

        Route::resource('project_notifications', \App\Http\Controllers\ProjectNotificationController::class);

        // auth routes with registration disabled

        Route::resource('pending_transfers', \App\Http\Controllers\PendingTransferController::class);

        Route::middleware('can:projects.manage')->prefix('/admin')->name('admin.')->group(function() {
            Route::resource('projects', \App\Http\Controllers\Admin\AdminProjectController::class);
            Route::resource('projects.users', \App\Http\Controllers\Admin\ProjectUserController::class);
            Route::post('/projects/{project}/change_owner', [\App\Http\Controllers\Admin\AdminProjectController::class,'changeOwnerPost'])->name('projects.changeOwner.post');
            Route::get('/projects/{project}/change_owner', [\App\Http\Controllers\Admin\AdminProjectController::class,'changeOwner'])->name('projects.changeOwner.get');
        });

        Route::get('/settings',\App\Http\Controllers\SettingsController::class)->name('settings');

        Route::get('/attachments/{attachment}/download', [\App\Http\Controllers\ProjectAttachmentController::class,'download'])->name('attachments.download');
        Route::delete('/attachments/{attachment}', [\App\Http\Controllers\ProjectAttachmentController::class,'destroy'])->name('attachments.destroy');

        Route::get('/auth/check', \App\Http\Controllers\CheckUserLoginController::class)->name('auth.check');

        Route::resource('issues.issue_comments', \App\Http\Controllers\IssueCommentController::class)->shallow();
        Route::resource('projects.issues', \App\Http\Controllers\ProjectIssueController::class)->except('edit');

        // other index routes
        Route::get('/projects/assigned', [\App\Http\Controllers\ProjectController::class,'assigned'])->name('projects.assigned');
        Route::get('/projects/office', [\App\Http\Controllers\ProjectController::class,'office'])->name('projects.office');
        Route::get('/projects/own', [\App\Http\Controllers\ProjectController::class,'own'])->name('projects.own');

        Route::put('/projects/{project}/drop', [\App\Http\Controllers\ProjectController::class,'drop'])->name('projects.drop');
        // TRIP
        Route::get('/projects/{project}/settings', [\App\Http\Controllers\ProjectController::class,'settings'])->name('projects.settings');
        Route::get('/projects/{project}/files', [\App\Http\Controllers\ProjectController::class,'files'])->name('projects.files');
        Route::get('/projects/{project}/history', [\App\Http\Controllers\ProjectController::class,'history'])->name('projects.history');
        Route::get('/projects/{project}/trip', [\App\Http\Controllers\TripController::class,'show'])->name('trips.show');
        Route::put('/projects/{project}/trip', [\App\Http\Controllers\TripController::class,'update'])->name('trips.update');

        Route::post('/projects/{project}/clone',[\App\Http\Controllers\ProjectController::class,'clone'])->name('projects.clone');

        Route::post('/projects/{project}/pin',\App\Http\Controllers\ProjectPinController::class)->name('projects.pin');
        // Upload
        Route::post('/projects/{project}/upload', [\App\Http\Controllers\ProjectController::class,'upload'])->name('projects.upload');

        Route::post('/projects/{uuid}/restore', [\App\Http\Controllers\ProjectController::class,'restore'])->name('projects.restore');

        Route::post('/projects/{project}/endorse', [\App\Http\Controllers\ProjectController::class,'endorse'])->name('reviews.endorse');
        // Review
        Route::post('/projects/{project}/review', [\App\Http\Controllers\ProjectController::class,'storeReview'])->name('reviews.store');
        Route::get('/projects/{project}/review/create', [\App\Http\Controllers\ProjectController::class,'review'])->name('reviews.create');

        Route::resource('projects.reviews', \App\Http\Controllers\ProjectReviewController::class);

        Route::get('/projects/clone', [\App\Http\Controllers\ProjectController::class,'new_clone'])->name('projects.new_clone');
        Route::get('/projects/deleted', [\App\Http\Controllers\ProjectController::class,'deleted'])->name('projects.deleted');
        Route::get('/projects/import', [\App\Http\Controllers\ProjectImportController::class,'index'])->name('projects.import.index');
        Route::post('projects/import', [\App\Http\Controllers\ProjectImportController::class,'import'])->name('projects.import.import');

        Route::get('/projects/{project}/generate_pdf', \App\Http\Controllers\ProjectGeneratePdfController::class)->name('projects.generatePdf');
        Route::get('/projects/{project}/exportJson', [\App\Http\Controllers\ProjectController::class,'exportJson'])->name('projects.exportJson');
        Route::post('projects/checkAvailability', [\App\Http\Controllers\ProjectController::class,'checkAvailability'])->name('projects.checkAvailability');
        Route::resource('projects', \App\Http\Controllers\ProjectController::class);
        Route::resource('projects.pipols', \App\Http\Controllers\ProjectPipolController::class);

        Route::resource('reviews', \App\Http\Controllers\ReviewController::class)->except('store','create');
        Route::resource('subprojects', \App\Http\Controllers\SubprojectController::class);
        Route::post('/notifications', [\App\Http\Controllers\NotificationController::class,'markAllAsRead'])->name('notifications.markAllAsRead');
        Route::resource('notifications',\App\Http\Controllers\NotificationController::class)->only('index','show');
        Route::resource('pipols',\App\Http\Controllers\PipolController::class);
        Route::resource('users', \App\Http\Controllers\UserController::class);
        Route::resource('offices',\App\Http\Controllers\OfficeController::class);
        Route::resource('trackers',\App\Http\Controllers\TrackerController::class);
        Route::resource('updating-periods',\App\Http\Controllers\UpdatingPeriodController::class);

        Route::resource('users.activities', \App\Http\Controllers\UserActivityController::class);

        Route::group(['prefix' => 'reports'], function() {
            Route::get('/', [\App\Http\Controllers\ReportController::class,'index'])->name('reports.index');
            Route::get('/implementation_modes', [\App\Http\Controllers\ReportController::class,'implementation_modes'])->name('reports.implementation_modes');
            Route::get('/offices', [\App\Http\Controllers\ReportController::class,'offices'])->name('reports.offices');
            Route::get('/spatial_coverages', [\App\Http\Controllers\ReportController::class,'spatial_coverages'])->name('reports.spatial_coverages');
            Route::get('/regions', [\App\Http\Controllers\ReportController::class,'regions'])->name('reports.regions');
            Route::get('/funding_sources', [\App\Http\Controllers\ReportController::class,'funding_sources'])->name('reports.funding_sources');
            Route::get('/tiers', [\App\Http\Controllers\ReportController::class,'tiers'])->name('reports.tiers');
            Route::get('/pap_types', [\App\Http\Controllers\ReportController::class,'pap_types'])->name('reports.pap_types');
            Route::get('/pdp_chapters', [\App\Http\Controllers\ReportController::class,'pdp_chapters'])->name('reports.pdp_chapters');
            Route::get('/project_statuses', [\App\Http\Controllers\ReportController::class,'project_statuses'])->name('reports.project_statuses');
        });

        Route::resource('links',\App\Http\Controllers\Admin\LinkController::class)->only('index');

        Route::resource('audit_logs',\App\Http\Controllers\AuditLogController::class)->only('index','show');

        Route::middleware('can:exports.view_index')->prefix('/exports')->name('exports.')->group(function() {
            Route::get('',[\App\Http\Controllers\ExportController::class,'index'])->name('index');
            Route::get('/fs_infrastructures',[\App\Http\Controllers\ExportController::class,'fs_infrastructures'])->name('fs_infrastructures');
            Route::get('/fs_investments',[\App\Http\Controllers\ExportController::class,'fs_investments'])->name('fs_investments');
            Route::get('/region_investments',[\App\Http\Controllers\ExportController::class,'region_investments'])->name('region_investments');
            Route::get('/regions',[\App\Http\Controllers\ExportController::class,'regions'])->name('regions');
            Route::get('/ten_point_agendas',[\App\Http\Controllers\ExportController::class,'ten_point_agendas'])->name('ten_point_agendas');
            Route::get('/sdgs', [\App\Http\Controllers\ExportController::class,'sdgs'])->name('sdgs');
            Route::get('/projects', [\App\Http\Controllers\ExportController::class,'projects'])->name('projects');
        });

        Route::post('search', [\App\Http\Controllers\SearchController::class,'search'])->name('search');
        Route::resource('search', \App\Http\Controllers\SearchController::class)->only('index');

        Route::resource('users.projects', \App\Http\Controllers\UserProjectController::class);

        // Admin routes
        Route::middleware(['admin'])->prefix('/admin')->name('admin.')->group(function () {
            Route::get('', \App\Http\Controllers\Admin\AdminController::class)->name('index');
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

            Route::post('offices/export',[\App\Http\Controllers\Admin\OfficeController::class,'index'])->name('offices.export');
        });
    });

    Route::resource('settings', \App\Http\Controllers\SettingController::class);

});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/google', [\App\Http\Controllers\Auth\SocialLoginController::class,'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\SocialLoginController::class,'handleGoogleCallback'])->name('auth.google-callback');
});

Route::get('/downloadJson/{filename}', \App\Http\Controllers\DownloadJsonController::class)->name('projects.downloadJson');
Route::get('/exportJson', \App\Http\Controllers\ExportProjectsAsJsonController::class)->name('projects.json');

Route::get('/generate_username', function() {
    $users = \App\Models\User::all();

    foreach ($users as $user) {
        $first_names = explode(' ', $user->first_name);
        $initials = '';
        foreach ($first_names as $name) {
            $initials .= strtolower($name[0] ?? '');
        }
        $user->username = $initials . strtolower($user->last_name);
        $user->save();
    }
})->name('generate_username');

Route::get('/test', function() {
    return view('test')
        ->with('project',\App\Models\Project::with(['funding_institution','funding_source','pdp_chapter','gad','project_status','submission_status','preparation_document','implementation_mode','pap_type','spatial_coverage','office','creator','bases','covid_interventions','funding_institutions','funding_sources','infrastructure_sectors','infrastructure_subsectors','pdp_chapters','pdp_indicators','prerequisites','regions','sdgs','ten_point_agendas','allocation','description','disbursement','expected_output','feasibility_study','resettlement_action_plan','right_of_way','risk','project_update','fs_investments','fs_infrastructures','nep','operating_units','region_investments','region_infrastructures'])->find(15));
})->name('test');

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/debug', function () {
    \Log::debug('Test debug message');
});

Route::get('/optimize', function (){
    Artisan::call('optimize');

    return 'optimized application';
});

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');

    return 'cleared cache, route, config';
});
