<?php

declare(strict_types=1);

use Galaxy\App\Controllers\AuthController;
use Galaxy\App\Controllers\DashboardController;
use Galaxy\App\Controllers\HomeController;
use Galaxy\App\Controllers\NoteController;
use Galaxy\App\Middleware\AuthMiddleware;
use Galaxy\App\Middleware\CsrfMiddleware;
use Galaxy\App\Middleware\GuestMiddleware;
use Galaxy\App\Middleware\RateLimitMiddleware;

$router = $app->router();

$router->get('/', [HomeController::class, 'index'], name: 'home');
$router->get('/health', [HomeController::class, 'health'], name: 'health');

$router->get('/login', [AuthController::class, 'showLogin'], [GuestMiddleware::class], 'login');
$router->post('/login', [AuthController::class, 'login'], [GuestMiddleware::class, CsrfMiddleware::class, RateLimitMiddleware::class . ':login,8,60']);
$router->get('/register', [AuthController::class, 'showRegister'], [GuestMiddleware::class], 'register');
$router->post('/register', [AuthController::class, 'register'], [GuestMiddleware::class, CsrfMiddleware::class, RateLimitMiddleware::class . ':register,5,120']);
$router->post('/logout', [AuthController::class, 'logout'], [AuthMiddleware::class, CsrfMiddleware::class], 'logout');

$router->get('/dashboard', [DashboardController::class, 'index'], [AuthMiddleware::class], 'dashboard');

$router->get('/notes', [NoteController::class, 'index'], [AuthMiddleware::class], 'notes.index');
$router->get('/notes/create', [NoteController::class, 'create'], [AuthMiddleware::class], 'notes.create');
$router->post('/notes', [NoteController::class, 'store'], [AuthMiddleware::class, CsrfMiddleware::class], 'notes.store');
$router->get('/notes/{id}/edit', [NoteController::class, 'edit'], [AuthMiddleware::class], 'notes.edit');
$router->post('/notes/{id}', [NoteController::class, 'update'], [AuthMiddleware::class, CsrfMiddleware::class], 'notes.update');
$router->post('/notes/{id}/delete', [NoteController::class, 'delete'], [AuthMiddleware::class, CsrfMiddleware::class], 'notes.delete');
