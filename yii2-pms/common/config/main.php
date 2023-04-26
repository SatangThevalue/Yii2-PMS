<?php
return [
    'charset' => 'UTF-8',
    'language'=> 'th-TH',
    'sourceLanguage'=> 'th-TH',
    'timeZone' => 'Asia/Bangkok',
    'version' => '0.0.1(Dev)',
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
        'cache' => [
            // TODO(SaTangTheValue): Use redis Cache
            //'class' => \yii\caching\FileCache::class,
            'class' => 'yii\redis\Cache',
        ],
    ],
];
