<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function show()
    {
        // Devuelve la vista de la política de privacidad
        return view('privacy-policy'); // Asegúrate de que esta vista exista
    }
}
