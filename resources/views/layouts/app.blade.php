<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocFi - Reporte de Documentos Extraviados</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="font-family: 'Roboto', sans-serif; background-color: #FFFFFF;">
    <header>
        <nav style="background-color: #004455; color: white;">
            <div class="container">
                <ul style="list-style: none; display: flex; padding: 0;">
                    <li><a href="/inicio" style="color: white; padding: 15px;">INICIO</a></li>
                    <li><a href="/reportes" style="color: white; padding: 15px;">REPORTES</a></li>
                    <li><a href="/contacto" style="color: white; padding: 15px;">CONTACTO</a></li>
                    <!-- Enlace a la Política de Privacidad -->
                    <li><a href="{{ route('privacy.policy') }}" style="color: white; padding: 15px;">POLÍTICA DE PRIVACIDAD</a></li>
                    <!-- Enlace a los Términos y Condiciones -->
                    <li><a href="{{ route('terms.conditions') }}" style="color: white; padding: 15px;">TÉRMINOS Y CONDICIONES</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer style="background-color: #285EAF; color: white; text-align: center; padding: 10px 0;">
        <p>&copy; 2024 DocFi. Todos los derechos reservados.</p>
        <a href="{{ route('terms.conditions') }}" style="color: white; padding: 10px;">Términos y condiciones</a> |
        <a href="{{ route('privacy.policy') }}" style="color: white; padding: 10px;">Política de privacidad</a>
    </footer>
</body>
</html>
