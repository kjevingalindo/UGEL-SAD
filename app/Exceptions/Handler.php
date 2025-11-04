<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Spatie\Permission\Exceptions\UnauthorizedException;

class Handler extends ExceptionHandler
{
    // ... otros métodos y propiedades

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof UnauthorizedException) {
            return response()->json([
                'message' => 'Acceso denegado. No tiene el rol necesario.'
            ], 403);
        }

        return parent::render($request, $exception);
    }
}
