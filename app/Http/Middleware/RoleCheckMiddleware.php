<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (! $request->user() || ! $this->checkRole($request->user(), $role)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }

    /**
     * Check if the user has the given role.
     *
     * @param  \App\Models\User  $user
     * @param  string  $role
     * @return bool
     */
    private function checkRole(User $user, $role)
    {
        return $user->role_id === $role;
    }
}
