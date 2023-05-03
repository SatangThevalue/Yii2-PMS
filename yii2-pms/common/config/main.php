<?php
return [
    'charset' => 'UTF-8',
    'language' => 'th-TH',
    'sourceLanguage' => 'th-TH',
    'timeZone' => 'Asia/Bangkok',
    'version' => '0.0.1(Dev)',
    // in your module configuration you can have 'gridviewKrajee' as another module
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            // your other grid module settings
        ],
        'gridviewKrajee' =>  [
            'class' => '\kartik\grid\Module',
            // your other grid module settings
        ]
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        // TODO(SaTangTheValue): config redis Connection
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'redis',
            'port' => 6379,
            'database' => 0,
        ],
        // TODO(SaTangTheValue): config PrettyUrl
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'module/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ),
        ],
        // TODO(SaTangTheValue): config redis Session
        'session' => [
            'class' => 'yii\redis\Session',
        ],
        'cache' => [
            // TODO(SaTangTheValue): Use redis Cache
            //'class' => \yii\caching\FileCache::class,
            'class' => 'yii\redis\Cache',
        ],
    ],
];
