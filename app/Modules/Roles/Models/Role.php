<?php

namespace App\Modules\Roles\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function users()
    {
        return $this->hasMany(\App\Modules\Auth\User::class, 'role_id');
    }
}
