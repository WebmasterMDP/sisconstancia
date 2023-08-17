<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametrosUrb extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        
        'titular',
        'numdoc',
        'expediente',
        'fecha_emision',
        'direccion',
        'partida',
        'num_informe',
        'fecha_vencimiento',

        'user',
        'estado',
        'print',
    ];
}
