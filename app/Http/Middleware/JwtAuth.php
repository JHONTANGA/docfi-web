<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Log; // Para depuración

class JWTAuth
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
        // Propósito: Obtener el token JWT del encabezado 'Authorization: Bearer'.
        // Tu frontend lo envía así con window.fetchConToken().
        $token = $request->bearerToken();

        // Propósito: Si no hay token, el usuario no está autenticado para esta ruta protegida.
        if (!$token) {
            Log::info('JWTAuth: No se encontró token en el encabezado Authorization para la ruta: ' . $request->path());
            // Redirige al usuario a la página de login.
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }

        try {
            // Propósito: Decodificar y validar el token usando la clave secreta.
            // Asegúrate de que 'JWT_SECRET' en tu .env sea la misma clave que usa tu backend Django para firmar los tokens.
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

            // Propósito: Almacenar los datos decodificados del usuario en el objeto Request
            // para que los controladores puedan acceder a ellos fácilmente.
            $request->attributes->add(['user' => (array) $decoded]);
            Log::info('JWTAuth: Token decodificado con éxito para el usuario: ' . ($decoded->user_id ?? 'N/A'));

        } catch (\Exception $e) {
            // Propósito: Capturar cualquier error durante la decodificación del token (ej. token expirado, inválido, firma incorrecta).
            Log::warning('JWTAuth: Token inválido o expirado para la ruta: ' . $request->path() . ' Error: ' . $e->getMessage());
            // Redirige al usuario a la página de login si el token no es válido.
            return redirect()->route('login')->with('error', 'Sesión expirada o inválida. Por favor, inicia sesión de nuevo.');
        }

        // Propósito: Si el token es válido, permite que la solicitud continúe a la ruta deseada.
        return $next($request);
    }
}