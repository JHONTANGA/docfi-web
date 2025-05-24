<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;
use Illuminate\Support\Str;

class PqrController extends Controller
{
    // Mostrar el formulario PQR
    public function create()
    {
        return view('pqr'); // Vista: resources/views/pqr.blade.php
    }

    // Procesar y guardar el PQR
    public function enviar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email',
            'telefono' => 'nullable|string|max:20',
            'tipo' => 'required|in:peticion,queja,reclamo',
            'detalles' => 'required|string|max:1000',
        ]);

        // Código único corto
        $codigo = 'PQR-' . date('ymd') . '-' . strtoupper(Str::random(4));

        // Guardar
        Pqr::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'tipo' => $request->tipo,
            'detalles' => $request->detalles,
            'codigo' => $codigo
        ]);

        return redirect()->back()->with([
            'success' => 'Tu PQR ha sido enviada correctamente.',
            'codigo' => $codigo
        ]);
    }

    // Mostrar los registros
    public function consultar()
    {
        $pqr = Pqr::all();
        return view('consultar-pqr', compact('pqr'));
    }
}
