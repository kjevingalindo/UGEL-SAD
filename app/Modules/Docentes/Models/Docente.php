<?php

namespace App\Modules\Docentes\Models;

use App\Modules\Instituciones\Models\Institucion;
use App\Modules\Categorias\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'telefono',
        'nivel',
        'area',
        'grado_estudio',
        'fecha_ingreso',
        'user_id',
        'categoria_id',
        'estado_id',
        'estado_validacion_id',
        'institucion_id',
    ];

    protected $hidden = [
        'user_id',
        'categoria_id',
        'estado_id',
        'estado_validacion_id',
        'institucion_id',
        'created_at',
        'updated_at',
    ];

    // Relación con institución
    public function institucion() {
        return $this->belongsTo(Institucion::class);
    }

    // Relación con categoría
    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    // Relación con estado
    public function estado() {
        return $this->belongsTo(DocenteEstado::class, 'estado_id');
    }
}
    
