<?php

return [
    'default' => 'transactions',
    'migrations' => 'migrations',
    'connections' => [
        'transactions' => [
            'driver'    => env('DB_TRANS_DRIVER'),
            'host'      => env('DB_TRANS_HOST'),
            'database'  => env('DB_TRANS_DATABASE'),
            'username'  => env('DB_TRANS_USERNAME'),
            'password'  => env('DB_TRANS_PASSWORD'),
            'charset'   => env('DB_TRANS_CHARSET'),
            'collation' => env('DB_TRANS_COLLATION'),
            'prefix'    => env('DB_TRANS_PREFIX'),
            'strict'    => env('DB_TRANS_STRICT'),
        ]
    ],
];
