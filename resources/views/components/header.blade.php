@vite(['resources/css/headerStyle.css'])
<!-- Encabezado -->
<header>
        <div class="header-container">
            <!-- Logo -->
            <div class="logo">
                <a href="{{ route('inicio') }}">
                    <img src="{{asset('images/Web_Images/logoDocfi.png')}}" alt="DocFi Logo">
                </a>
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
        <a href="{{ route('infoDocfi') }}" class="menu-item">¿QUIÉNES SOMOS?</a>
        <a href="{{ route('infoDocfi') }}" class="menu-item">¿CÓMO FUNCIONA?</a>
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

<!-- Script para el menú desplegable -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuReportes = document.getElementById("menuReportes");
        const dropdownMenu = document.getElementById("dropdownMenu");

        menuReportes.addEventListener("click", function(event) {
            dropdownMenu.classList.toggle("show");
            event.stopPropagation();
        });

        document.addEventListener("click", function(event) {
            if (!dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove("show");
            }
        });
    });
</script>

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

<!--
<script>
    document.getElementById('sidebar').classList.toggle('show');
</script>
-->