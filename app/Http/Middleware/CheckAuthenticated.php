<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
# composer require firebase/php-jwt
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Redirect;

class CheckAuthenticated
{
    /**
     * Manejar la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Nombre de la cookie que almacena el JWT
        $cookieName = 'jwt_token';

        // Verifica si la cookie existe
        if ($request->hasCookie($cookieName)) {
            $token = $request->cookie($cookieName);

            try {
                // Decodifica el token (asegúrate de que `JWT_SECRET` está configurado correctamente)
                $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

                // Si el token es válido, redirige a una página protegida o de inicio
                return redirect()->route('inicio');
            } catch (\Exception $e) {
                // Si el token es inválido, deja que continúe la solicitud
            }
        }

        // Si no hay cookie o el token es inválido, deja que continúe la solicitud
        return $next($request);
    }
}