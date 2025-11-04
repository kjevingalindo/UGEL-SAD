<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Modules\Auth\Controllers\AuthController;
use App\Modules\Docentes\Controllers\DocenteController;
use App\Modules\Docentes\Controllers\DocenteValidacionController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // 🧩 RUTAS SOLO PARA ADMINISTRADORES
    Route::middleware('role:admin')->group(function () {
        // Gestión de docentes
        Route::get('/docentes', [DocenteController::class, 'index']);
        Route::post('/docentes', [DocenteController::class, 'store']);
        Route::get('/docentes/{id}', [DocenteController::class, 'show']);
        Route::put('/docentes/{id}', [DocenteController::class, 'update']);
        Route::delete('/docentes/{id}', [DocenteController::class, 'destroy']);

        // 🟢 Validaciones (Pendiente, Validado, Rechazado)
        Route::get('/validaciones', [DocenteValidacionController::class, 'index']);
        Route::post('/validaciones', [DocenteValidacionController::class, 'store']);
        Route::put('/validaciones/{id}', [DocenteValidacionController::class, 'update']);
        Route::delete('/validaciones/{id}', [DocenteValidacionController::class, 'destroy']);

        // 🟣 Actualizar validación del docente (por UGEL)
        Route::patch('/docentes/{id}/validacion', [DocenteValidacionController::class, 'actualizarEstado']);
    });

    // 🧑‍🏫 RUTAS SOLO PARA DOCENTES
    Route::middleware('role:docente')->group(function () {
        Route::get('/mis-datos', [DocenteController::class, 'show']);
    });
});
