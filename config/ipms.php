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
    'permissions' => [
        'projects' => [
            'create'        => true,
            'update'        => true,
            'delete'        => true,
            'restore'       => true,
            'forceDelete'   => true,
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
        ],
    ],
];
