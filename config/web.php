<?php

$params = require(__DIR__ . '/params.php');
//print_r($_SERVER['DOCUMENT_ROOT'].'cache/');exit();

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'aliases' => ['@module1' => 'modules'],
    'bootstrap' => ['log', 'autorize'],
    'modules' => ['test' => ['class' => 'app\modules\test\Module'],
                  'admin' => ['class' => 'app\modules\admin\Module','defaultRoute' => 'admin'],
                  'autorize' => ['class' => 'app\modules\autorize\Module'],
                  'active_form' => ['class' => 'app\modules\active_form\Module','defaultRoute' => 'form'],
                   'events' => ['class' => 'app\modules\events\Module']
                  ],
    'components' => [

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,

            'rules' => [
                [
                    'pattern' => '<controller>/<action>/<id:\d+>/<version:\d+>',
                    'route' => '<controller>/<action>',
                    'suffix' => ''
                ],
                [
                    'pattern' => '<controller>/<action>',
                    'route' => '<controller>/<action>',
                    'suffix' => '.php'
                ],
                [
                    'pattern' => '<module>/<controller>/<action>/<id:\d+>/<version:\d+>',
                    'route' => '<module>/<controller>/<action>',
                    'suffix' => ''
                ],
                [
                    'pattern' => '<module>/<controller>/<action>',
                    'route' => '<module>/<controller>/<action>',
                    'suffix' => '.php'
                ],
                [
                    'pattern' => '<module>/<controller>/<action>/<id:\d+>/',
                    'route' => '<module>/<controller>/<action>'
                ]
            ],
            'cache' =>[
                'class' => 'yii\caching\FileCache',
                'cachePath' => $_SERVER['DOCUMENT_ROOT'] . '/cache/',
            ]
        ],



        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '_9LCsN0TI0OU9wnmY4KFvU3WsleDY2UH',
            'baseUrl'=> '/web/'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning','trace', 'profile', 'info'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['bootstrap'][] = 'gii';
    

    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',

    ];


    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

}

return $config;
