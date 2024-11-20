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
            <img src="C:/Users/geral/Downloads/pruebaproyecto/images/logoDocfi.png" alt="DocFi Logo" style="height: 100px;">
        </div>
    </header>

    <!-- Formulario Crear Reporte -->
    <div class="form-container">
        <h1>Crear un Reporte</h1>
        <form method="POST" action="{{ route('crear-reporte') }}">
            @csrf
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre_reportante" placeholder="Escribe tu nombre" required>
            </div>

            <div class="input-group">
                <label for="contacto">Número de Contacto:</label>
                <input type="text" id="contacto" name="contacto" placeholder="Escribe tu número de contacto" required>
            </div>

            <div class="input-group">
                <label for="descripcion">Descripción de los Hechos:</label>
                <textarea id="descripcion" name="descripcion" placeholder="Describe brevemente los hechos" required></textarea>
            </div>

            <div class="input-group">
                <label for="clasificacion">Clasificación:</label>
                <select id="clasificacion" name="clasificacion" required>
                    <option value="perdido">Documento Perdido</option>
                    <option value="encontrado">Documento Encontrado</option>
                </select>
            </div>

            <div class="input-group">
                <label for="direccion">Dirección Cercana:</label>
                <input type="text" id="direccion" name="direccion" placeholder="Escribe la dirección donde se encontró" required>
            </div>

            <!-- Nuevo campo: Tipo de Documento -->
            <div class="input-group">
                <label for="tipo_documento">Tipo de Documento:</label>
                <select id="tipo_documento" name="tipo_documento" required>
                    <option value="pasaporte">Pasaporte</option>
                    <option value="cedula_ciudadania">Cédula de Ciudadanía</option>
                    <option value="cedula_extranjeria">Cédula de Extranjería</option>
                    <option value="tarjeta_identidad">Tarjeta de Identidad</option>
                </select>
            </div>

            <!-- Nuevo campo: Número de Documento -->
            <div class="input-group">
                <label for="numero_documento">Número de Documento:</label>
                <input type="text" id="numero_documento" name="numero_documento" placeholder="Escribe el número de documento" required>
            </div>

            <button type="submit" class="btn">Generar Reporte</button>
        </form>
    </div>

    <!-- Mostrar el número de ticket generado -->
    @if (session('ticket'))
    <div class="ticket-notification">
        <p>Tu reporte ha sido creado con el número de ticket: <strong>{{ session('ticket') }}</strong></p>
    </div>
    @endif

</body>
</html>
