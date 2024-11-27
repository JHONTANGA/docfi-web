<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use App\Models\Documento;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    // Muestra la vista para crear un reporte
    public function crear(Request $request)
    {
        $userData = json_encode($request['user']);
        print($userData);

        return view('crear', ['userData'=>$userData]); // Cambié la ruta de la vista para reflejar la estructura correcta
    }
    
    // Muestra los reportes del usuario
    public function misReportes(Request $request)
    {
        // Obtener todos los reportes del usuario (o todos los reportes si no hay autenticación)
        $reportes = Reporte::select('usuarios_usuario.first_name','usuarios_usuario.last_name','documentos_documento.numero_documento','documentos_documento.tipo_documento','documentos_documento.nombre_propietario','reportes_reporte.detalle_reporte','reportes_reporte.ubicacion_perdida','reportes_reporte.estado')
        ->join('documentos_documento', 'reportes_reporte.id_documento_id', '=', 'documentos_documento.id')
        ->join('usuarios_usuario', 'reportes_reporte.id_usuario_id', '=', 'usuarios_usuario.id')
        ->get(); // Si necesitas solo los reportes de un usuario, puedes agregar un filtro como: where('user_id', auth()->id())
        
        return view('mis', compact('reportes')); // Pasar los reportes a la vista
    }

    // Guarda el reporte y genera un número de ticket
    public function guardar(Request $request)
    {
        //$user = json_encode($request['user']);
        $user = $request['user'];
        //print($user);
        try {
            $validated = $request->validate([
                'tipo_documento' => 'required|string|in:cc,ce,ti',
                'numero_documento' => 'required|string|max:255',
                'nombre_propietario' => 'required|string|max:255',
                'ubicacion_perdida' => 'required|string|max:255',
                'detalle_reporte' => 'required|string|max:255',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
        // Validar los datos del formulario, ahora con los campos tipo_documento y numero_documento

        
        $tiempo = now();
        
        try {
            // Guardar el documento en la base de datos
            $documento = Documento::firstOrCreate([
                'tipo_documento' => $validated['tipo_documento'],
                'numero_documento' => $validated['numero_documento'],
                'nombre_propietario' => $validated['nombre_propietario'],
                'foto_documento' => null,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

        try {
            // Guardar el reporte en la base de datos
            Reporte::create([
                'fecha_reporte' => $tiempo,
                'ubicacion_perdida' => $validated['ubicacion_perdida'],
                'detalle_reporte' => $validated['detalle_reporte'],
                'estado' => 'en_revision',
                'id_documento_id' => $documento->id,
                'id_usuario_id' => $user['id'],
            ]);
    
            // Redirigir a la vista de creación de reporte con el ticket generado
            return redirect()->route('mis-reportes');
        } catch (\Throwable $th) {
            throw $th;
        }
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
