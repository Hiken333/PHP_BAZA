<?php

use Monolog\Level;

return [
    'default' => 'single',
    'channels' => [
        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => Level::Debug->value,
        ],
    ],
];
