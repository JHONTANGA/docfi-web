<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pqr extends Model
{
    protected $fillable = ['nombre', 'correo', 'tipo', 'mensaje', 'codigo'];

}
