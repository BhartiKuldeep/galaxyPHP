<?php

declare(strict_types=1);

namespace Galaxy\App\Middleware;

use Closure;
use Galaxy\Core\Contracts\Middleware;
use Galaxy\Core\Csrf;
use Galaxy\Core\Request;
use Galaxy\Core\Response;

final class CsrfMiddleware implements Middleware
{
    public function handle(Request $request, Closure $next, string ...$args): Response
    {
        $token = (string) $request->input('_token', $request->header('X-CSRF-Token', ''));

        if (!Csrf::verify($token)) {
            return $request->wantsJson()
                ? Response::json(['error' => 'Invalid CSRF token'], 419)
                : Response::html(view('errors/419', ['title' => 'Page Expired']), 419);
        }

        return $next($request);
    }
}
