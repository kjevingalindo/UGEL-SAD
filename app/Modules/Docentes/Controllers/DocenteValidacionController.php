<?php

namespace App\Modules\Docentes\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modules\Docentes\DocenteValidacion;
use App\Models\Modules\Docentes\Docente;
use Illuminate\Http\Request;

class DocenteValidacionController extends Controller
{
    // 🟢 Mostrar todos los tipos de validación
    public function index()
    {
        return response()->json(DocenteValidacion::all());
    }

    // 🟢 Crear nuevo tipo de validación
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:docente_validaciones,nombre',
        ]);

        $validacion = DocenteValidacion::create([
            'nombre' => ucfirst(strtolower($request->nombre)),
        ]);

        return response()->json(['message' => 'Tipo de validación creado correctamente', 'data' => $validacion], 201);
    }

    // 🟢 Actualizar tipo de validación
    public function update(Request $request, $id)
    {
        $validacion = DocenteValidacion::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|unique:docente_validaciones,nombre,' . $id,
        ]);

        $validacion->update(['nombre' => ucfirst(strtolower($request->nombre))]);

        return response()->json(['message' => 'Tipo de validación actualizado correctamente']);
    }

    // 🟢 Eliminar tipo de validación
    public function destroy($id)
    {
        $validacion = DocenteValidacion::findOrFail($id);
        $validacion->delete();

        return response()->json(['message' => 'Tipo de validación eliminado correctamente']);
    }

    // 🟣 Actualizar el estado de validación de un docente (por UGEL)
    public function actualizarEstado(Request $request, $docenteId)
    {
        $request->validate([
            'validacion_id' => 'required|exists:docente_validaciones,id',
        ]);

        $docente = Docente::findOrFail($docenteId);
        $docente->update(['validacion_id' => $request->validacion_id]);

        return response()->json(['message' => 'Estado de validación actualizado correctamente']);
    }
}
