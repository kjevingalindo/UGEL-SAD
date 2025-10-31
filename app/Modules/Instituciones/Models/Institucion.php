<?php

namespace App\Modules\Instituciones\Models;

use App\Modules\Docentes\Models\Docente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;

    protected $table = 'instituciones';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'codigo_modular',
        'direccion',
        'id_director',
        'nivel',
        'distrito',
        'provincia',
        'region',];

    // Ocultar timestamps en las respuestas JSON
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Relación con docentes (una institución tiene muchos docentes)
     */
    public function docentes()
    {
        return $this->hasMany(Docente::class);
    }
}
