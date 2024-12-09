<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // Definir los roles como constantes
    public const ADMIN = 'admin';
    public const USER = 'user';

    // Método para obtener todos los roles
    public static function getRoles()
    {
        return [
            self::ADMIN,
            self::USER,
        ];
    }
}