<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. Le decimos a Laravel que nuestra tabla se llama 'usuarios', no 'users'
    protected $table = 'usuarios';

    // 2. Le decimos cuál es la llave primaria de la tabla (por defecto busca 'id')
    protected $primaryKey = 'id_usuario';

    // 3. (Opcional pero recomendado) Si tu tabla no tiene columnas created_at y updated_at, agrega esto:
    public $timestamps = false;

    // 4. Los campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'correo',
        'password',
    ];

    // 5. Los campos que deben ocultarse (como contraseñas)
    protected $hidden = [
        'password',
        'remember_token',
    ];
}