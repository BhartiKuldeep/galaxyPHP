<?php

declare(strict_types=1);

use Galaxy\App\Controllers\Api\HealthController;
use Galaxy\App\Controllers\Api\NoteApiController;
use Galaxy\App\Middleware\AuthMiddleware;
use Galaxy\App\Middleware\RateLimitMiddleware;

$router = $app->router();

$router->get('/api/health', [HealthController::class, 'show'], [RateLimitMiddleware::class . ':api-health,60,60'], 'api.health');
$router->get('/api/notes', [NoteApiController::class, 'index'], [AuthMiddleware::class, RateLimitMiddleware::class . ':api-notes,60,60'], 'api.notes.index');
$router->post('/api/notes', [NoteApiController::class, 'store'], [AuthMiddleware::class, RateLimitMiddleware::class . ':api-notes-write,20,60'], 'api.notes.store');
