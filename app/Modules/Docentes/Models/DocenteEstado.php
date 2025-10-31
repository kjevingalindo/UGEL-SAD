<?php

namespace App\Modules\Docentes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteEstado extends Model
{
    use HasFactory;

    protected $table = 'docente_estados';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Un estado puede estar asociado a varios docentes
    public function docentes()
    {
        return $this->hasMany(Docente::class, 'estado_id');
    }
}
