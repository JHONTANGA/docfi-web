<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocFi | Encuentra tus documentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f8fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 220px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: -220px;
            background: linear-gradient(to bottom right, #0056b3, #9b59b6);
            color: #fff;
            padding: 20px;
            transition: left 0.3s ease;
            z-index: 999;
        }

        .sidebar:hover {
            left: 0;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin: 15px 0;
            font-weight: 500;
        }

        .hero {
            background: linear-gradient(to right, #00f2fe, #4facfe);
            color: #fff;
            padding: 80px 30px;
            text-align: center;
            width: 100%;
            margin: 0;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .btn-hero {
            padding: 10px 30px;
            background-color: #ffffff;
            color: #007bff;
            font-weight: 600;
            border-radius: 30px;
            border: none;
        }

        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            border-top: 1px solid #dee2e6;
        }

        footer a {
            color: #007bff;
            margin: 0 10px;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .top-menu .dropdown-menu a {
            color: #007bff;
        }

        .top-menu .dropdown-menu {
            border-radius: 10px;
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4 class="text-white">DocFi</h4>
        <a href="{{ url('/login') }}">Iniciar Sesión</a>
        <a href="{{ url('/register') }}">Registrarse</a>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-end pt-3 pe-3 align-items-center top-menu flex-wrap">

            <!-- PQR -->
            <div class="dropdown me-3">
                <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" role="button" id="pqrDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    PQR
                </a>
                <ul class="dropdown-menu" aria-labelledby="pqrDropdown">
                    <li><a class="dropdown-item" href="{{ route('pqr') }}">Crear PQR</a></li>
                </ul>
            </div>

            <!-- Reportes -->
            <div class="dropdown me-3">
                <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" role="button" id="reportesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Reportes
                </a>
                <ul class="dropdown-menu" aria-labelledby="reportesDropdown">
                    <li><a class="dropdown-item" href="{{ route('buscar-reportes') }}">Ver reportes</a></li>
                    <li><a class="dropdown-item" href="{{ Auth::check() ? route('mis-reportes') : route('login') }}">Mis reportes</a></li>
                </ul>
            </div>

            <!-- Información -->
            <div class="dropdown me-3">
                <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" role="button" id="infoDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Información
                </a>
                <ul class="dropdown-menu" aria-labelledby="infoDropdown">
                    <li><a class="dropdown-item" href="{{ route('infoDocfi') }}">¿Quiénes somos?</a></li>
                    <li><a class="dropdown-item" href="{{ route('infoDocfi') }}">¿Cómo funciona?</a></li>
                </ul>
            </div>

            <!-- Perfil -->
            <div class="dropdown me-3">
                <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" role="button" id="perfilDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Mi Perfil
                </a>
                <ul class="dropdown-menu" aria-labelledby="perfilDropdown">
                    <li><a class="dropdown-item" href="{{ Auth::check() ? route('contacto') : route('login') }}">Información de contacto</a></li>
                    <li><a class="dropdown-item" href="{{ Auth::check() ? route('privacy') : route('login') }}">Política de privacidad</a></li>
                    <li><a class="dropdown-item" href="{{ Auth::check() ? route('terms.conditions') : route('login') }}">Términos y condiciones</a></li>
                </ul>
            </div>
        </div>

        <!-- HERO FULL WIDTH -->
        <div class="hero mt-3">
            <h1>ENCUENTRA TUS DOCUMENTOS PERDIDOS</h1>
            <p>Reporta documentos personales perdidos para ayudar a encontrar a su dueño. ¡Únete ahora!</p>
            <a href="{{ url('/login') }}" class="btn btn-hero">¡Ingresar!</a>
        </div>

        <!-- Contenido adicional -->
        <div class="container mt-5">
            <h5><strong>Plataforma para encontrar y reportar documentos perdidos</strong></h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet eros ut urna lacinia malesuada.</p>
        </div>
    </div>

    <footer class="text-center mt-5">
        <div class="container">
            <p class="mb-2">
                <a href="{{ route('terms.conditions') }}">Términos y Condiciones</a> |
                <a href="{{ route('privacy') }}">Política de Privacidad</a>
            </p>
            <small class="text-muted">&copy; {{ date('Y') }} DOCFI. Todos los derechos reservados.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
