<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reporte</title>
    <link rel="stylesheet" href="{{ asset('css/EstiloCrearReporte.css') }}">
    @vite(['resources/css/EstiloCrearReporte.css'])
</head>

<body>
    <header>
        <div style="padding: 30px; text-align: center;">
            <a href="{{ route('inicio') }}">
                <img src="{{asset('images/Web_Images/logoDocfi.png')}}" alt="DocFi Logo" style="height: 100px;">
            </a>
        </div>
    </header>

    <!-- Formulario Crear Reporte -->
    <div class="form-container">
        <h1>Crear un Reporte</h1>
        <form method="POST" action="{{ route('guardar-reporte') }}">
            @csrf
            <div class="input-group">
                <label for="tipo_documento">Tipo de Documento:</label>
                <select id="tipo_documento" name="tipo_documento" required>
                    <option value="cc">Cedula de Ciudadania</option>
                    <option value="ce">Cedula de Extrangería</option>
                    <option value="ti">Tarjeta de Identidad</option>
                </select>
            </div>
            <!-- Nuevo campo: Número de Documento -->
            <div class="input-group">
                <label for="numero_documento">Número de Documento:</label>
                <input type="text" id="numero_documento" name="numero_documento" placeholder="Escribe el número de documento" required>
            </div>
            <div class="input-group">
                <label for="nombre">Nombre en el Documento:</label>
                <input type="text" id="nombre_propietario" name="nombre_propietario" placeholder="Propietario del Documento" required>
            </div>

            <div class="input-group">
                <label for="direccion">Ubicación de perdida:</label>
                <input type="text" id="ubicacion_perdida" name="ubicacion_perdida" placeholder="Escribe la dirección donde se encontró" required>
            </div>

            <div class="input-group">
                <label for="detalle_reporte">Detalles:</label>
                <textarea id="detalle_reporte" name="detalle_reporte" placeholder="Describe brevemente los hechos o detalles adicionales" required></textarea>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <button type="submit" class="btn">Generar Reporte</button>
        </form>
    </div>

</body>

</html>