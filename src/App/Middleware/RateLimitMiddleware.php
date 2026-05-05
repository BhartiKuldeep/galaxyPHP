<?php

declare(strict_types=1);

namespace Galaxy\App\Middleware;

use Closure;
use Galaxy\Core\Contracts\Middleware;
use Galaxy\Core\RateLimiter;
use Galaxy\Core\Request;
use Galaxy\Core\Response;

final class RateLimitMiddleware implements Middleware
{
    public function handle(Request $request, Closure $next, string ...$args): Response
    {
        $bucket = $args[0] ?? 'global';
        $maxAttempts = (int) ($args[1] ?? config('security.rate_limit_max_attempts', 20));
        $window = (int) ($args[2] ?? config('security.rate_limit_window_seconds', 60));
        $key = sha1($bucket . '|' . $request->ip());

        if ((new RateLimiter())->tooManyAttempts($key, $maxAttempts, $window)) {
            return $request->wantsJson()
                ? Response::json(['error' => 'Too many requests'], 429)
                : Response::html(view('errors/429', ['title' => 'Too Many Requests']), 429);
        }

        return $next($request);
    }
}
