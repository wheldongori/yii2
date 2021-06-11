<?php
return [
    'id' => 'app-backend-tests',
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        // 'urlManager' => [
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        // ],
        'request' => [
            'cookieValidationKey' => 'test',
        ],
        'db' => [
            'dsn' => 'mysql:host=127.0.0.1;dbname=yii2advanced_test',
        ],
    ],
];
