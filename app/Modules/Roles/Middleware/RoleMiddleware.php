<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user || !$user->hasAnyRole($roles)) {
            \Log::info('Acceso denegado middleware role', [
                'user_id' => $user?->id,
                'roles' => $roles,
                'user_roles' => $user ? $user->getRoleNames() : null,
            ]);
            return response()->json(['message' => 'Acceso denegado. No autorizado'], 403);
        }

        return $next($request);
    }
}
