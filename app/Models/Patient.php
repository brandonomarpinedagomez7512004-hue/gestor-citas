<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // Esta lista le da permiso a Laravel para guardar estos campos
    protected $fillable = [
        'nombre_completo',
        'curp',
        'fecha_nacimiento',
        'user_id',
    ];
}