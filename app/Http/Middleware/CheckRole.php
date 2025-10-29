<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Maneja la solicitud entrante y verifica el rol del usuario.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // Si el usuario no está autenticado
        if (!$user) {
            return response()->json(['message' => 'No autenticado.'], 401);
        }

        // Si el rol del usuario no está en la lista de roles permitidos
        if (!in_array($user->role_id, $roles)) {
            return response()->json(['message' => 'Acceso denegado.'], 403);
        }

        return $next($request);
    }
}
