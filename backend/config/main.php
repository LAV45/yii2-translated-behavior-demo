<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'post',
    'homeUrl' => '/admin',
    'components' => [
        'assetManager' => [
            'linkAssets' => true,
        ],
        'request' => [
            'baseUrl' => '/admin',
        ],
        'urlManager' => [
            'showScriptName'  => false,
            'enablePrettyUrl' => true,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'as access' => [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'controllers' => ['site'],
                'actions' => ['login', 'error'],
                'allow' => true,
            ],
            [
                'roles' => ['@'],
                'allow' => true,
            ],
        ],
    ],
    'params' => $params,
];
