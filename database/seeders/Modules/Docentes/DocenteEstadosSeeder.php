<?php

namespace Database\Seeders\Modules\Docentes;

use Illuminate\Database\Seeder;
use App\Modules\Docentes\Models\DocenteEstado;

class DocenteEstadosSeeder extends Seeder
{
    public function run(): void
    {
        $estados = [
            [
                'nombre' => 'Activo',
                'descripcion' => 'El docente está laborando actualmente en una institución educativa pública bajo nombramiento o contrato vigente.',
            ],
            [
                'nombre' => 'Contratado',
                'descripcion' => 'Docente que labora por contrato (generalmente anual) bajo el régimen del D.L. N.° 276 o la Ley N.° 30328.',
            ],
            [
                'nombre' => 'Nombrado',
                'descripcion' => 'Docente con plaza permanente en el magisterio, ingresó mediante concurso público.',
            ],
        ];

        foreach ($estados as $estado) {
            DocenteEstado::updateOrCreate(['nombre' => $estado['nombre']], $estado);
        }
    }
}
