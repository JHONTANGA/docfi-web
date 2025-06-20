<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login'); // Asegúrate de que tienes un archivo login.blade.php en resources/views/
    }

    /**
     * Muestra el formulario de registro.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('register'); // Asegúrate de que tienes un archivo register.blade.php en resources/views/
    }

    // ... (Mantén tus métodos 'login' y 'register' existentes si los tienes, o añádelos desde la respuesta anterior) ...

    /**
     * Maneja el intento de login enviando las credenciales a la API de Django.
     * Si tu login es 100% AJAX desde el frontend, este método POST no es estrictamente necesario en Laravel.
     * Sin embargo, lo incluyo para que tengas una referencia.
     */
    public function login(Request $request)
    {
        // ... (Lógica de autenticación con Django, como la que te proporcioné antes) ...
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $response = Http::post('http://127.0.0.1:8001/api/token/', [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if ($response->successful()) {
                // Aquí deberías devolver una respuesta que tu JS pueda manejar,
                // si el formulario de login se envía por AJAX.
                // Si es un formulario HTML tradicional, la redirección es válida:
                return redirect()->route('inicio')->with('success', 'Sesión iniciada correctamente.');
            } else {
                Log::error('Error de login desde la API de Django:', ['response' => $response->body()]);
                return back()->withErrors(['login_error' => 'Credenciales inválidas o error en el servidor de autenticación.'])->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Excepción al intentar login:', ['exception' => $e->getMessage()]);
            return back()->withErrors(['login_error' => 'Ha ocurrido un error inesperado. Por favor, inténtalo de nuevo más tarde.'])->withInput();
        }
    }

    /**
     * Maneja el intento de registro.
     * Similar al login, si tu registro es 100% AJAX, este método POST no es estrictamente necesario en Laravel.
     */
    public function register(Request $request)
    {
        // ... (Lógica de registro con Django, como la que te proporcioné antes) ...
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            $response = Http::post('http://127.0.0.1:8001/api/register/', [
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
            ]);

            if ($response->successful()) {
                return redirect()->route('login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
            } else {
                Log::error('Error de registro desde la API de Django:', ['response' => $response->body()]);
                $errorMessage = $response->json()['detail'] ?? 'Error desconocido al registrar usuario.';
                return back()->withErrors(['register_error' => $errorMessage])->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Excepción al intentar registrar:', ['exception' => $e->getMessage()]);
            return back()->withErrors(['register_error' => 'Ha ocurrido un error inesperado durante el registro.'])->withInput();
        }
    }
}