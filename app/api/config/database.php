<?php

return [
    'default' => env('DB_TRANS_MANAGERNAME'),
    'migrations' => 'migrations',
    'connections' => [
        env('DB_TRANS_MANAGERNAME') => [
            'managername' => env('DB_TRANS_MANAGERNAME'),
            'driver'    => env('DB_TRANS_DRIVER'),
            'host'      => env('DB_TRANS_HOST'),
            'database'  => env('DB_TRANS_DATABASE'),
            'username'  => env('DB_TRANS_USERNAME'),
            'password'  => env('DB_TRANS_PASSWORD'),
            'charset'   => env('DB_TRANS_CHARSET'),
            'collation' => env('DB_TRANS_COLLATION'),
            'prefix'    => env('DB_TRANS_PREFIX'),
            'strict'    => env('DB_TRANS_STRICT'),
        ],

        env('DB_API_CONTRACT_MANAGERNAME') => [
            'managername' => env('DB_API_CONTRACT_MANAGERNAME'),
            'driver'    => env('DB_API_CONTRACT_DRIVER'),
            'host'      => env('DB_API_CONTRACT_HOST'),
            'database'  => env('DB_API_CONTRACT_DATABASE'),
            'username'  => env('DB_API_CONTRACT_USERNAME'),
            'password'  => env('DB_API_CONTRACT_PASSWORD'),
            'charset'   => env('DB_API_CONTRACT_CHARSET'),
            'collation' => env('DB_API_CONTRACT_COLLATION'),
            'prefix'    => env('DB_API_CONTRACT_PREFIX'),
            'strict'    => env('DB_API_CONTRACT_STRICT'),
        ],

        env('DB_API_POLICIES_MANAGERNAME') => [
            'managername' => env('DB_API_POLICIES_MANAGERNAME'),
            'driver'    => env('DB_API_POLICIES_DRIVER'),
            'host'      => env('DB_API_POLICIES_HOST'),
            'database'  => env('DB_API_POLICIES_DATABASE'),
            'username'  => env('DB_API_POLICIES_USERNAME'),
            'password'  => env('DB_API_POLICIES_PASSWORD'),
            'charset'   => env('DB_API_POLICIES_CHARSET'),
            'collation' => env('DB_API_POLICIES_COLLATION'),
            'prefix'    => env('DB_API_POLICIES_PREFIX'),
            'strict'    => env('DB_API_POLICIES_STRICT'),
        ],

        'content' => [
            'driver'    => env('DB_TRANS_DRIVER'),
            'host'      => env('DB_TRANS_HOST'),
            'database'  => env('DB_TRANS_DATABASE'),
            'username'  => env('DB_TRANS_USERNAME'),
            'password'  => env('DB_TRANS_PASSWORD'),
            'charset'   => env('DB_TRANS_CHARSET'),
            'collation' => env('DB_TRANS_COLLATION'),
            'prefix'    => env('DB_TRANS_PREFIX'),
            'strict'    => env('DB_TRANS_STRICT'),
        ],
    ],
];
