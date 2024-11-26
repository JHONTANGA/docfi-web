<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
# composer require firebase/php-jwt
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Redirect;

class JWTAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Nombre de la cookie que contiene el JWT
        $cookieName = 'jwt_token';

        // Verificar si la cookie está presente
        if (!$request->hasCookie($cookieName)) {
            return redirect('/welcome')->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }

        // Obtener el JWT desde la cookie
        $token = $request->cookie($cookieName);

        try {
            // Decodificar y validar el token con la clave secreta
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

            // Puedes usar los datos decodificados del token en toda la aplicación
            // Almacenar los datos del usuario en el request para usarlos en los controladores
            $request->attributes->add(['user' => (array) $decoded]);

        } catch (\Exception $e) {
            // Si el token no es válido o ha expirado
            return redirect('/welcome')->with('error', 'Token inválido o expirado.');
        }

        // Continuar con la solicitud
        return $next($request);
    }
}