<?php

namespace Database\Seeders\Modules\Instituciones;

use Illuminate\Database\Seeder;
use App\Modules\Instituciones\Models\Institucion;

class InstitucionesSeeder extends Seeder
{
    public function run(): void
    {
        // Ejemplo de institución
        Institucion::create([
            'nombre' => 'IE Warma Kuyay',
            'codigo_modular' => '12345',
            'direccion' => 'Av. Principal 100',
            'id_director' => 1, // usuario con rol admin
            'nivel' => 'Secundaria',
            'distrito' => 'Andahuaylas',
            'provincia' => 'Andahuaylas',
            'region' => 'Apurímac',
        ]);
    }
}
