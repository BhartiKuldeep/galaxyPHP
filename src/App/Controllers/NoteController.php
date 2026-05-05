<?php

declare(strict_types=1);

namespace Galaxy\App\Controllers;

use Galaxy\App\Repositories\NoteRepository;
use Galaxy\Core\Auth;
use Galaxy\Core\Controller;
use Galaxy\Core\Request;
use Galaxy\Core\Response;
use Galaxy\Core\Session;
use Galaxy\Core\Validator;

final class NoteController extends Controller
{
    private NoteRepository $notes;

    public function __construct()
    {
        $this->notes = new NoteRepository();
    }

    public function index(Request $request): Response
    {
        $user = Auth::user();

        return $this->view('notes/index', [
            'title' => 'My Notes',
            'notes' => $this->notes->forUser($user['id']),
        ]);
    }

    public function create(Request $request): Response
    {
        return $this->view('notes/form', [
            'title' => 'Create Note',
            'note' => null,
            'action' => '/notes',
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
            Session::flash('errors', $validator->errors());
            Session::old($data);
            return $this->redirect('/notes/create');
        }

        $user = Auth::user();
        $this->notes->create($user['id'], (string) $data['title'], (string) $data['body'], (string) $data['status']);
        Session::flash('success', 'Note created.');

        return $this->redirect('/notes');
    }

    public function edit(Request $request): Response
    {
        $user = Auth::user();
        $note = $this->notes->findForUser((string) $request->route('id'), $user['id']);

        if (!$note) {
            return Response::html(view('errors/404', ['title' => 'Note Not Found']), 404);
        }

        return $this->view('notes/form', [
            'title' => 'Edit Note',
            'note' => $note,
            'action' => '/notes/' . $note['id'],
        ]);
    }

    public function update(Request $request): Response
    {
        $data = $request->only(['title', 'body', 'status']);
        $validator = Validator::make($data, [
            'title' => 'required|min:3|max:120',
            'body' => 'required|min:3|max:5000',
        ]);

        $id = (string) $request->route('id');

        if ($validator->fails()) {
            Session::flash('errors', $validator->errors());
            Session::old($data);
            return $this->redirect('/notes/' . $id . '/edit');
        }

        $user = Auth::user();
        $updated = $this->notes->update($id, $user['id'], $data);

        if (!$updated) {
            return Response::html(view('errors/404', ['title' => 'Note Not Found']), 404);
        }

        Session::flash('success', 'Note updated.');
        return $this->redirect('/notes');
    }

    public function delete(Request $request): Response
    {
        $user = Auth::user();
        $this->notes->delete((string) $request->route('id'), $user['id']);
        Session::flash('success', 'Note deleted.');

        return $this->redirect('/notes');
    }
}
