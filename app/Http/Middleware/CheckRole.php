<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user() || !$request->user()->role) {
            return redirect('/login');
        }

        foreach ($roles as $role) {
            if ($request->user()->role->role_name === $role) {
                return $next($request);
            }
        }

        return redirect('/')->with('error', 'Unauthorized.');
    }
}
