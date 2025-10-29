<?php

namespace App\Modules\Roles\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // Si no hay usuario autenticado
        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado.'], 401);
        }

        // Si el usuario no tiene rol permitido
        if (!in_array($user->role_id, $roles)) {
            return response()->json(['message' => 'Acceso denegado.'], 403);
        }

        return $next($request);
    }
}
