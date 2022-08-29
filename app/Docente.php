<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = [
        'userid',
        'folio',
        'licenciatura',
        'maestria',
        'maestria_cantidad',
        'maestria_nombre',
        'doctorado',
        'doctorado_cantidad',
        'doctorado_nombre',

    ];
}
