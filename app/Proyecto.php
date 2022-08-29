<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = [
        'titulo',
        'docente_titularid',
        'docente_colaborador',
        'docente_colaboradorid',
        'alumno_colaborador',
        'alumno_colaboradorid',
        'descripcion',
        'fecha_inicio',
        'fecha_final',
        'ci01',
        'ci02',
        'avance_parcial',
        'avance_final',
        'ficha_tecnica',
        'presentacion_final',
        'liberado',
        'observaciones'
    ];
}
