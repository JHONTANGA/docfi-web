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
<!-------- Sesion 1 principal ------------------------>
    <header>
        <div class="header-container">
        <div class="logo">
             <img src="{{asset('images/Web_Images/logoDocfi.png')}}" alt="DocFi Logo">            </div>
            
               <!-- Barra de Búsqueda -->
        <div class="search-bar">
            <input type="text" placeholder="Buscar">
            <button class="search-button">
                <img src="{{asset('images/Web_Images/busqueda.png') }}" alt="buscar" class="search-icon">
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


<!--  JavaScript menu lateral inicio sesion, registr..-->
<!-- <script src="{{ asset('js/script-MenuLateral.js') }}"></script> -->
     <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleBtn = document.getElementById("toggleBtn-sidebar");
            const sidebar = document.getElementById("sidebar");

            toggleBtn.addEventListener("click", function () {
                sidebar.classList.toggle("show");
            });
        });
     </script>


<!-- Menu Contenido Principal cuadros -->
        <nav class="menu-contenido">
            <a href="#quienes-somos" class="menu-item">¿QUIÉNES SOMOS?</a>
            <a href="#como-funciona" class="menu-item">¿CÓMO FUNCIONA?</a>
        </nav>
   
       
<!---- Menú Desplegable Reportes ------->
        <div class="menu-reportes">
        <a href="#" class="menu-item"id="menuReportes">MIS REPORTES</a>
        <div class="dropdown-menu" id="dropdownMenu">
            <a href="{{ route('crear-reporte') }}">Crear Reporte</a>
            <a href="{{ route('mis-reportes') }}">Mis Reportes</a>
            <a href="{{ route('eliminar-reporte') }}">Eliminar Reporte</a>
            <a href="{{ route('buscar-reportes') }}">Buscar Reportes</a>
        </div>
        </div>
    

  <!---- Script para que el Menú Despliegue Reportes ------->
        <script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuReportes = document.getElementById("menuReportes");
        const dropdownMenu = document.getElementById("dropdownMenu");

        menuReportes.addEventListener("click", function (event) {
            event.preventDefault(); // Evita que el enlace recargue la página
            dropdownMenu.classList.toggle("show");
        });

        // Cerrar el menú desplegable al hacer clic fuera
        document.addEventListener("click", function (event) {
            if (!menuReportes.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove("show");
            }
        });
    });
</script>





</header>
    
<!------ Sección 2 introductoria zona azul ------------------>
    <section class="intro-section">
         <h1>ENCUENTRA TUS DOCUMENTOS PERDIDOS</h1>
         <p>Reporta documentos personales perdidos para ayudar a encontrar a su dueño. ¡Únete ahora!</p>
         <a href="#" class="btn">¡Regístrate!</a>
    </section>


<!----- sección 3 Contenido principal ---------------------->
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


<!-------- Sección 4 lista documentos ------------------------>
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

<!---- Footer ------------>
  
     <footer>
    <!-- Enlaces correctamente vinculados a las rutas de términos y condiciones y política de privacidad -->
    <a href="{{ route('terms.conditions') }}">Términos y condiciones</a> |
    <a href="#">Política de cookies</a> |
    <a href="{{ route('privacy.policy') }}">Política de privacidad</a>
    <p>&copy; 2024 Docfi</p>
</footer>

</body>
</html>
