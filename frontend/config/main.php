<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'view' => [
            'class' => 'frontend\components\View',
            'defaultTheme' => 'desktop',
            'themes' => [
                'desktop' => [
                    'pathMap' => [
                        '@app/views' => '@app/themes/desktop',
                        '@app/widgets/views' => '@app/themes/desktop/widgets'
                    ],
                    'baseUrl' => '@web/themes/desktop',
                ],
                'mobile' => [
                    'pathMap' => [
                        '@app/views' => '@app/themes/mobile',
                        '@app/widgets/views' => '@app/themes/mobile/widgets'
                    ],
                    'baseUrl' => '@web/themes/mobile',
                ]
            ],
        ],
    ],
    'params' => $params,
];
