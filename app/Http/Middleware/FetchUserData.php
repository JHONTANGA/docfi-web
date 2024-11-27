<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FetchUserData
{
    public function handle(Request $request, Closure $next)
    {
        // Obtener el token JWT de la cookie o del encabezado
        $token = $request->cookie('jwt_token') ?? $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Token no proporcionado'], 401);
        }

        try {
            // Realizar una solicitud al backend de Django para obtener datos del usuario
            $response = Http::withToken($token)->get('http://127.0.0.1:8001/api/me/');

            if ($response->successful()) {
                // Agregar datos del usuario al request
                $request->merge(['user' => $response->json()]);
            } else {
                return response()->json(['message' => 'No se pudo autenticar al usuario'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al contactar con el backend'], 500);
        }

        return $next($request);
    }
}
