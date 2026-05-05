<?php

declare(strict_types=1);

namespace Galaxy\App\Controllers\Api;

use Galaxy\App\Repositories\NoteRepository;
use Galaxy\Core\Auth;
use Galaxy\Core\Controller;
use Galaxy\Core\Request;
use Galaxy\Core\Response;
use Galaxy\Core\Validator;

final class NoteApiController extends Controller
{
    public function index(Request $request): Response
    {
        $user = Auth::user();

        return $this->json([
            'data' => (new NoteRepository())->forUser($user['id']),
        ]);
    }

    public function store(Request $request): Response
    {
        $data = $request->only(['title', 'body', 'status']);
        $validator = Validator::make($data, [
            'title' => 'required|min:3|max:120',
            'body' => 'required|min:3|max:5000',
        ]);

        if ($validator->fails()) {
            return $this->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();
        $note = (new NoteRepository())->create($user['id'], (string) $data['title'], (string) $data['body'], (string) ($data['status'] ?? 'draft'));

        return $this->json(['data' => $note], 201);
    }
}
