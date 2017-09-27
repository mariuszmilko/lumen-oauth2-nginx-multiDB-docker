<?php

return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
        'api' => [
            'driver' => 'oauth2proxy',
            'provider' => 'users',
            'oauth2_host' => env('OAUTH2_HOST'),
            'oauth2_path' => env('OAUTH2_PATH')
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\User::class
        ]
    ]
];
