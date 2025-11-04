<?php

namespace App\Modules\Roles\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'descripcion'];

    public $timestamps = false; // opcional si no tienes created_at/updated_at

    public function users()
    {
        return $this->hasMany(\App\Modules\Auth\User::class, 'role_id');
    }
}
