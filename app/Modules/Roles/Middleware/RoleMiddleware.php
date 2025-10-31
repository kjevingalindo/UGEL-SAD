<?php

namespace App\Modules\Roles\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user || !$user->role || !in_array($user->role->nombre, $roles)) {
            return response()->json(['message' => 'Acceso denegado.'], 403);
        }

        return $next($request);
    }
}
