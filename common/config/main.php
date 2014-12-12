<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'shoppingCart' => [
            'class' => 'common\components\ShoppingCart'
        ],
        'mailFactory' => [
            'class' => 'common\components\MailFactory'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => 0,
            ],
        ],
        'session' => [
            'class' => 'yii\redis\Session',
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => 0,
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
    ],
];
