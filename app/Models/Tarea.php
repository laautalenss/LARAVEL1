<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'asignatura',
        'fecha_entrega',
        'profesor_id'
    ];
}
