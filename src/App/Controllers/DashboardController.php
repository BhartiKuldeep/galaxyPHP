<?php

declare(strict_types=1);

namespace Galaxy\App\Controllers;

use Galaxy\App\Repositories\NoteRepository;
use Galaxy\Core\Auth;
use Galaxy\Core\Controller;
use Galaxy\Core\Request;
use Galaxy\Core\Response;

final class DashboardController extends Controller
{
    public function index(Request $request): Response
    {
        $user = Auth::user();
        $repository = new NoteRepository();

        return $this->view('dashboard', [
            'title' => 'Dashboard',
            'user' => $user,
            'stats' => $repository->stats($user['id']),
            'recentNotes' => array_slice($repository->forUser($user['id']), 0, 5),
        ]);
    }
}
