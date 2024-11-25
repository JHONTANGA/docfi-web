<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Muestra la vista de bienvenida con los formularios de login y registro
    public function showWelcomePage()
    {
        return view('welcome'); // Carga la vista 'welcome.blade.php'
    }

    // Procesa el login
    public function login(Request $request)
    {
        // Aquí puedes agregar la lógica para validar el login (en este caso no la haremos por ahora)
        // Redirige a la vista de inicio después de hacer login
        return redirect()->route('inicio');
    }

    // Procesa el registro
    public function register(Request $request)
    {
        // Aquí puedes agregar la lógica para procesar el registro (no la haremos por ahora)
        // Redirige a la vista de bienvenida después de hacer registro
        return redirect()->route('welcome');
    }
}
