<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DocFi | @yield('title', 'Encuentra tus documentos')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f8fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Estilos para centrar el footer */
    footer .container {
      text-align: center;
      padding: 1rem 0;
    }

    footer .container a {
      margin: 0 8px;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <!-- MENU SUPERIOR -->
  <div class="d-flex justify-content-end pt-3 pe-3 align-items-center top-menu flex-wrap" style="margin-left: 220px;">
    <div class="dropdown me-3">
      <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="{{ route('pqr') }}" data-bs-toggle="dropdown">PQR</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('pqr') }}">Crear PQR</a></li>
      </ul>
    </div>

    <div class="dropdown me-3">
      <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">Reportes</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('mis-reportes') }}">Ver reportes</a></li>
        <li><a class="dropdown-item" href="{{ route('mis-reportes') }}">Mis reportes</a></li>
      </ul>
    </div>

    <div class="dropdown me-3">
      <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">Información</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('infoDocfi') }}">¿Quiénes somos?</a></li>
        <li><a class="dropdown-item" href="{{ route('infoDocfi') }}">¿Cómo funciona?</a></li>
      </ul>
    </div>

    <div class="dropdown me-3">
      <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">Mi Perfil</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Información de contacto</a></li>
        <li><a class="dropdown-item" href="{{ route('privacy.policy') }}">Política de privacidad</a></li>
        <li><a class="dropdown-item" href="{{ route('terms.conditions') }}">Términos y condiciones</a></li>
      </ul>
    </div>
  </div>

  <!-- SECCIÓN PRINCIPAL -->
  @hasSection('hero')
    <div class="hero mt-3">
      @yield('hero')
    </div>
  @endif

  <main class="content">
    @yield('content')
  </main>

  <footer>
    <div class="container">
      <p class="mb-2">
        <a href="{{ route('terms.conditions') }}">Términos y Condiciones</a> |
        <a href="{{ route('privacy.policy') }}">Política de Privacidad</a>
      </p>
      <small class="text-muted">&copy; 2025 DOCFI. Todos los derechos reservados.</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function mostrarFormulario(tipo) {
      const loginForm = document.getElementById('form-login');
      const registroForm = document.getElementById('form-registro');

      if (tipo === 'login') {
        loginForm.style.display = 'block';
        registroForm.style.display = 'none';
      } else if (tipo === 'registro') {
        registroForm.style.display = 'block';
        loginForm.style.display = 'none';
      }
    }
  </script>

  @stack('scripts')

</body>
</html>
