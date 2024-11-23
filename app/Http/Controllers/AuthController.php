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
            'username' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $jwt = $response['access'];
            Cookie::queue(Cookie::make('jwt_token', $jwt, 60, null, null, true, true));
            return redirect()->route('logintest');
        }

        return back()->withErrors(['login' => 'Credenciales inválidas']);
    }

    public function logout(Request $request)
    {
        // Eliminar la cookie que contiene el JWT
        Cookie::queue(Cookie::forget('jwt_token'));

        // Redirigir al usuario a la página de inicio o donde desees
        return redirect()->route('loginview')->with('message', 'Has cerrado sesión correctamente.');
    }

    public function loginview()
    {
        return (view('LoginView'));
    }

    public function protview()
    {
        return (view('logintest'));
    }
}
