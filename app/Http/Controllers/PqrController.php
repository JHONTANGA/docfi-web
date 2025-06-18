<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Ya no necesitamos Http ni Cookie en este método, los quitamos.
// use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Cookie;

class PqrController extends Controller
{
    public function create()
    {
        return view('pqr');
    }

    public function enviar(Request $request)
    {
        // Esta parte es para enviar una PQR. Si el envío requiere autenticación JWT,
        // tendrías que enviarle el token a Laravel de otra forma, o hacer la llamada
        // a la API directamente desde JavaScript como en el caso de 'consultar'.
        // Por ahora, asumimos que crear una PQR no necesita que el usuario esté logueado.
        $validated = $request->validate([
            'nombre'   => 'required|string|max:64',
            'correo'   => 'required|email|max:64',
            'telefono' => 'required|string|max:32',
            'tipo'     => 'required|in:Peticiones,Quejas,Reclamos,Sugerencias',
            'detalles' => 'required|string|max:128',
        ]);

        $payload = [
            'titulo'      => 'PQR de ' . $validated['nombre'],
            'nombre'      => $validated['nombre'],
            'correo'      => $validated['correo'],
            'telefono'    => $validated['telefono'],
            'tipo_pqrs'   => $validated['tipo'],
            'detalles'    => $validated['detalles'],
            'estado'      => 'Espera',
            'tomado_por'  => null
        ];

        try {
            // Laravel envía la PQR a la API de Django (sin token aquí por simplicidad)
            $response = \Illuminate\Support\Facades\Http::post('http://127.0.0.1:8001/api/pqrs/crear/', $payload);

            if ($response->successful()) {
                return redirect()->route('consultarpqr')->with('success', 'Tu PQR fue enviada. Puedes verla en la lista.');
            } else {
                \Log::error('API Error al enviar PQR: ' . $response->body());
                return back()->withErrors(['No se pudo enviar la PQR. Detalle: ' . $response->status()])->withInput();
            }
        } catch (\Exception $e) {
            \Log::error('Error al conectar con la API para crear PQR: ' . $e->getMessage());
            return back()->withErrors(['Error al conectar con la API: ' . $e->getMessage()])->withInput();
        }
    }

    public function consultar()
    {
        // ¡Aquí el cambio! Laravel solo muestra la vista.
        // El JavaScript en 'consultarpqr.blade.php' será quien haga la llamada a la API
        // usando el token que tenga en el Local Storage.
        return view('consultarpqr');
    }
}