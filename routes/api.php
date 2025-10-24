<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Importacion de controladores
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DocenteController; 


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Rutas principales del sistema SAD-UGEL
Route::apiResource('instituciones', InstitucionController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('docentes', DocenteController::class);