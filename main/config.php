<?php
return [
    'rootName' => '../',
    'name' => 'Мой магазин',
    'defaultControllerName' => 'good',

    'components' => [
        'bd' => [
            'class' => \App\services\BD::class,
            'config' => [
                'user' => 'root',
                'pass' => '',
                'driver' => 'mysql',
                'bd' => 'lessons',
                'host' => 'localhost',
                'charset' => 'UTF8',
            ]
        ],
        'userRepository' => [
            'class' => \App\models\repositories\UserRepository::class
        ],
        'goodRepository' => [
            'class' => \App\models\repositories\GoodRepository::class
        ],
        'orderRepository' => [
            'class' => \App\models\repositories\OrderRepository::class
        ]
    ],
];