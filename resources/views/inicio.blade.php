<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCFI_INCIO</title>
    <link rel="stylesheet" href="EstiloInicio.css">
    <!-- 
        Es necesario instalar las dependencias de npm para usar vite
        En la terminal (en la carpeta raiz del proyecto) usar: npm install

        cuando las dependencias se instalen, (y con el servidor de artisan activado (php artisan serve))
        ejecutar el comando en una nueva ventana de la terminal: npm run dev

        OJO: no cerrar el servidor de artisan, ambas deben permanecer abiertas

        Esto permitirá compilar los recursos (la carpeta resources)

        Borrar este comentario cuando lo crean necesario *
    -->
    @vite(['resources/css/EstiloInicio.css'])
</head>
<body>
    <!-- ENCABEZADO 1 -->
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

        <section class="document-list">
            <div class="document-card">
                <h3>Documentos de identidad</h3>
                <a href="#">Ver más...</a>
            </div>
            <div class="document-card">
                <h3>Licencias</h3>
                <a href="#">Ver más...</a>
            </div>
            <div class="document-card">
                <h3>Pasaportes</h3>
                <a href="#">Ver más...</a>
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
</body>
</html>