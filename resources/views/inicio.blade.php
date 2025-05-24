<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
      left: -180px;
      background: linear-gradient(to right, #00f2fe, #4facfe);
      color: #fff;
      padding: 20px;
      transition: left 0.3s ease;
      z-index: 999;
    }

    .sidebar:hover {
      left: 0;
    }

    .sidebar h4 {
      color: #fff;
      margin-bottom: 20px;
    }

    .sidebar a {
      color: #fff;
      text-decoration: none;
      display: block;
      margin: 15px 0;
      font-weight: 500;
      cursor: pointer;
    }

    .hero {
      background: linear-gradient(to right, #00f2fe, #4facfe);
      color: #fff;
      padding: 80px 30px;
      text-align: center;
    }

    .hero h1 {
      font-size: 2.5rem;
      font-weight: bold;
    }

    .hero p {
      font-size: 1.1rem;
      margin-bottom: 0;
    }

    .form-container {
      display: none;
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      padding: 30px;
      border-radius: 10px;
      margin-top: 30px;
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

    .btn-docfi {
      background: linear-gradient(to right, #00f2fe, #4facfe);
      color: white;
      border: none;
      padding: 10px 20px;
      font-weight: 500;
      border-radius: 5px;
      transition: 0.3s ease;
    }

    .btn-docfi:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>

  <!-- BARRA LATERAL -->
  <div class="sidebar">
    <h4>DocFi</h4>
    <a onclick="mostrarFormulario('login')">Iniciar Sesión</a>
    <a onclick="mostrarFormulario('registro')">Registrarse</a>
  </div>

  <!-- MENU SUPERIOR -->
  <div class="d-flex justify-content-end pt-3 pe-3 align-items-center top-menu flex-wrap">
    <div class="dropdown me-3">
      <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="{{ route('pqr') }}" data-bs-toggle="dropdown">PQR</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('pqr') }}">Crear PQR</a></li>
        <li><a class="dropdown-item" href="{{ route('consultar-pqr') }}">Consultar PQR</a></li>
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
        <li>
          <a class="dropdown-item" href="#" onclick="mostrarFormulario('login'); document.getElementById('form-login').scrollIntoView({ behavior: 'smooth' });">
            Información de contacto
          </a>
        </li>
      </ul>
    </div>
  </div>

  <!-- SECCIÓN PRINCIPAL -->
  <div class="hero mt-3">
    <h1>ENCUENTRA TUS DOCUMENTOS PERDIDOS</h1>
    <p>Reporta documentos personales perdidos para ayudar a encontrar a su dueño. ¡Únete ahora!</p>
  </div>

  <!-- FORMULARIOS -->
  <div class="container">
    <div id="form-login" class="form-container">
      <h3 class="mb-3">Iniciar Sesión</h3>
      <form>
        <div class="mb-3">
          <label for="loginEmail" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="loginEmail" required>
        </div>
        <div class="mb-3">
          <label for="loginPassword" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="loginPassword" required>
        </div>
        <button type="submit" class="btn-docfi">Ingresar</button>
      </form>
    </div>

    <div id="form-registro" class="form-container">
      <h3 class="mb-3">Registrarse</h3>
      <form>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre completo</label>
          <input type="text" class="form-control" id="nombre" required>
        </div>
        <div class="mb-3">
          <label for="registroEmail" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="registroEmail" required>
        </div>
        <div class="mb-3">
          <label for="registroPassword" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="registroPassword" required>
        </div>
        <button type="submit" class="btn-docfi">Registrar</button>
      </form>
    </div>
  </div>

  <!-- PIE DE PÁGINA -->
  <footer class="text-center mt-5">
    <div class="container">
      <p class="mb-2">
        <a href="{{ route('terms.conditions') }}">Términos y Condiciones</a> |
        <a href="{{ route('privacy.policy') }}">Política de Privacidad</a>
      </p>
      <small class="text-muted">&copy; 2025 DOCFI. Todos los derechos reservados.</small>
    </div>
  </footer>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function mostrarFormulario(tipo) {
      const loginForm = document.getElementById('form-login');
      const registroForm = document.getElementById('form-registro');

      loginForm.style.display = tipo === 'login' ? 'block' : 'none';
      registroForm.style.display = tipo === 'registro' ? 'block' : 'none';
    }
  </script>
</body>
</html>


