<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reportes</title>
    <link rel="stylesheet" href="{{ asset('css/EstiloMisReportes.css') }}">
    @vite(['resources/css/EstiloMisReportes.css'])
</head>
<body>
    <!-- Encabezado -->
    <x-header/>

    <!-- Contenedor de los Reportes -->
    <div class="container">
        <h1>Mis Reportes</h1>

        <!-- Tabla de reportes -->
        <table class="report-table">
            <thead>
                <tr>
                    <th>Tipo de documento</th>
                    <th>Numero de documento</th>
                    <th>Propietario del Documento</th>
                    <th>Descripción</th>
                    <th>Dirección de perdida</th>
                    <th>Estado</th>
                    <th>Reportado por</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí puedes simular que hay reportes con un array -->
                @foreach ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte['tipo_documento'] }}</td>
                    <td>{{ $reporte['numero_documento'] }}</td>
                    <td>{{ $reporte['nombre_propietario'] }}</td>
                    <td>{{ $reporte['detalle_reporte'] }}</td>
                    <td>{{ $reporte['ubicacion_perdida'] }}</td>
                    <td>{{ $reporte['estado'] }}</td>
                    <td>{{ $reporte['first_name'], $reporte['last_name'] }}</td>
                    <td>
                        <a href="{{ route('crear-reporte') }}" class="btn">Ver Reporte</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Enlace para crear un nuevo reporte -->
        <a href="{{ route('crear-reporte') }}" class="btn crear-reporte-btn">Crear Nuevo Reporte</a>
    </div>
</body>
</html>
