<?php

declare(strict_types=1);

namespace Galaxy\App\Middleware;

use Closure;
use Galaxy\Core\Auth;
use Galaxy\Core\Contracts\Middleware;
use Galaxy\Core\Request;
use Galaxy\Core\Response;

final class AuthMiddleware implements Middleware
{
    public function handle(Request $request, Closure $next, string ...$args): Response
    {
        if (Auth::check()) {
            return $next($request);
        }

        return $request->wantsJson()
            ? Response::json(['error' => 'Unauthenticated'], 401)
            : Response::redirect('/login');
    }
}
