<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Mostrar todos los docentes con su institución y categoría.
     */
    public function index()
    {
        $docentes = Docente::with([
            'institucion:id,nombre',
            'categoria:id,nombre'
        ])->get([
            'id',
            'dni',
            'nombre',
            'apellido',
            'telefono',
            'email',
            'institucion_id',
            'categoria_id',
        ]);

        return response()->json([
            'message' => 'Lista de docentes obtenida correctamente',
            'data' => $docentes
        ], 200);
    }

    /**
     * Crear un nuevo docente.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dni' => 'required|string|max:8|unique:docentes',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'institucion_id' => 'required|exists:instituciones,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $docente = Docente::create($validated);
        $docente->load(['institucion:id,nombre', 'categoria:id,nombre']);

        return response()->json([
            'message' => 'Docente registrado correctamente',
            'data' => $docente
        ], 201);
    }

    /**
     * Mostrar un docente específico con sus relaciones.
     */
    public function show($id)
    {
        $docente = Docente::with([
            'institucion:id,nombre',
            'categoria:id,nombre'
        ])->find($id);

        if (!$docente) {
            return response()->json(['message' => 'Docente no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Docente encontrado',
            'data' => $docente
        ], 200);
    }

    /**
     * Actualizar los datos de un docente existente.
     */
    public function update(Request $request, $id)
    {
        $docente = Docente::find($id);

        if (!$docente) {
            return response()->json(['message' => 'Docente no encontrado'], 404);
        }

        $validated = $request->validate([
            'dni' => 'sometimes|string|max:8|unique:docentes,dni,' . $docente->id,
            'nombre' => 'sometimes|string|max:255',
            'apellido' => 'sometimes|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'institucion_id' => 'sometimes|exists:instituciones,id',
            'categoria_id' => 'sometimes|exists:categorias,id',
        ]);

        $docente->update($validated);
        $docente->load(['institucion:id,nombre', 'categoria:id,nombre']);

        return response()->json([
            'message' => 'Docente actualizado correctamente',
            'data' => $docente
        ], 200);
    }

    /**
     * Eliminar un docente.
     */
    public function destroy($id)
    {
        $docente = Docente::find($id);

        if (!$docente) {
            return response()->json(['message' => 'Docente no encontrado'], 404);
        }

        $docente->delete();

        return response()->json(['message' => 'Docente eliminado correctamente'], 200);
    }
}
