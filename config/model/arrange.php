<?php

return [

/*
 * Modules .
 */
    'modules'  => ['work_arrange'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'work_arrange'     => [
        'model'        => 'App\Models\WorkArrange',
        'table'        => 'work_arranges',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['date','work_time_id', 'employee_group_id'],
        'translate'    => [],
        'upload_folder' => '/',
        'encrypt'      => ['id'],
        'revision'     => [],
        'perPage'      => '20',
        'search'        => [

        ],
        'type' => [

        ]
    ],
    'employee_group'     => [
        'model'        => 'App\Models\EmployeeGroup',
        'table'        => 'employee_groups',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['name'],
        'translate'    => [],
        'upload_folder' => '/',
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [

        ],
        'type' => [

        ]
    ],
    'employee'     => [
        'model'        => 'App\Models\Employee',
        'table'        => 'employees',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['name','employee_group_id'],
        'translate'    => [],
        'upload_folder' => '/banner',
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [

        ],
        'type' => [

        ]
    ],
    'work_time'     => [
        'model'        => 'App\Models\WorkTime',
        'table'        => 'work_time',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['name','start_time', 'end_time'],
        'translate'    => [],
        'upload_folder' => '/banner',
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [

        ],
        'type' => [

        ]
    ],
];
