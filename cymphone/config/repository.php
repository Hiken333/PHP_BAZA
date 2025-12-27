<?php

use Cymphone\Support\Env;

$basePath = dirname(__DIR__);

return [
    'type' => Env::get('REPOSITORY_TYPE', 'mysql'),
    'storage' => [
        'file' => Env::get('STORAGE_FILE_PATH', $basePath . '/storage/app/tasks.json'),
    ],
];

