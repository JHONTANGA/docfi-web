<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCFI_INICIO</title>
    <!-- Vinculo al CSS -->
    <link rel="stylesheet" href="EstiloInicio.css">
    @vite(['resources/css/EstiloInicio.css'])
</head>
<body>
<!-- Encabezado -->
    <x-header/>
<!-- Sección 2 introducción -->
    <section class="intro-section">
        <h1>ENCUENTRA TUS DOCUMENTOS PERDIDOS</h1>
        <p>Reporta documentos personales perdidos para ayudar a encontrar a su dueño. ¡Únete ahora!</p>
        <a href="#" class="btn">¡Regístrate!</a>
    </section>

<!-- Sección 3 - Contenido principal -->
    <main class="container">
        <section class="content-section">
        <div class="left-column">
             <h2>Plataforma para encontrar documentos perdidos</h2>
             <p>Docfi es una plataforma web que permite a los usuarios reportar documentos extraviados.</p>
             <a href="#" class="btn">Reportar</a>
        </div>

        <div class="right-column">
             <img src="{{ asset('images/Web_Images/encab1.png')}}" alt="contenido" class="imgcontainer"> 
        </div>          
        </section>

<!-- Sección 4 - Lista de documentos -->
    <div class="document-card">
        <h1>Encuentra tu tipo de documento aquí</h1>
        <div class="cards">
            <div class="card">
                <h3>Documentos identidad</h3>
                <img src="{{ asset('images/Web_Images/carnet.png')}}" alt="Icono_doc">
                <p>Ver más...</p>
            </div>

            <div class="card">
                <h3>Licencias</h3>
                <img src="{{ asset('images/Web_Images/carnet.png')}}" alt="Icono_doc">
                <p>Ver más...</p>
            </div>

            <div class="card">
                <h3>Pasaportes</h3>
                <img src="{{ asset('images/Web_Images/carnet.png')}}" alt="Icono_doc">
                <p>Ver más...</p>
            </div>
        </div>
    </div>

<!-- Footer -->
    <footer style="background-color: #285EAF;color: white;text-align: center;padding: 10px 0;">
        <p>© 2024 DocFi. Todos los derechos reservados.</p>
        <a href="{{ route('terms.conditions') }}" style="color: white; padding: 10px;">Términos y condiciones</a> |
        <a href="#">Política de cookies</a> |
        <a href="{{ route('privacy.policy') }}" style="color: white; padding: 10px;">Política de privacidad</a>
    </footer>

</body>
</html>
