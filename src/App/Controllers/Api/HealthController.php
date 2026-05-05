<?php

declare(strict_types=1);

namespace Galaxy\App\Controllers\Api;

use Galaxy\Core\Controller;
use Galaxy\Core\Request;
use Galaxy\Core\Response;

final class HealthController extends Controller
{
    public function show(Request $request): Response
    {
        return $this->json([
            'status' => 'ok',
            'app' => config('app.name'),
            'environment' => config('app.env'),
            'timestamp' => date(DATE_ATOM),
        ]);
    }
}
