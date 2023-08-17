<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    use HasFactory;

    protected $table = 'Pisos';

    protected $fillable = [
        'expediente_conformidad',
        'id_piso',
        'antiguedad',
        'muro_columna',
        'techos',
        'piso',
        'puerta_ventana',
        'revestimiento',
        'bano',
        'inst_elect',
        'area_construida',
        'user',
        'estado',
        'observaciones',
    ];
}
