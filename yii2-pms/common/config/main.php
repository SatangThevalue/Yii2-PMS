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
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
];
