<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCFI_INCIO</title>
    <link rel="stylesheet" href="EstiloInicio.css">
    @vite(['resources/css/EstiloInicio.css'])
</head>
<body>
    <!-- ENCABEZADO 1 -->
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="C:/Users/geral/Downloads/pruebaproyecto/images/logoDocfi.png" alt="DocFi Logo">
            </div>

            <div class="search-bar">
                <input type="text" placeholder="Buscar">
                <button class="search-button">
                    <img src="C:/Users/geral/Downloads/pruebaproyecto/images/lupa.png" alt="Buscar" class="search-icon">
                </button>
            </div>

            <div class="header-links">
                <a href="#">INICIAR SESIÓN</a>
                <a href="#">REGISTRARSE</a>
                <a href="#">¿QUIÉNES SOMOS?</a>
                <a href="#">¿CÓMO FUNCIONA?</a>
            </div>
        </div>

        <!-- Menú Desplegable Reportes -->
        <div class="menu-reportes">
            <a href="#" class="dropdown-toggle">MIS REPORTES</a>
            <div class="dropdown-menu">
                <a href="{{ route('crear-reporte') }}">Crear Reporte</a>
                <a href="{{ route('mis-reportes') }}">Mis Reportes</a>
                <a href="{{ route('eliminar-reporte') }}">Eliminar Reporte</a>
                <a href="{{ route('buscar-reportes') }}">Buscar Reportes</a>
            </div>
        </div>
    </header>
    
    <!-- intro Section -->
    <div class="intro-section">
        <h1>ENCUENTRA TUS DOCUMENTOS PERDIDOS</h1>
        <p>Reporta documentos personales perdidos para ayudar a encontrar a su dueño. ¡Únete ahora!</p>
        <a href="#" class="btn">¡Regístrate!</a>
    </div>

    <!-- Main Content -->
    <div class="container">
        <section>
            <div class="container2">
                <h2>Plataforma para encontrar documentos perdidos</h2>
                <p>Docfi es una plataforma web que permite a los usuarios reportar documentos extraviados.</p>
                <a href="#" class="btn">Reportar</a>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <a href="#">Términos y condiciones</a> |
        <a href="#">Política de cookies</a> |
        <a href="#">Política de privacidad</a>
        <p>&copy; 2024 Docfi</p>
    </footer>

    <script>
        const dropdownToggle = document.querySelector('.dropdown-toggle');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener('click', function(event) {
            dropdownMenu.classList.toggle('show');
            event.stopPropagation();
        });

        document.addEventListener('click', function(event) {
            if (!dropdownToggle.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    </script>

</body>
</html>
