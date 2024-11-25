<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerminosyCondicionesController extends Controller
{
    public function show()
    {
        // Devuelve la vista de Términos y Condiciones
        return view('terminos-condiciones');  
    }
}
