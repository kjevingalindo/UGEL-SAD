<?php

namespace Database\Seeders\Modules\Categorias;

use Illuminate\Database\Seeder;
use App\Modules\Categorias\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'I Categoría', 'descripcion' => 'Docente de ingreso al magisterio. Aprobación del concurso de ingreso.'],
            ['nombre' => 'II Categoría', 'descripcion' => 'Docente con experiencia mínima de 3 años. Evaluación de desempeño y méritos.'],
            ['nombre' => 'III Categoría', 'descripcion' => 'Consolidación de competencias pedagógicas. Experiencia mínima de 5 años.'],
            ['nombre' => 'IV Categoría', 'descripcion' => 'Desempeño destacado. Experiencia mínima de 7 años y evaluación satisfactoria.'],
            ['nombre' => 'V Categoría', 'descripcion' => 'Alta capacidad pedagógica y liderazgo. Experiencia mínima de 10 años.'],
            ['nombre' => 'VI Categoría', 'descripcion' => 'Desempeño sobresaliente, posible formador de otros docentes. Experiencia mínima de 13 años.'],
            ['nombre' => 'VII Categoría', 'descripcion' => 'Máximo nivel del magisterio. Trayectoria destacada y evaluación nacional.'],
            ['nombre' => 'VIII Categoría', 'descripcion' => 'Nivel excepcional (en algunos casos para directivos o especialistas). Designación especial según méritos sobresalientes.'],
        ];

        foreach ($categorias as $cat) {
            Categoria::create($cat);
        }
    }
}
