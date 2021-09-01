<?php

use App\Http\Controllers\CheckUserLoginController;
use App\Http\Controllers\CloneProjectController;
use App\Http\Controllers\IssueCommentController;
use App\Http\Controllers\ProjectAttachmentController;
use App\Http\Controllers\ProjectCloneController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectImportController;
use App\Http\Controllers\ProjectIssueController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TripController;
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

        Route::get('/settings', SettingsController::class)->name('settings');

        Route::get('/attachments/{attachment}/download', [ProjectAttachmentController::class,'download'])->name('attachments.download');
        Route::delete('/attachments/{attachment}', [ProjectAttachmentController::class,'destroy'])->name('attachments.destroy');

        Route::get('/auth/check', CheckUserLoginController::class)->name('auth.check');

        Route::post('clone_project', CloneProjectController::class)->name('clone_project');

        Route::resource('issues.issue_comments', IssueCommentController::class);
        Route::resource('projects.issues', ProjectIssueController::class)->except('edit');

        // other index routes
        Route::get('/projects/assigned', [ProjectController::class,'assigned'])->name('projects.assigned');
        Route::get('/projects/office', [ProjectController::class,'office'])->name('projects.office');
        Route::get('/projects/own', [ProjectController::class,'own'])->name('projects.own');

        Route::get('/projects/{project}/compare', [ProjectController::class,'compare'])->name('projects.compare');
        Route::put('/projects/{project}/drop', [ProjectController::class,'drop'])->name('projects.drop');

        Route::get('/projects/{project}/settings', [ProjectController::class,'settings'])->name('projects.settings');
        Route::get('/projects/{project}/files', [ProjectController::class,'files'])->name('projects.files');
        Route::get('/projects/{project}/history', [ProjectController::class,'history'])->name('projects.history');

        // TRIP
        Route::get('/projects/{project}/trip', [TripController::class,'show'])->name('trips.show');
        Route::put('/projects/{project}/trip', [TripController::class,'update'])->name('trips.update');

        Route::post('/projects/{project}/clone', ProjectCloneController::class)->name('projects.clone');

        Route::post('/projects/{project}/togglePin',[ProjectController::class, 'togglePin'])->name('projects.togglePin');
        // Upload
        Route::post('/projects/{project}/upload', [ProjectController::class,'upload'])->name('projects.upload');

        Route::post('/projects/{uuid}/restore', [ProjectController::class,'restore'])->name('projects.restore');

        Route::post('/projects/{project}/endorse', [ProjectController::class,'endorse'])->name('reviews.endorse');

        Route::resource('projects.reviews', \App\Http\Controllers\ProjectReviewController::class);

        Route::get('/projects/clone', [ProjectController::class,'new_clone'])->name('projects.new_clone');
        Route::get('/projects/deleted', [ProjectController::class,'deleted'])->name('projects.deleted');
        Route::get('/projects/import', [ProjectImportController::class,'index'])->name('projects.import.index');
        Route::post('projects/import', [ProjectImportController::class,'import'])->name('projects.import.import');

        Route::put('/projects/{project}/invitations/{token}', [ProjectController::class,'accept_invite'])->name('projects.accept_invite');
        Route::get('/projects/{project}/invitations/{token}', [ProjectController::class,'view_invitation'])->name('projects.view_invitation');
        Route::get('/projects/{project}/generate_pdf', \App\Http\Controllers\ProjectGeneratePdfController::class)->name('projects.generatePdf');
        Route::get('/projects/{project}/exportJson', [ProjectController::class,'exportJson'])->name('projects.exportJson');
        Route::post('projects/checkAvailability', [ProjectController::class,'checkAvailability'])->name('projects.checkAvailability');
        Route::resource('projects', ProjectController::class);
        Route::resource('projects.pipols', \App\Http\Controllers\ProjectPipolController::class);

        Route::resource('reviews', \App\Http\Controllers\ReviewController::class)->except('store','create');
        Route::resource('subprojects', \App\Http\Controllers\SubprojectController::class);
        Route::post('/notifications', [\App\Http\Controllers\NotificationController::class,'markAllAsRead'])->name('notifications.markAllAsRead');
        Route::resource('notifications',\App\Http\Controllers\NotificationController::class)->only('index','show');
        Route::resource('pipols',\App\Http\Controllers\PipolController::class);
        Route::post('users/{user}/follow', [\App\Http\Controllers\UserController::class,'follow'])->name('users.follow');
        Route::put('users/{user}/update_username', [\App\Http\Controllers\UserController::class,'update_username'])->name('users.update_username');
        Route::put('users/{user}/update_name', [\App\Http\Controllers\UserController::class,'update_name'])->name('users.update_name');
        Route::put('users/{user}/upload_avatar', [\App\Http\Controllers\UserController::class,'upload_avatar'])->name('users.upload_avatar');
        Route::get('users/{user}/projects', [\App\Http\Controllers\UserController::class,'projects'])->name('users.projects');
        Route::resource('users', \App\Http\Controllers\UserController::class)->only('show','update');
        Route::get('/offices/{office}/projects', [\App\Http\Controllers\OfficeController::class,'projects'])->name('offices.projects');
        Route::get('/offices/{office}/users', [\App\Http\Controllers\OfficeController::class,'users'])->name('offices.users');
        Route::resource('offices',\App\Http\Controllers\OfficeController::class);
        Route::resource('trackers',\App\Http\Controllers\TrackerController::class);
        Route::resource('updating-periods',\App\Http\Controllers\UpdatingPeriodController::class);

        Route::resource('users.activities', \App\Http\Controllers\UserActivityController::class);

        Route::resource('collaborators', \App\Http\Controllers\CollaboratorController::class);

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

//        Route::resource('users.projects', \App\Http\Controllers\UserProjectController::class);

        // Admin routes
        Route::middleware(['admin'])->prefix('/admin')->name('admin.')->group(function () {
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
