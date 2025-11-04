<?php

namespace Database\Seeders\Modules\Instituciones;

use Illuminate\Database\Seeder;
use App\Modules\Instituciones\Models\Institucion;

class InstitucionesSeeder extends Seeder
{
    public function run(): void
    {
        // Usar firstOrCreate para evitar duplicados
        Institucion::firstOrCreate(
            ['nombre' => 'IE Warma Kuyay'], // clave única para buscar
            [
                'codigo_modular' => '12345',
                'direccion' => 'Av. Principal 100',
                'id_director' => 1, // usuario con rol admin
                'nivel' => 'Secundaria',
                'distrito' => 'Andahuaylas',
                'provincia' => 'Andahuaylas',
                'region' => 'Apurímac',
            ]
        );
    }
}
