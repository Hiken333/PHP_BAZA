<?php

if (!function_exists('route')) {
    function route(string $name, array $params = []): string
    {
        global $app;
        if (isset($app)) {
            $url = $app->getRouter()->url($name, $params);
            if ($url !== null) {
                return $url;
            }
        }
        return '#';
    }
}

