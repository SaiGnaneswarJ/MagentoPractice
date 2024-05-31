<?php
return [
    'backend' => [
        'frontName' => 'admin_10rtxw'
    ],
    'cache' => [
        'graphql' => [
            'id_salt' => 'vXIiQmwqIHp9r1cHTSQPLfGTI13esyxI'
        ],
        'frontend' => [
            'default' => [
                'id_prefix' => 'fdc_'
            ],
            'page_cache' => [
                'id_prefix' => 'fdc_'
            ]
        ],
        'allow_parallel_generation' => false
    ],
    'remote_storage' => [
        'driver' => 'file'
    ],
    'queue' => [
        'amqp' => [
            'host' => 'localhost',
            'port' => '5672',
            'user' => 'Saignaneswar',
            'password' => 'kspl@1234',
            'virtualhost' => '/'
        ]
    ],
    'crypt' => [
        'key' => '334cddafa3c46ead9df879855e646c13'
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'localhost',
                'dbname' => 'magento_practice',
                'username' => 'saignaneswarj',
                'password' => 'Gnaneswar@2002',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'files'
    ],
    'lock' => [
        'provider' => 'db'
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1
    ],
    'downloadable_domains' => [
        'sai.magento246.com'
    ],
    'install' => [
        'date' => 'Tue, 20 Feb 2024 06:02:27 +0000'
    ]
];
