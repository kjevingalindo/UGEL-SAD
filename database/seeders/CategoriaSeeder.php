<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria; // 

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Nombrado',
                'descripcion' => 'Docente nombrado en la institución',
            ],
            [
                'nombre' => 'Contratado',
                'descripcion' => 'Docente contratado temporalmente',
            ],
            [
                'nombre' => 'Designado',
                'descripcion' => 'Docente designado para funciones específicas',
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::firstOrCreate(
                ['nombre' => $categoria['nombre']], // evita duplicados
                $categoria
            );
        }

        echo "✅ Categorías insertadas correctamente.\n";
    }
}
