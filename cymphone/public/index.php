<?php

session_start();

define('CYMPHONE_START', microtime(true));

require __DIR__ . '/../vendor/autoload.php';

// Загрузка переменных окружения из .env файла
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    \Cymphone\Support\Env::load($envFile);
}

require __DIR__ . '/../helpers.php';

try {
    $app = require __DIR__ . '/../bootstrap/app.php';
    $GLOBALS['app'] = $app;

    require __DIR__ . '/../routes/web.php';

    $request = new \Cymphone\Http\Request();
    $response = $app->handleRequest($request);
    $response->send();
} catch (\Throwable $e) {
    // Обработка ошибок
    http_response_code(500);
    
    $appDebug = \Cymphone\Support\Env::get('APP_DEBUG', false);
    
    if ($appDebug === 'true' || $appDebug === true) {
        echo "<h1>Ошибка приложения</h1>";
        echo "<p><strong>Сообщение:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<p><strong>Файл:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
        echo "<p><strong>Строка:</strong> " . $e->getLine() . "</p>";
        echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    } else {
        echo "Произошла ошибка. Обратитесь к администратору.";
    }
    
    error_log("Cymphone Error: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine());
}

