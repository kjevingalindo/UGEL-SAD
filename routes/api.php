<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Auth\Controllers\AuthController;
use App\Modules\Instituciones\Controllers\InstitucionController;
use App\Modules\Categorias\Controllers\CategoriaController;
use App\Modules\Docentes\Controllers\DocenteController;

// 🔓 Rutas públicas (sin autenticación)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// 🔒 Rutas protegidas (requieren autenticación Sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // Información del usuario autenticado
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // 🧑‍💼 Solo ADMINISTRADOR (role_id = 1)
    Route::middleware('role:1')->group(function () {
        Route::apiResource('/instituciones', InstitucionController::class);
        Route::apiResource('/categorias', CategoriaController::class);
    });

    // 🧑‍🏫 Solo DIRECTOR (role_id = 2)
    Route::middleware('role:2')->group(function () {
        Route::apiResource('/docentes', DocenteController::class);
    });

    // 👨‍🎓 Solo DOCENTE (role_id = 3)
    Route::middleware('role:3')->get('/perfil', function () {
        return response()->json(['message' => 'Bienvenido Docente']);
    });
});
