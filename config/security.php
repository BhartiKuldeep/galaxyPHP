<?php

return [
    'session_name' => env('SESSION_NAME', 'galaxy_session'),
    'session_secure' => filter_var(env('SESSION_SECURE', false), FILTER_VALIDATE_BOOLEAN),
    'session_same_site' => env('SESSION_SAME_SITE', 'Lax'),
    'csrf_key' => '_csrf_token',
    'rate_limit_window_seconds' => 60,
    'rate_limit_max_attempts' => 20,
    'password_cost' => 10,
];
