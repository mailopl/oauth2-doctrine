<?php
$driverClass = class_exists('Doctrine\DBAL\Driver\PDOSqlite\Driver') ?
    'Doctrine\DBAL\Driver\PDOSqlite\Driver' :
    'Doctrine\DBAL\Driver\PDO\Sqlite\Driver'
;

return [
    'api-tools-mvc-auth' => [
        'authentication' => [
            'adapters' => [
                'oauth2_doctrine' => [
                    'adapter' => 'Laminas\\ApiTools\\MvcAuth\\Authentication\\OAuth2Adapter',
                    'storage' => [
                        'storage' => 'oauth2.doctrineadapter.default',
                    ],
                ],
            ],
            'map' => [
                'Api\\V1' => 'oauth2_doctrine',
            ],
        ],
    ],

    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => $driverClass,
                'params' => [
                    'memory' => 'true',
                ],
            ],
        ],
    ],
];