<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tramite',
        'tipo_tramite',
        'estado',
        'print',
        'observacion',
        'user',
    ];
}
