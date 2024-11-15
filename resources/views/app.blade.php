<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocFi - Reporte de Documentos Extraviados</title>
    <!-- Vincular con Google Fonts (Roboto) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Vincular con el archivo de estilos CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="font-family: 'Roboto', sans-serif; background-color: #FFFFFF;">
    <header>
        <!-- Barra de navegación -->
        <nav style="background-color: #004455; color: white;">
            <div class="container">
                <ul style="list-style: none; display: flex; padding: 0;">
                    <li><a href="/" style="color: white; padding: 15px;">INICIO</a></li>
                    <li><a href="/reportes" style="color: white; padding: 15px;">REPORTES</a></li>
                    <li><a href="/contacto" style="color: white; padding: 15px;">CONTACTO</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <!-- Contenido dinámico -->
        @yield('content')
    </main>

    <footer style="background-color: #285EAF; color: white; text-align: center; padding: 10px 0;">
        <p>&copy; 2024 DocFi. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
