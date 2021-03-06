<?php

use yii\swiftmailer\Mailer;
use yii\web\CacheSession;
use yii\caching\MemCache;
use yii\web\UrlManager;
use lav45\translate\web\UrlRule;

return [
    'vendorPath' => $root . '/vendor',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@yii2Docs' => $root . '/../yii2/docs',
    ],
    'components' => [
        'cache' => [
            'class' => MemCache::class,
        ],
        'session' => [
            'class' => CacheSession::class
        ],
        'formatter' => [
            'timeFormat' => 'H:mm',
            'dateFormat' => 'dd.MM.yyyy',
            'datetimeFormat' => 'dd.MM.yyyy H:mm',
        ],
        'mailer' => [
            'class' => Mailer::class,
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => ['noreply@lav45.com' => 'yii2-translated-behavior.lav45.com'],
            ],
        ],
        'frontendUrlManager' => [
            'class' => UrlManager::class,
            'baseUrl' => '',
            'hostInfo' => 'https://yii2-translated-behavior.lav45.com',
            'scriptUrl' => '/index.php',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'ruleConfig' => ['class' => UrlRule::class],
            'rules' => require __DIR__ . '/../../frontend/config/url_rules.php',
        ],
    ],
];
