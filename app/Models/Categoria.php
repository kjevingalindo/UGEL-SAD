<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    // Relación: una categoría tiene muchos docentes
    public function docentes()
    {
        return $this->hasMany(Docente::class);
    }

    // Ocultar timestamps
    protected $hidden = ['created_at', 'updated_at'];
}
