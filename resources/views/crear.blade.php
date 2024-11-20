<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reporte</title>
    @vite(['resources/css/EstiloInicio.css'])
</head>
<body>
    <header>
    <header style="display: flex; align-items: center; justify-content: space-between; padding: 70px; background-color: #ffffff;">
        <div style="flex: 2;">
            <img src="C:/Users/geral/Downloads/pruebaproyecto/images/logoDocfi.png" alt="DocFi Logo" style="height: 100px;">
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Buscar">
            <button class="search-button">
                <img src="C:\Users\geral\Downloads\pruebaproyecto\images\lupa.png" alt="Buscar" class="search-icon">
            </button>
        </div>
       

        <div class="sesion1" style="margin-bottom: 20px;">
            <a href="#" style="color: #000000; text-decoration: none;">INICIAR SESIÓN</a>
            <a href="#" style="color: #000000; text-decoration: none;">REGISTRARSE</a>
        </div>
    
        <div class="sesion2">
            <a1 href="#" style="color: #000000; text-decoration: none;">¿QUIÉNES SOMOS?</a>
            <a2 href="#" style="color: #000000; text-decoration: none;">¿CÓMO FUNCIONA?</a>
        </div>

    
    </header>

    <div class="container">
        <h2>Crear Reporte</h2>
        <form method="POST" action="{{ route('guardar-reporte') }}">
            @csrf
            <!-- Aquí agregarás los campos para el tipo de documento, descripción, etc. -->
            <label for="tipo_documento">Tipo de Documento</label>
            <input type="text" name="tipo_documento" id="tipo_documento" required>

            <label for="nombre_reportante">Nombre del Reportante</label>
            <input type="text" name="nombre_reportante" id="nombre_reportante" required>

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" required></textarea>

            <button type="submit">Crear Reporte</button>
        </form>
    </div>

    <footer>
        <!-- Aquí puedes agregar el pie de página -->
    </footer>
</body>
</html>
