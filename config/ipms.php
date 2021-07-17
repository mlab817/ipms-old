<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Global Model Permissions
    |--------------------------------------------------------------------------
    |
    | These values restrict the ability of users in a global manner.
    | They are evaluated before the policies are run to ensure that
    | the application is accepting CRUD. Useful to disable CRUD
    | once the System closes.
    */
    'email'                 => env('IPMS_EMAIL',''),
    'contact_info'          => env('IPMS_CONTACT_INFO', ''),
    'allow_google_login'    => env('ALLOW_GOOGLE_LOGIN', false),
    'allow_multiple_login'  => env('ALLOW_MULTIPLE_LOGIN', false),
    'ipms_manual_url'       => env('IPMS_MANUAL_URL',''),
    'force_delete'          => env('IPMS_FORCE_DELETE', false),
    'require_activation'    => env('IPMS_REQUIRE_ACTIVATION', true),
    'permissions' => [
        'projects' => [
            'create'        => true,
            'update'        => true,
            'delete'        => true,
            'restore'       => true,
            'forceDelete'   => true,
            'endorse'       => true,
            'drop'          => true,
        ],
    ],
    'editor' => [
        'years' => [
            '2016',
            '2017',
            '2018',
            '2019',
            '2020',
            '2021',
            '2022',
            '2023',
            '2024',
            '2025',
            '2026',
            '2027',
            '2028',
            '2029',
        ],
    ],
    // Used to seed permissions
    'allPermissions' => [
        'projects.create',
        'projects.view_any',
        'projects.update_any',
        'projects.delete_any',
        'projects.view_office',
        'projects.update_office',
        'projects.delete_office',
        'projects.view_assigned',
        'projects.view_own', // to show index of users projects
        'projects.import',
        'reviews.create',
        'reviews.view_index',
        'reviews.view_office',
        'reviews.view_any',
        'reviews.update_office',
        'reviews.update_any',
        'reviews.delete_office',
        'reviews.delete_any',
        'libraries.create',
        'libraries.view',
        'libraries.update',
        'libraries.delete',
        'libraries.view_index',
        'users.create',
        'users.view',
        'users.update',
        'users.delete',
        'users.view_index',
        'roles.view_index',
        'roles.create',
        'roles.view',
        'roles.update',
        'roles.delete',
        'permissions.view_index',
        'permissions.create',
        'permissions.view',
        'permissions.update',
        'permissions.delete',
        'projects.manage',
        'teams.view_index',
        'teams.create',
        'teams.view',
        'teams.update',
        'teams.delete',
        'audit_logs.view_index',
        'audit_logs.create',
        'audit_logs.view',
        'audit_logs.update',
        'audit_logs.delete',
        'exports.view_index',
    ],
    'v1' => env('IPMS_V1_URL', ''),
    'system_user'   => [
        'name'      => 'System',
        'avatar'    => config('app.asset_url') .'/images/system.png',
    ],
    'pipol_base_url' => 'http://pipolv2.neda.gov.ph/editproject/',
    'current_updating_period' => env('IPMS_CURRENT_UPDATING_PERIOD', 1),
];
