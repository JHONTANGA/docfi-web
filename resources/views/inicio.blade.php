<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DocFi | Encuentra tus documentos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #FFFFFF;
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      color: #454C72;
    }

    /* BARRA LATERAL */
    .sidebar {
      width: 220px;
      position: fixed;
      top: 0;
      bottom: 0;
      left: -180px;
      background-color: #004455;
      color: #FFFFFF;
      padding: 20px;
      transition: left 0.3s ease;
      z-index: 999;
    }

    .sidebar:hover {
      left: 0;
    }

    .sidebar h4 {
      color: #FFFFFF;
      margin-bottom: 20px;
    }

    .sidebar a {
      color: #FFFFFF;
      text-decoration: none;
      display: block;
      margin: 15px 0;
      font-weight: 500;
      cursor: pointer;
    }

    .hero {
      background-color: #285EAF;
      color: #FFFFFF;
      padding: 80px 30px;
      text-align: center;
    }

    .hero h1 {
      font-size: 2.5rem;
      font-weight: bold;
    }

    .hero p {
      font-size: 1.1rem;
      margin-bottom: 30px;
      color: #DCE3EB;
    }

    .form-container {
      display: none;
      background-color: #FFFFFF;
      border: 1px solid #DEE2E6;
      padding: 30px;
      border-radius: 10px;
      margin-top: 30px;
    }

    footer {
      background-color: #F8F9FA;
      padding: 20px 0;
      border-top: 1px solid #DEE2E6;
    }

    footer a {
      color: #285EAF;
      margin: 0 10px;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }

    /* BOTÓN PERSONALIZADO DOCFI */
    .btn-docfi {
      background-color: #004455;
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

    /* TEXTO SECUNDARIO Y COMPLEMENTARIO */
    .text-secondary {
      color: #84929A !important;
    }

    .text-complementario {
      color: #4D6D9D;
    }

    .text-danger-custom {
      color: #B45959;
    }

    .top-menu a {
      color: #285EAF !important;
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
      <a class="dropdown-toggle fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">PQR</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Crear PQR</a></li>
      </ul>
    </div>

    <div class="dropdown me-3">
      <a class="dropdown-toggle fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">Reportes</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Ver reportes</a></li>
        <li><a class="dropdown-item" href="#">Mis reportes</a></li>
      </ul>
    </div>

    <div class="dropdown me-3">
      <a class="dropdown-toggle fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">Información</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">¿Quiénes somos?</a></li>
        <li><a class="dropdown-item" href="#">¿Cómo funciona?</a></li>
      </ul>
    </div>

    <div class="dropdown me-3">
      <a class="dropdown-toggle fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">Mi Perfil</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Información de contacto</a></li>
        <li><a class="dropdown-item" href="#">Política de privacidad</a></li>
        <li><a class="dropdown-item" href="#">Términos y condiciones</a></li>
      </ul>
    </div>
  </div>

  <!-- SECCIÓN PRINCIPAL -->
  <div class="hero mt-3">
    <h1>ENCUENTRA TUS DOCUMENTOS PERDIDOS</h1>
    <p>Reporta documentos personales perdidos para ayudar a encontrar a su dueño. ¡Únete ahora!</p>
  </div>

  <!-- INFORMACIÓN ADICIONAL -->
  <div class="container mt-4 text-start" style="max-width: 700px; margin: 0 auto;">
    <p><strong>Nota importante:</strong> Tus reportes tienen una durabilidad de <span style="color: #FFD700;">1 año</span>. Después de este periodo, la información será eliminada automáticamente para proteger tu privacidad.</p>

    <p class="text-secondary">
      • Asegúrate de mantener tus datos de contacto actualizados para recibir notificaciones.<br>
      • Comparte tu reporte en redes sociales para aumentar las posibilidades de recuperación.<br>
      • La privacidad y seguridad de tus datos es nuestra prioridad; nunca compartiremos tu información sin tu consentimiento.
    </p>

    <p class="text-complementario fw-semibold mt-3">
      ¡Contribuye a nuestra comunidad ayudando a otros a recuperar sus documentos perdidos!
    </p>
  </div>

  <!-- FORMULARIOS DINÁMICOS -->
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
        <button type="submit" class="btn-docfi">Registrarse</button>
      </form>
    </div>
  </div>

  <footer class="text-center mt-5">
    <div class="container">
      <p class="mb-2">
        <a href="#">Términos y Condiciones</a> |
        <a href="#">Política de Privacidad</a>
      </p>
      <small class="text-muted">&copy; 2025 DOCFI. Todos los derechos reservados.</small>
    </div>
  </footer>

  <script>
    function mostrarFormulario(tipo) {
      document.getElementById('form-login').style.display = (tipo === 'login') ? 'block' : 'none';
      document.getElementById('form-registro').style.display = (tipo === 'registro') ? 'block' : 'none';
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



