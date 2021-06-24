<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'stat' => [
            'class' => akiraz2\stat\Module::class,
            'googleAnalytics' => [ // false by default
                'id' => 'UA-131662756-3',
            ],
            'ownStat' => true, //false by default
            'ownStatCookieId' => 'yii2_counter_id', // 'yii2_counter_id' default
            'onlyGuestUsers' => true, // true default
            'countBot' => false, // false default
            'appId' => ['app-frontend'], // by default count visits only from Frontend App (in backend app we dont need it)
            'blackIpList' => [], // ['127.0.0.1'] by default

            // размещаем нашу админ панель на backend с проверкой доступа или ролями (здесь используется dektrium/user)
            'controllerMap' => [
                'dashboard' => [
                    'class' => 'akiraz2\stat\controllers\DashboardController',
                    'as access' => [
                        'class' => \yii\filters\AccessControl::class,
                        'rules' => [
                            [
                                'allow' => true,
                                'roles' => ['@'],
//                                'matchCallback' => function () {
//                                    return Yii::$app->user->identity->getIsAdmin();
//                                },
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
