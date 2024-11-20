<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte; // Asegúrate de tener este modelo para interactuar con la base de datos

class ReporteController extends Controller
{
    // Muestra la vista para crear un reporte
    public function crear()
    {
        return view('crear'); // Cambié la ruta de la vista para reflejar la estructura correcta
    }
    
    // Muestra los reportes del usuario
    public function misReportes()
    {
        // Obtener todos los reportes del usuario (o todos los reportes si no hay autenticación)
        $reportes = Reporte::all(); // Si necesitas solo los reportes de un usuario, puedes agregar un filtro como: where('user_id', auth()->id())
        
        return view('mis', compact('reportes')); // Pasar los reportes a la vista
    }

    // Guarda el reporte y genera un número de ticket
    public function guardar(Request $request)
    {
        // Validar los datos del formulario, ahora con los campos tipo_documento y numero_documento
        $validated = $request->validate([
            'nombre_reportante' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'clasificacion' => 'required|string|in:perdido,encontrado',
            'direccion' => 'required|string|max:255',
            'tipo_documento' => 'required|string|in:pasaporte,cedula_ciudadania,cedula_extranjeria,tarjeta_identidad',
            'numero_documento' => 'required|string|max:255',
        ]);

        // Generar número de ticket (Incidencia 2024-###)
        $ticket = 'Incidencia 2024-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);

        // Guardar el reporte en la base de datos
        Reporte::create([
            'nombre_reportante' => $validated['nombre_reportante'],
            'contacto' => $validated['contacto'],
            'descripcion' => $validated['descripcion'],
            'clasificacion' => $validated['clasificacion'],
            'direccion' => $validated['direccion'],
            'tipo_documento' => $validated['tipo_documento'],
            'numero_documento' => $validated['numero_documento'],
            'ticket' => $ticket,
        ]);

        // Redirigir a la vista de creación de reporte con el ticket generado
        return redirect()->route('crear-reporte')->with('ticket', $ticket);
    }

    // Buscar reportes
    public function buscar(Request $request)
    {
        $query = $request->input('query'); // Recibir el término de búsqueda
        // Aquí puedes hacer una consulta a la base de datos si estuvieras almacenando los reportes
        $reportes = Reporte::where('descripcion', 'like', '%' . $query . '%')->get(); // Buscar en la descripción del reporte (ajusta esto según sea necesario)
        
        return view('reportes.buscar', compact('reportes', 'query')); // Mostrar los reportes encontrados
    }

    // Eliminar un reporte
    public function eliminar(Request $request)
    {
        $id = $request->input('id'); // Obtener el ID del reporte a eliminar
        // Aquí deberías eliminar el reporte usando el ID. Por ahora solo mostramos un mensaje
        Reporte::find($id)->delete(); // Eliminar reporte de la base de datos

        // Redirigir con un mensaje de éxito
        return redirect()->route('mis-reportes')->with('success', 'Reporte eliminado correctamente');
    }
}
