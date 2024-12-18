<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //use HasFactory;
    public $timestamps = false;
    protected $table = 'documentos_documento';
    protected $fillable = [
        'id',
        'tipo_documento',
        'numero_documento',
        'foto',
        'nombre_propietario',
    ];
}
