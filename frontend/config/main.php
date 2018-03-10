<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php',
    require __DIR__ . '/container.php'
);

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    // 'timeZone' => 'Asia/Kuala_Lumpur',
    // 'homeUrl'=>['/site/index2'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'ms-MY',
    'sourceLanguage' => 'en-US',
    'container' => $container,
    'components' => [
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/language',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@frontend/views' => '@frontend/themes/adminlte/views',
                    // '@frontend/views' => '@frontend/themes/gentella/views',
                    // '@frontend/views' => '@vendor/yiister/yii2-gentelella/views',
                    // '@frontend/views' => '@frontend/themes/sbadmin2/views',
                    // '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'class' => 'common\components\User',
            'identityClass' => 'common\models\identity\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        // uncomment to use rbac
/*        'authManager' => [
            // use php file
            'class' => 'yii\rbac\PhpManager',
            'assignmentFile' => '@common/rbac/assignments.php'
            // use db
            // 'class' => 'yii\rbac\DbManager',
        ],*/
        'notify' => [
            'class' => 'common\components\Notify',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'app-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            // 'flushInterval' => 100,   // default is 1000
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    // 'exportInterval' => 100,  // default is 1000
                ],
                // uncomment to use db logger
/*                'db' => [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                ],*/
                // uncomment to use email logger
/*                'email' => [
                    'class' => 'yii\log\EmailTarget',
                    'levels' => ['error'],
                    'categories' => ['yii\db\*'],
                    'message' => [
                       'from' => ['log@example.com'],
                       'to' => ['admin@example.com', 'developer@example.com'],
                       'subject' => 'Database errors at example.com',
                    ],
                ],*/
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
/*        'assetManager' => [
            'appendTimestamp' => true,
           // 'forceCopy' => false,
        ],*/
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        // If you use tree table
        'treemanager' => [
            'class' => '\kartik\tree\Module',
        // see settings on http://demos.krajee.com/tree-manager#module
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module',
        ],
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
            'maxPageSize' => 200,
            'defaultPageSize' => 10,
            'dynaGridOptions' => [
                'showPersonalize'=>true,
                'storage' => kartik\dynagrid\DynaGrid::TYPE_SESSION,
                'gridOptions' => [],
                'matchPanelStyle' => false,
                'toggleButtonGrid' => [],
                'options' => [],
                'sortableOptions' => [],
                'userSpecific' => true,
                'columns' => [],
                'submitMessage' => Yii::t('kvdynagrid', 'Saving and applying configuration') . ' &hellip;',
                'deleteMessage' => Yii::t('kvdynagrid', 'Trashing all personalizations') . ' &hellip;',
                'deleteConfirmation' => Yii::t('kvdynagrid', 'Are you sure you want to delete the setting?'),
                'messageOptions' => [],
                'gridOptions'=>[
                    'filterSelector' => 'select[name="per-page"]',
                    'responsiveWrap'=>false,
                ],
            ],
        ],
    ],
    'params' => $params,
];

$config['bootstrap'] = ['log','common\components\Bootstrap','debug'];
$config['modules']['debug'] = ['class' => 'yii\debug\Module','allowedIPs' => ['*']]; //remove on production

return $config;
