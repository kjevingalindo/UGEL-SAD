<?php

namespace App\Modules\Categorias\Models;

use App\Modules\Docentes\Models\Docente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Tabla asociada
    protected $table = 'categorias';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relación: una categoría tiene muchos docentes
    public function docentes()
    {
        return $this->hasMany(Docente::class, 'categoria_id');
    }

    // Ocultar timestamps en las respuestas JSON
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
