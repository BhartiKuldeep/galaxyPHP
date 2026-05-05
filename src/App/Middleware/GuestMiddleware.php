<?php

declare(strict_types=1);

namespace Galaxy\App\Middleware;

use Closure;
use Galaxy\Core\Auth;
use Galaxy\Core\Contracts\Middleware;
use Galaxy\Core\Request;
use Galaxy\Core\Response;

final class GuestMiddleware implements Middleware
{
    public function handle(Request $request, Closure $next, string ...$args): Response
    {
        if (!Auth::check()) {
            return $next($request);
        }

        return Response::redirect('/dashboard');
    }
}
