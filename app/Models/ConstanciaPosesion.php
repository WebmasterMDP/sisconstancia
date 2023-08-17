<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstanciaPosesion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre_completo',
        'numdoc',
        'num_informe',
        'num_expediente',
        'fecha_expediente',
        'ubicacion',
        'partner',
        'dni_partner',
        'area_predio',
        'plano_visado',
        'num_resolucion',
        'num_ordenanza',
        'fecha_validez',

        'user',
        'print',
        'estado',
    ];
}
