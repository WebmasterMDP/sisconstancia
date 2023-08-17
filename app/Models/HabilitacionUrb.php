<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabilitacionUrb extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'denominacion',
        'expediente',
        'fecha_emision',
        'zonificacion',
        'plano_aprobado',
        'num_resolucion',
        'fecha_vencimiento',
        'propietario',
        'responsable_obra',

        'departamento',
        'provincia',
        'distrito',
        'urbanizacion_otro',
        'uc',
        'lote',
        'area_bruta_terreno',
        'area_via_metropolitana',
        'area_afecta_aportes',
        'parque_zonales',
        'servicios_publicos',
        'area_servicios',
        'area_vendible',
        'area_circulacion',

        'user',
        'estado',
        'print',
    ];
}
