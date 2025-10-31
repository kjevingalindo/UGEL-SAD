<?php

namespace Database\Seeders\Modules\Docentes;

use Illuminate\Database\Seeder;
use App\Modules\Docentes\Models\Docente;

class DocentesSeeder extends Seeder
{
    public function run(): void
    {
        Docente::create([
            'user_id' => 2, // usuario con rol docente
            'institucion_id' => 1, // institución existente
            'categoria_id' => 1, // categoría inicial
            'dni' => '12345678',
            'nombres' => 'Carlos',
            'apellidos' => 'Pérez Huamán',
            'telefono' => '999888777',
            'nivel' => 'Secundaria',
            'area' => 'Matemática',
            'grado_estudio' => 'Licenciado',
            'fecha_ingreso' => '2020-03-15',
        ]);
    }
}
