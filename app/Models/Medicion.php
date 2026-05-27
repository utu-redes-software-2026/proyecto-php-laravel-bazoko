<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * permite guardar esos campos desde formularios.
 */
class Medicion extends Model
{
    protected $fillable = [
        'fecha',
        'turno',
        'sector',
        'parametro',
        'valor',
        'unidad',
        'responsable',
        'observaciones',
    ];
}