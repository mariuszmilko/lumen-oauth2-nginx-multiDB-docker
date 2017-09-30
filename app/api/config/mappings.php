<?php

return [
    'Contract' => [
        'type'   => 'entity',
        'table'  => 'contracts',
        'id'     => [
            'id' => [
                'type'     => 'integer',
                'generator' => [
                    'strategy' => 'auto'
                ]
            ]
        ],
        'fields' => [
            'name' => [
                'type' => 'string'
            ]
        ],
        'oneToMany' => [
            'products' => [ 
                 'targetEntity' => 'Product',
                 'mappedBy' => 'contract'
             ]  
        ]  
    ],
    'Product' => [
        'type'   => 'entity',
        'table'  => 'products',
        'id'     => [
            'id' => [
                'type'     => 'integer',
                'generator' => [
                    'strategy' => 'auto'
                ]
            ]
        ],
        'fields' => [
            'name' => [
                'type' => 'string'
            ],
            'contract_id' => [
                'type' => 'integer'
            ]
        ],
       'manyToOne' => [
           'contract' => [
               'targetEntity' => 'Contract',
               'inversedBy' => 'products',
               'joinColumn' => [
                    'name' => 'contract_id',
                    'referencedColumnName' => 'id'
                ]
            ]
        ]           
    ]
];
