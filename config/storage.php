<?php

return [
    'path' => env('STORAGE_PATH', 'storage'),
    'users_file' => 'data/users.json',
    'notes_file' => 'data/notes.json',
    'rate_limit_file' => 'cache/rate-limits.json',
    'app_log' => 'logs/app.log',
];
