<?php

namespace App\Modules\Auth;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Modules\Roles\Models\Role; // ✅ Importar el modelo de roles

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Los campos que pueden ser asignados masivamente
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id', // ✅ nuevo campo para relación con roles
    ];

    /**
     * Campos ocultos al serializar
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts de atributos
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación con el modelo Role
     */
    public function role()
    {
        return $this->belongsTo(\App\Modules\Roles\Models\Role::class, 'role_id');
    }

    /**
     * Verifica si el usuario tiene un rol específico
     */
    public function hasRole(string $roleName): bool
    {
        return $this->role && $this->role->name === $roleName;
    }
}
