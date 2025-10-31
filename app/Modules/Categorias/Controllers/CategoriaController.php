<?php

namespace App\Modules\Categorias\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Categorias\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Listar todas las categorías.
     */
    public function index()
    {
        $categorias = Categoria::select('id', 'nombre', 'descripcion')->get();

        return response()->json([
            'message' => 'Lista de categorías obtenida correctamente',
            'data' => $categorias
        ], 200);
    }

    /**
     * Registrar una nueva categoría.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'descripcion' => 'nullable|string|max:500',
        ]);

        $categoria = Categoria::create($request->only('nombre', 'descripcion'));

        return response()->json([
            'message' => 'Categoría registrada correctamente',
            'data' => $categoria
        ], 201);
    }

    /**
     * Mostrar una categoría específica con sus docentes.
     */
    public function show($id)
    {
        $categoria = Categoria::with('docentes:id,nombres,apellidos,categoria_id')->find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        return response()->json([
            'message' => 'Categoría encontrada',
            'data' => $categoria
        ], 200);
    }

    /**
     * Actualizar una categoría.
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $id,
            'descripcion' => 'nullable|string|max:500',
        ]);

        $categoria->update($request->only('nombre', 'descripcion'));

        return response()->json([
            'message' => 'Categoría actualizada correctamente',
            'data' => $categoria
        ], 200);
    }

    /**
     * Eliminar una categoría.
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $categoria->delete();

        return response()->json(['message' => 'Categoría eliminada correctamente'], 200);
    }
}
