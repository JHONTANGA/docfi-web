<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>DocFi - Plataforma de Documentos</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Animate.css CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  @yield('styles') <!-- Para que las vistas hijas puedan inyectar estilos -->

  <style>
    body {
      background-color: #f0f4f8;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding-top: 70px;
    }

    .header-container {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background-color: #004455;
      padding: 0.75rem 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      color: white;
      z-index: 9999;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .header-logo {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .header-logo img {
      height: 36px;
      width: auto;
    }

    .btn-back {
      background-color: transparent;
      border: none;
      color: white;
      font-weight: bold;
      font-size: 1.1rem;
      cursor: pointer;
      padding: 0 0.5rem;
    }

    .btn-back:hover {
      color: #a0c4ff;
    }

    .bg-success {
      background-color: #28a745 !important;
      color: white !important;
    }

    .bg-danger {
      background-color: #dc3545 !important;
      color: white !important;
    }

    .badge {
      font-size: 0.75rem;
    }
  </style>
</head>
<body>

  <!-- Encabezado fijo -->
  <header class="header-container">
    <div class="header-logo animate__animated animate__fadeInDown">
      <a href="{{ route('inicio') }}" style="text-decoration: none; color: white; display: flex; align-items: center; gap: 0.5rem;">
        <img src="{{ asset('images/docfi-logo.png') }}" alt="DocFi Logo"/>
        <h4 class="mb-0" style="font-size: 1.25rem;">DocFi</h4>
      </a>
    </div>

    @if (Request::is('contacto') || Request::is('pqr') || Request::is('consultarpqr') || Request::is('infoDocfi') || Request::is('privacy-policy') || Request::is('terminos-condiciones'))
      <div style="display: flex; align-items: center; gap: 10px;">
        <span id="estadoSesion" class="badge rounded-pill bg-secondary px-2 py-1">Verificando...</span>
        <button class="btn-back" onclick="history.back()" title="Volver">←</button>
        <button class="btn-back" onclick="cerrarSesion()" title="Cerrar sesión">⎋</button>
      </div>
    @endif
  </header>

  <!-- Contenido de la página -->
  @yield('content')

  <!-- Scripts -->
  <script>
    async function verificarYRenovarToken() {
      const sesion = document.getElementById("estadoSesion");

      const token = localStorage.getItem("access_token");
      const refreshToken = localStorage.getItem("refresh_token");

      if (!token || !refreshToken) {
        actualizarEstadoSesion("expirada");
        return redireccionSiRutaProtegida();
      }

      try {
        const payload = JSON.parse(atob(token.split('.')[1]));
        const exp = payload.exp * 1000;
        const ahora = Date.now();

        if (exp - ahora < 2 * 60 * 1000) {
          const response = await fetch("http://127.0.0.1:8001/api/token/refresh/", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ refresh: refreshToken })
          });

          if (response.ok) {
            const data = await response.json();
            localStorage.setItem("access_token", data.access);
            actualizarEstadoSesion("renovada");
          } else {
            throw new Error("No se pudo renovar el token");
          }
        } else {
          actualizarEstadoSesion("activa");
        }
      } catch (error) {
        console.error("Error de token:", error);
        localStorage.removeItem("access_token");
        localStorage.removeItem("refresh_token");
        actualizarEstadoSesion("expirada");
        redireccionSiRutaProtegida();
      }
    }

    function actualizarEstadoSesion(estado) {
      const sesion = document.getElementById("estadoSesion");
      if (!sesion) return;

      switch (estado) {
        case "activa":
          sesion.textContent = "Sesión activa";
          sesion.classList.remove("bg-danger", "bg-secondary");
          sesion.classList.add("bg-success");
          break;
        case "renovada":
          sesion.textContent = "Sesión renovada";
          sesion.classList.remove("bg-danger", "bg-secondary");
          sesion.classList.add("bg-success");
          break;
        case "expirada":
        default:
          sesion.textContent = "Sesión expirada";
          sesion.classList.remove("bg-success", "bg-secondary");
          sesion.classList.add("bg-danger");
          break;
      }
    }

    function redireccionSiRutaProtegida() {
      const rutasProtegidas = ["/pqr", "/consultarpqr", "/contacto", "/infoDocfi"];
      const rutaActual = window.location.pathname;
      if (rutasProtegidas.some(ruta => rutaActual.startsWith(ruta))) {
        window.location.href = "/login";
      }
    }

    async function fetchConToken(url, options = {}) {
      const token = localStorage.getItem("access_token");
      options.headers = options.headers || {};
      options.headers["Authorization"] = "Bearer " + token;
      return fetch(url, options);
    }

    function cerrarSesion() {
      localStorage.removeItem("access_token");
      localStorage.removeItem("refresh_token");
      document.cookie = "jwt_token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      window.location.href = "/login";
    }

    document.addEventListener("DOMContentLoaded", verificarYRenovarToken);
  </script>

</body>
</html>