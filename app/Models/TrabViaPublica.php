<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabViaPublica extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        
        'nombre_completo',
        'numdoc',
        'num_expediente',
        'fecha_expediente',
        'num_informe',
        'comprobante',

        'concepto_servicio',
        'ubicacion',
        'fecha_instalacion',
        'proveedor_servicio',

        'user',
        'estado',
        'print',
    ];
}
