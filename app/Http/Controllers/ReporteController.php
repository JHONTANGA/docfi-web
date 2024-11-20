<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    // Muestra la vista para eliminar reporte (no requiere id aún)
    public function eliminar()
    {
        return view('eliminar');  // Cargar la vista de eliminar reporte
    }
}
