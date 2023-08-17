<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConformidadObra extends Model
{
    use HasFactory;

    protected $table = 'conformidad_obras';

    public function expediente()
    {
        return $this->belongsTo(Pisos::class, 'expediente', 'expediente_conformidad');
    }

    protected $fillelable = [
        'tipo_edificacion',
        'expediente',
        'fecha_expediente',
        'propietario',
        'num_resolucion',
        'num_licencia',
        'ubicacion',
        'area_construida',
        'area_terreno',
        'valor_obra',
        'otros',
        'cantidad_pisos',
        
        'zonificacion_normativa',
        'area_eu_normativa',
        'altura_edif_normativa',
        'retiro_normativa',
        'area_libre_normativa',
        'densidad_normativa',
        'estacionamiento_normativa',

        'zonificacion_proyecto',
        'area_eu_proyecto',
        'altura_edif_proyecto',
        'retiro_proyecto',
        'area_libre_proyecto',
        'densidad_proyecto',
        'estacionamiento_proyecto',

        'observaciones',

        'user',
        'estado',
        'print',
    ];
}
