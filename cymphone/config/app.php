<?php

use Cymphone\Support\Env;

return [
    'name' => Env::get('APP_NAME', 'Cymphone'),
    'env' => Env::get('APP_ENV', 'production'),
    'debug' => (bool) Env::get('APP_DEBUG', false),
    'url' => Env::get('APP_URL', 'http://localhost'),
    'timezone' => 'UTC',
];

