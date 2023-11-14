<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $accounttype): Response
    {
        $user = $request->user();

        if ($user && $user->accounttype === $accounttype) {
            return $next($request);
        }
        return abort(403, 'Unauthorized');

    }
}
