<?php

declare(strict_types=1);

namespace Galaxy\App\Controllers;

use Galaxy\App\Repositories\UserRepository;
use Galaxy\Core\Auth;
use Galaxy\Core\Controller;
use Galaxy\Core\Request;
use Galaxy\Core\Response;
use Galaxy\Core\Session;
use Galaxy\Core\Validator;

final class AuthController extends Controller
{
    public function showLogin(Request $request): Response
    {
        return $this->view('auth/login', ['title' => 'Login']);
    }

    public function login(Request $request): Response
    {
        $data = $request->only(['email', 'password']);
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            Session::flash('errors', $validator->errors());
            Session::old($data);
            return $this->redirect('/login');
        }

        if (!Auth::attempt((string) $data['email'], (string) $data['password'])) {
            Session::flash('error', 'Invalid email or password.');
            Session::old(['email' => $data['email']]);
            return $this->redirect('/login');
        }

        Session::flash('success', 'Welcome back!');
        return $this->redirect('/dashboard');
    }

    public function showRegister(Request $request): Response
    {
        return $this->view('auth/register', ['title' => 'Register']);
    }

    public function register(Request $request): Response
    {
        $data = $request->only(['name', 'email', 'password', 'password_confirmation']);
        $validator = Validator::make($data, [
            'name' => 'required|min:2|max:80',
            'email' => 'required|email|max:120',
            'password' => 'required|min:6|confirmed',
        ]);

        $repository = new UserRepository();

        if ($repository->findByEmail((string) $data['email'])) {
            Session::flash('errors', ['email' => ['This email is already registered.']]);
            Session::old($data);
            return $this->redirect('/register');
        }

        if ($validator->fails()) {
            Session::flash('errors', $validator->errors());
            Session::old($data);
            return $this->redirect('/register');
        }

        $user = $repository->create((string) $data['name'], (string) $data['email'], (string) $data['password']);
        Auth::login($user['id']);
        Session::flash('success', 'Account created successfully.');

        return $this->redirect('/dashboard');
    }

    public function logout(Request $request): Response
    {
        Auth::logout();
        Session::flash('success', 'You have been logged out.');
        return $this->redirect('/');
    }
}
