<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider; // Asegúrate de que esta importación esté
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // ¡IMPORTANTE! Aquí se define a dónde redirige Laravel por defecto
                // a un usuario ya autenticado si intenta acceder a rutas de invitado.
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}