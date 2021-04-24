<?php

return [
    'sidebar' => [
        'menu' => [
            'approval_levels' => [
                'icon'  => 'nav-icon far fa-circle',
                'title' => 'Approval Levels',
                'route' =>  'admin.approval_levels.index',
            ],
            'bases' => [
                'icon'  => 'nav-icon far fa-circle',
                'title' => 'Implementation Bases',
                'route' =>  'admin.bases.index',
            ],
            'cip_types' => [
                'icon'  => 'nav-icon far fa-circle',
                'title' => 'CIP Types',
                'route' =>  'admin.cip_types.index',
            ],
            'fs_statuses' => [
                'icon'  => 'nav-icon far fa-circle',
                'title' => 'FS Statuses',
                'route' =>  'admin.fs_statuses.index',
            ],
            'funding_institutions' => [
                'icon'  => 'nav-icon far fa-circle',
                'title' => 'Funding Institutions',
                'route' =>  'admin.funding_institutions.index',
            ],
        ],
    ],
];
