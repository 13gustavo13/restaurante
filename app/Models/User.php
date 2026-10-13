<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'correo',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getNameAttribute(): string
    {
        return trim(implode(' ', array_filter([
            $this->attributes['nombre'] ?? null,
            $this->attributes['apellido_p'] ?? null,
            $this->attributes['apellido_m'] ?? null,
        ])));
    }

    public function getEmailAttribute(): ?string
    {
        return $this->attributes['correo'] ?? null;
    }
}
