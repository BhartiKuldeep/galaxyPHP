<?php

declare(strict_types=1);

use Galaxy\Core\App;
use Galaxy\Core\Config;
use Galaxy\Core\Env;

require __DIR__ . '/autoload.php';

Env::load(base_path('.env'));

date_default_timezone_set((string) env('APP_TIMEZONE', 'UTC'));

$config = new Config([
    'app' => require base_path('config/app.php'),
    'security' => require base_path('config/security.php'),
    'storage' => require base_path('config/storage.php'),
]);

Config::setInstance($config);

return new App($config);
