<?php

return [
    'name' => env('APP_NAME', 'GalaxyPHP'),
    'env' => env('APP_ENV', 'production'),
    'debug' => filter_var(env('APP_DEBUG', false), FILTER_VALIDATE_BOOLEAN),
    'url' => rtrim((string) env('APP_URL', 'http://127.0.0.1:8080'), '/'),
    'timezone' => env('APP_TIMEZONE', 'UTC'),
];
