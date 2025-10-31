<?php

namespace App\Modules\Instituciones\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Instituciones\Models\Institucion;
use Illuminate\Http\Request;


class InstitucionController extends Controller
{
    /**
     * 📋 Listar todas las instituciones con total
     */
    public function index()
    {
        $instituciones = Institucion::select(
            'id',
            'nombre',
            'codigo_modular',
            'direccion',
            'director',
            'nivel',
            'distrito',
            'provincia',
            'region'
        )->get();

        return response()->json([
            'total' => $instituciones->count(),
            'instituciones' => $instituciones
        ], 200);
    }

    /**
     * ➕ Registrar una nueva institución
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:instituciones,nombre',
            'codigo_modular' => 'required|string|max:15|unique:instituciones,codigo_modular',
            'direccion' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'nivel' => 'required|string|max:100',
            'distrito' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'region' => 'nullable|string|max:255'
        ]);

        $institucion = Institucion::create($validated);

        return response()->json([
            'message' => '✅ Institución registrada correctamente',
            'data' => $institucion
        ], 201);
    }

    /**
     * 🔍 Mostrar una institución específica (con docentes)
     */
    public function show($id)
    {
        $institucion = Institucion::with('docentes:id,nombre,apellido,institucion_id')
            ->select(
                'id',
                'nombre',
                'codigo_modular',
                'direccion',
                'director',
                'nivel',
                'distrito',
                'provincia',
                'region'
            )
            ->find($id);

        if (!$institucion) {
            return response()->json(['message' => '⚠️ Institución no encontrada'], 404);
        }

        return response()->json($institucion, 200);
    }

    /**
     * ✏️ Actualizar una institución
     */
    public function update(Request $request, $id)
    {
        $institucion = Institucion::find($id);

        if (!$institucion) {
            return response()->json(['message' => '⚠️ Institución no encontrada'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:instituciones,nombre,' . $id,
            'codigo_modular' => 'required|string|max:15|unique:instituciones,codigo_modular,' . $id,
            'direccion' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'nivel' => 'required|string|max:100',
            'distrito' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'region' => 'nullable|string|max:255'
        ]);

        $institucion->update($validated);

        return response()->json([
            'message' => '✏️ Institución actualizada correctamente',
            'data' => $institucion
        ], 200);
    }

    /**
     * ❌ Eliminar una institución
     */
    public function destroy($id)
    {
        $institucion = Institucion::find($id);

        if (!$institucion) {
            return response()->json(['message' => '⚠️ Institución no encontrada'], 404);
        }

        $institucion->delete();

        return response()->json(['message' => '🗑️ Institución eliminada correctamente'], 200);
    }
}
