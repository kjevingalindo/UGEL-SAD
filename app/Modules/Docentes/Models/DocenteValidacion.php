<?php

namespace App\Models\Modules\Docentes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteValidacion extends Model
{
    use HasFactory;

    protected $table = 'docente_validaciones';

    protected $fillable = [
        'nombre',
    ];

    /**
     * Relación con docentes (si cada docente tiene un tipo de validación)
     */
    public function docentes()
    {
        return $this->hasMany(Docente::class, 'validacion_id');
    }
}
