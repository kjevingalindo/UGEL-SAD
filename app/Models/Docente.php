<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    /**
     * Campos que pueden asignarse de manera masiva.
     */
    protected $fillable = [
        'dni',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'institucion_id',
        'categoria_id',
    ];

    /**
     * Campos ocultos al devolver en formato JSON.
     */
    protected $hidden = [
        'institucion_id',
        'categoria_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Relación: un docente pertenece a una institución.
     */
    public function institucion()
    {
        return $this->belongsTo(Institucion::class);
    }

    /**
     * Relación: un docente pertenece a una categoría.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
