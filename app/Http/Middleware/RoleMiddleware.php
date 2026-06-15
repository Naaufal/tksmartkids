<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $profile = $request->get('admin_profile');

        if (!$profile || !in_array($profile->role, $roles)) {
            abort(403, 'Anda tidak memiliki hak akses (role) untuk halaman ini.');
        }

        return $next($request);
    }
}
