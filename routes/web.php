<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\ProjectUserController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\PasswordChangeController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\BaseProjectController;
use App\Http\Controllers\CheckUserLoginController;
use App\Http\Controllers\CloneProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadJsonController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExportProjectsAsJsonController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\IssueCommentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PendingTransferController;
use App\Http\Controllers\PipolController;
use App\Http\Controllers\ProjectAttachmentController;
use App\Http\Controllers\ProjectCloneController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectImportController;
use App\Http\Controllers\ProjectIssueController;
use App\Http\Controllers\ProjectNotificationController;
use App\Http\Controllers\ProjectPipolController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubprojectController;
use App\Http\Controllers\SwitchRoleController;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
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

    Route::resource('base-projects', BaseProjectController::class);
    Route::resource('base-projects.branch', \App\Http\Controllers\BaseProjectBranchController::class)->shallow();

    Route::post('password/change', [PasswordChangeController::class,'update'])->name('change_password_update');
    Route::get('password/change', [PasswordChangeController::class,'index'])->name('change_password_index');

    Route::post('/switchRole', SwitchRoleController::class)->name('roles.switch');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/account/logins', [AccountController::class,'logins'])->name('account.logins');

    Route::post('/auth/password/change', ChangePasswordController::class)->name('password.change');

    Route::resource('project_notifications', ProjectNotificationController::class);

    // auth routes with registration disabled

    Route::resource('pending_transfers', PendingTransferController::class);

    Route::middleware('can:projects.manage')->prefix('/admin')->name('admin.')->group(function() {
        Route::resource('projects', AdminProjectController::class);
        Route::resource('projects.users', ProjectUserController::class);
        Route::post('/projects/{project}/change_owner', [AdminProjectController::class,'changeOwnerPost'])->name('projects.changeOwner.post');
        Route::get('/projects/{project}/change_owner', [AdminProjectController::class,'changeOwner'])->name('projects.changeOwner.get');
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

    Route::get('/projects/{project}/clones/{uuid?}', [ProjectCloneController::class,'show'])->name('projects.clones.show');
    Route::resource('projects.clones', ProjectCloneController::class)->only('show','store');

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
    Route::resource('projects.pipols', ProjectPipolController::class);

    Route::resource('members', MemberController::class)->only('destroy');
    Route::get('/offices/{office}/members/invitation', [MemberController::class, 'invitation'])->name('offices.members.invitation');
    Route::resource('offices.members', MemberController::class)->shallow();

    Route::resource('reviews', ReviewController::class)->except('store','create');
    Route::resource('subprojects', SubprojectController::class);
    Route::post('/notifications', [NotificationController::class,'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::resource('notifications', NotificationController::class)->only('index','show');
    Route::resource('pipols', PipolController::class);
    Route::post('users/{user}/follow', [UserController::class,'follow'])->name('users.follow');
    Route::put('users/{user}/update_username', [UserController::class,'update_username'])->name('users.update_username');
    Route::put('users/{user}/update_name', [UserController::class,'update_name'])->name('users.update_name');
    Route::put('users/{user}/upload_avatar', [UserController::class,'upload_avatar'])->name('users.upload_avatar');
    Route::get('users/{user}/projects', [UserController::class,'projects'])->name('users.projects');
    Route::get('users/{user}/settings', [UserController::class,'settings'])->name('users.settings');
    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::resource('users', UserController::class)->only('show','update');
    Route::get('/offices/{office}/projects', [OfficeController::class,'projects'])->name('offices.projects');
    Route::get('/offices/{office}/users', [OfficeController::class,'users'])->name('offices.users');
    Route::resource('offices', OfficeController::class);
    Route::resource('trackers', TrackerController::class);

    Route::resource('users.activities', \App\Http\Controllers\UserActivityController::class);

    Route::resource('collaborators', \App\Http\Controllers\CollaboratorController::class);

    Route::group(['prefix' => 'reports'], function() {
        Route::get('/', [ReportController::class,'index'])->name('reports.index');
        Route::get('/implementation_modes', [ReportController::class,'implementation_modes'])->name('reports.implementation_modes');
        Route::get('/offices', [ReportController::class,'offices'])->name('reports.offices');
        Route::get('/spatial_coverages', [ReportController::class,'spatial_coverages'])->name('reports.spatial_coverages');
        Route::get('/regions', [ReportController::class,'regions'])->name('reports.regions');
        Route::get('/funding_sources', [ReportController::class,'funding_sources'])->name('reports.funding_sources');
        Route::get('/tiers', [ReportController::class,'tiers'])->name('reports.tiers');
        Route::get('/pap_types', [ReportController::class,'pap_types'])->name('reports.pap_types');
        Route::get('/pdp_chapters', [ReportController::class,'pdp_chapters'])->name('reports.pdp_chapters');
        Route::get('/project_statuses', [ReportController::class,'project_statuses'])->name('reports.project_statuses');
    });

    Route::resource('links',\App\Http\Controllers\Admin\LinkController::class)->only('index');

    Route::resource('audit_logs',\App\Http\Controllers\AuditLogController::class)->only('index','show');

    Route::middleware('can:exports.view_index')->prefix('/exports')->name('exports.')->group(function() {
        Route::get('',[ExportController::class,'index'])->name('index');
        Route::get('/fs_infrastructures',[ExportController::class,'fs_infrastructures'])->name('fs_infrastructures');
        Route::get('/fs_investments',[ExportController::class,'fs_investments'])->name('fs_investments');
        Route::get('/region_investments',[ExportController::class,'region_investments'])->name('region_investments');
        Route::get('/regions',[ExportController::class,'regions'])->name('regions');
        Route::get('/ten_point_agendas',[ExportController::class,'ten_point_agendas'])->name('ten_point_agendas');
        Route::get('/sdgs', [ExportController::class,'sdgs'])->name('sdgs');
        Route::get('/projects', [ExportController::class,'projects'])->name('projects');
    });

    Route::post('search', [SearchController::class,'search'])->name('search');
    Route::resource('search', SearchController::class)->only('index');

//        Route::resource('users.projects', \App\Http\Controllers\UserProjectController::class);

    // Admin routes
    Route::middleware(['admin'])->prefix('/admin')->name('admin.')->group(function () {
        Route::post('offices/export',[\App\Http\Controllers\Admin\OfficeController::class,'index'])->name('offices.export');
    });

    Route::resource('settings', SettingController::class);

});

Auth::routes();

Route::group(['middleware' => 'guest'], function() {
    Route::resource('invitations', InvitationController::class)->only('update');
    Route::get('/auth/google', [SocialLoginController::class,'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [SocialLoginController::class,'handleGoogleCallback'])->name('auth.google-callback');
});

Route::get('/downloadJson/{filename}', DownloadJsonController::class)->name('projects.downloadJson');
Route::get('/exportJson', ExportProjectsAsJsonController::class)->name('projects.json');

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

Route::get('/nanoid', function () {
    return nanoid();
});
