<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    protected $table = 'reportes_reporte';
    protected $fillable = [
        'id_usuario_id',
        'id_documento_id',
        'estado',
        'detalle_reporte',
        'ubicacion_perdida',
        'fecha_reporte',
        'id',
    ];
}
