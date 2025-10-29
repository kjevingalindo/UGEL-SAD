<?php

namespace App\Modules\Roles\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
