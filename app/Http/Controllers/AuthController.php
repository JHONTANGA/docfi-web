<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Importa la clase Http para realizar solicitudes HTTP
use Illuminate\Support\Facades\Cookie; // Importa la clase Cookie

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8001/api/login/', [
            'username' => $request->a,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $jwt = $response['access'];
            Cookie::queue(Cookie::make('jwt_token', $jwt, 60, null, null, true, true));
            return redirect()->route('mis-reportes');
        }

        return back()->withErrors(['login' => 'Credenciales inválidas']);
    }

    public function logout(Request $request)
    {
        // Eliminar la cookie que contiene el JWT
        Cookie::queue(Cookie::forget('jwt_token'));

        // Redirigir al usuario a la página de inicio o donde desees
        return redirect()->route('welcome')->with('message', 'Has cerrado sesión correctamente.');
    }

    public function register(Request $request)
    {
        // Aquí puedes agregar la lógica para procesar el registro (no la haremos por ahora)
        // Redirige a la vista de bienvenida después de hacer registro
        return redirect()->route('welcome');
    }

    public function showWelcomePage()
    {
        return view('welcome'); // Carga la vista 'welcome.blade.php'
    }
}
