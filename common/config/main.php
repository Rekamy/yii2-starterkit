<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 'authManager' => [
        //     'class' => 'yii\rbac\DbManager',
        //     // 'cache' => 'cache',
        // ],
        // 'log' => ['class' => 'yii\log\Dispatcher'],
        'formatter' => ['class' => 'yii\i18n\Formatter'],
        'i18n' => ['class' => 'yii\i18n\I18N'],
        // 'mailer' => ['class' => 'yii\swiftmailer\Mailer'],
        'urlManager' => ['class' => 'yii\web\UrlManager'],
        'assetManager' => ['class' => 'yii\web\AssetManager'],
        // 'security' => ['class' => 'yii\base\Security'],
    ],
];
