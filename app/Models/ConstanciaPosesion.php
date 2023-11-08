<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstanciaPosesion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'siglasArquitecto',
        'nombreCompleto',
        'codConstancia',
        'numdoc',
        'numInforme',
        'fechaInforme',
        'numExpediente',
        'fechaExpediente',
        'fechaIngreso',
        'lote',
        'manzana',
        'ubicacion',
        'estadoCivil',
        'partner',
        'dniPartner',
        'areaPredio',
        'zona',

        'periodo',
        '_token',
        'user',
        'print',
        'estado',
    ];
}
