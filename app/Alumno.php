<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'userid',
        'numero_control',
        'carrera',
        'semestre'
    ];
}
