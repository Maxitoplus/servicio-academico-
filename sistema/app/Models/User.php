<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'activo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'activo' => 'boolean',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }

    public function tieneRol(string ...$roles): bool
    {
        return $this->activo
            && in_array($this->rol, $roles, true);
    }

    public function getNombreRolAttribute(): string
    {
        return match ($this->rol) {
            'administrador' => 'Administrador',
            'secretaria' => 'Secretaría',
            'cajero' => 'Cajero Escolar',
            'docente' => 'Docente',
            'tutor' => 'Padre de Familia',
            'alumno' => 'Alumno',
            'direccion' => 'Dirección',
            'rh' => 'Recursos Humanos',
            default => 'Sin rol asignado',
        };
    }
}
