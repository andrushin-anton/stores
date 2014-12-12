<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-acoolakids',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'acoolakids\controllers',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/check-code/<userId:\d+>/<code:\d+>' => 'site/check-code',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\EmailTarget',
                    'levels' => ['error', 'warning'],
                    'message' => [
                        'from' => ['log@acoolakids.ru'],
                        'to' => ['andrushin.anton@gmail.com'],
                        'subject' => 'Acoolakids errors and warnings',
                    ],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
