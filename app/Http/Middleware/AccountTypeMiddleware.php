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
    public function handle(Request $request, Closure $next, $account_type): Response
    {
        $user = $request->user();

        if ($user && $user->account_type === $account_type) {
            return $next($request);
        }
        return abort(403, 'Unauthorized');

    }
}
