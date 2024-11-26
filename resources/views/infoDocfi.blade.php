<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCFI - ¿QUIENES SOMOS?</title>
    <!-- Vinculo al CSS -->
    <link rel="stylesheet" href="infoDocficss.css">
    @vite(['resources/css/infoDocficss.css'])
</head>
<body>
<!-- Encabezado -->
    <header>
        <div class="header-container">
            <!-- Logo -->
            <div class="logo">
                <img src="{{asset('images/Web_Images/logoDocfi.png')}}" alt="DocFi Logo">
            </div>
            
            <!-- Barra de búsqueda -->
            <div class="search-bar">
                <input type="text" placeholder="Buscar">
                <button class="search-button">
                    <img src="{{asset('images/Web_Images/busqueda.png')}}" alt="buscar" class="search-icon">
                </button>
            </div>

            <!-- Barra lateral -->
            <div class="lateral-container">
                <div class="sidebar" id="sidebar">
                    <ul>
                        <li><a href="#">INICIAR SESIÓN</a></li>
                        <li><a href="#">REGISTRARSE</a></li>
                    </ul>
                </div>
                <button class="toggle-btn" id="toggleBtn-sidebar">☰</button>
            </div>
        </div>
    

<!-- Menú principal inicio -->
    <nav class="menu-contenido">
        <a href="#quienes-somos" class="menu-item">¿QUIÉNES SOMOS?</a>
        <a href="#como-funciona" class="menu-item">¿CÓMO FUNCIONA?</a>
    </nav>

<!-- Menú desplegable de reportes -->
    <div class="menu-reportes">
        <a href="#" class="menu-item" id="menuReportes">MIS REPORTES</a>
        <div class="dropdown-menu" id="dropdownMenu">
            <a href="{{ route('crear-reporte') }}">Crear Reporte</a>
            <a href="{{ route('mis-reportes') }}">Mis Reportes</a>
            <a href="{{ route('eliminar-reporte') }}">Eliminar Reporte</a>
            <a href="{{ route('buscar-reportes') }}">Buscar Reportes</a>
        </div>
    </div>

</header>


<main>
        <section class="about">
            <div class="about-content">
                <h1>¿QUIÉNES SOMOS?</h1>
                <h1>
                    <br>
                    <strong>DocFi</strong> es una plataforma innovadora diseñada 
                    para ayudar a las personas a reportar y recuperar documentos perdidos.
                </h1>
                <br>
                <h1>
                    Ya sea, que hayas perdido tu identificación, 
                    pasaporte, licencia de conducir u otros
                    documentos importantes que se encuentren 
                    disponibles en nuestra app móvil o plataforma
                    web.
                </h1>
                <br>
                <h1><strong>DocFi</strong> te ofrece una solución sencilla y eficiente 
                para recuperarlos.
</h1>
            </div>
            <div class="about-image">
                <img src="{{asset('images/Web_Images/info.jpg')}}" alt="Imagen representativa">
            </div>
        </section>

        <section class="how-it-works">
            <h1>¿CÓMO FUNCIONA?</h1>
            <br>
            <div class="steps">
                <div class="step">
                    <h2>1. Reportar un Documento Perdido</h2>
                    <br>
                    <p>
                        Si has perdido un documento importante, simplemente ingresa a nuestra plataforma y sigue estos pasos:
                    </p>
                    <br>
                    <ul>
                        <li><strong>Registro:</strong> Crea una cuenta en nuestra página web o aplicación móvil.</li>
                        <br>  
                        <li><strong>Reporte de Pérdida:</strong> Completa un formulario con los detalles del documento perdido.</li>
                        <br>
                        <li><strong>Descripción Adicional:</strong> Añade información adicional como lugar o fecha aproximada.</li>
                        <br>
                        <li><strong>Notificaciones:</strong>Notificaciones: Activa alertas para recibir información si alguien encuentra tu documento.</li>
                    </ul>
                </div>
                <div class="step">
                    <h2>2. Encontrar un Documento</h2>
                    <br>
                    <p>
                        Si has encontrado un documento que no te pertenece, puedes ayudar a devolverlo a su dueño siguiendo estos pasos:
                    </p>
                    <br>
                    <ul>
                        <li>Registro: Crea una cuenta e inicia sesión.</li>
                        <br>
                        <li>Reporte de Encuentro: Completa un formulario con detalles del documento encontrado.</li>
                        <br>
                        <li>Subir Fotos: Si es posible, sube fotos del documento.</li>
                        <br>
                        <li>Entrega Segura: Coordinamos la entrega del documento al dueño legítimo.</li>
                    </ul>
                </div>
            </div>
        </section>

        <br>
        <section class="social-media">
            <p>Comparte esta información:</p>
            <a href="https://facebook.com/" target="_blank" class="social-link">
                <img src="{{asset('images/Web_Images/facebook.png')}}" alt="Facebook" class="social-icon">
            </a>
            <a href="https://x.com/" target="_blank" class="social-link">
                <img src="{{asset('images/Web_Images/X.png')}}" alt="X" class="social-icon">
            </a>
            <a href="https://www.instagram.com/" target="_blank" class="social-link">
                <img src="{{asset('images/Web_Images/instagram.png')}}" alt="instagram" class="social-icon">
            </a>
            <a href="https://www.tiktok.com/" target="_blank" class="social-link">
                <img src="{{asset('images/Web_Images/tik-tok.png')}}" alt="tiktok" class="social-icon">
            </a>
        </section>

<!-- Footer -->
    <footer style="background-color: #285EAF;color: white;text-align: center;padding: 10px 0;">
        <p>© 2024 DocFi. Todos los derechos reservados.</p>
        <a href="{{ route('terms.conditions') }}" style="color: white; padding: 10px;">Términos y condiciones</a> |
        <a href="#">Política de cookies</a> |
        <a href="{{ route('privacy.policy') }}" style="color: white; padding: 10px;">Política de privacidad</a>
    </footer>
    

<!-- Script para la funcionalidad de la barra lateral -->
  <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleBtn = document.getElementById("toggleBtn-sidebar");
            const sidebar = document.getElementById("sidebar");

            toggleBtn.addEventListener("click", function () {
                sidebar.classList.toggle("show");
            });
        });
    </script>

 <!-- Script para el menú desplegable -->
 <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuReportes = document.getElementById("menuReportes");
            const dropdownMenu = document.getElementById("dropdownMenu");

            menuReportes.addEventListener("click", function (event) {
                dropdownMenu.classList.toggle("show");
                event.stopPropagation();
            });

            document.addEventListener("click", function (event) {
                if (!dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove("show");
                }
            });
        });
    </script>



</body>
</html>
