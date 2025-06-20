<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// Ojo: Si CheckAuthenticated también necesita JWT, debería usar la misma lógica que JWTAuth
// pero su propósito es diferente. Asumo que es para un flujo de autenticación 'general'.
// Si no usas cookies para el JWT en Laravel, esta parte es irrelevante para tu JWT flow.
// No usaremos 'Firebase\JWT\JWT' ni 'Key' directamente aquí, porque tu JWTAuth lo maneja.
// Este middleware se encarga más de si hay una "sesión" activa (ej. via localStorage para el frontend).

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
        // Propósito: Verificar si el usuario ya tiene un token de acceso en localStorage (simulando autenticación de frontend)
        // Ojo: Laravel no tiene acceso directo a localStorage. Esta lógica se ejecutaría
        // en el SERVIDOR. Si quieres que este middleware sepa del JWT del frontend,
        // necesitarías que el frontend lo envíe como cookie o header en cada petición.
        // Dado que JWTAuth ya lo hace con el header Authorization, podrías confiar en eso.

        // Por ahora, asumamos que este middleware se aplica a rutas como '/welcome'
        // y quieres que si el usuario *ya inició sesión* (según tu frontend),
        // no pueda volver a /login o /register, sino que vaya a su 'dashboard' (/welcome o /mis-reportes).

        // Si tienes una forma confiable de saber si el usuario está "logueado" en el backend
        // fuera del JWTAuth (ej. sesión de Laravel tradicional), úsala.
        // Si dependes SÓLO del JWT:
        $token = $request->bearerToken(); // Intenta leer el token del header

        // Si hay un token (lo que implicaría que JWTAuth ya lo validó o lo hará para rutas protegidas)
        // y el usuario está intentando ir a login/register, lo redirigimos.
        // Esto es para que un usuario logueado no vea la página de login de nuevo.
        if ($token && ($request->routeIs('login') || $request->routeIs('register'))) {
            // Si el token existe, asumimos que está autenticado y lo enviamos al dashboard/home.
            // Ahora que 'welcome' es 'reportes.blade.php', quizás quieras redirigir a 'mis-reportes'.
            return redirect()->route('mis-reportes'); // Redirige a la página de reportes/dashboard.
        }

        // Para cualquier otra situación (no hay token, o no está en login/register),
        // permite que la solicitud continúe. JWTAuth se encargará de las rutas protegidas.
        return $next($request);
    }
}