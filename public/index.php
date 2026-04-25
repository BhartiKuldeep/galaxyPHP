<?php

declare(strict_types=1);

use Galaxy\Core\Request;
use Galaxy\Core\Response;
use Galaxy\Core\Session;

$app = require dirname(__DIR__) . '/bootstrap/app.php';

require base_path('routes/web.php');
require base_path('routes/api.php');

try {
    $request = Request::capture();
    $response = $app->router()->dispatch($request);
} catch (Throwable $exception) {
    error_log($exception->getMessage());

    $debug = (bool) config('app.debug', false);
    $message = $debug ? $exception->getMessage() : 'Something went wrong.';

    $response = Response::html(view('errors/500', [
        'title' => 'Server Error',
        'message' => $message,
        'trace' => $debug ? $exception->getTraceAsString() : null,
    ]), 500);
}

Session::ageFlashData();
$response->send();
