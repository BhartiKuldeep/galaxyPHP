<?php

declare(strict_types=1);

namespace Galaxy\App\Controllers;

use Galaxy\Core\Controller;
use Galaxy\Core\Request;
use Galaxy\Core\Response;

final class HomeController extends Controller
{
    public function index(Request $request): Response
    {
        return $this->view('home', [
            'title' => 'GalaxyPHP - Build PHP apps faster',
        ]);
    }

    public function health(Request $request): Response
    {
        return $this->json([
            'status' => 'ok',
            'app' => config('app.name'),
            'time' => date(DATE_ATOM),
        ]);
    }
}
