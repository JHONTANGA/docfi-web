<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DocFi - Plataforma de Documentos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @yield('styles') @stack('styles')
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding-top: 0; /* Aseguramos que el body NO tenga padding-top */
        }

        .header-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #004455;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            z-index: 9999;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            height: 80px; /* **Aseguramos una altura fija para tu navbar** */
        }

        .header-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .header-logo img {
            height: 40px;
            width: auto;
        }

        .btn-back {
            background-color: transparent;
            border: none;
            color: white;
            font-weight: 600;
            cursor: pointer;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 5px;
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

        /* **AJUSTE CLAVE AQUÍ**: Agregamos un poco más de padding al main */
        main {
            /* Suma la altura del header (80px) + un margen extra (por ejemplo, 20px) */
            padding-top: calc(80px + 20px); /* Esto debería empujar el contenido más abajo */
        }
    </style>
</head>
<body>

    <header class="header-container">
        <div class="header-logo animate__animated animate__fadeInDown">
            <a href="{{ route('inicio') }}" style="text-decoration: none; color: white; display: flex; align-items: center; gap: 0.5rem;">
                <img src="{{ asset('images/docfi-logo.png') }}" alt="DocFi Logo"/>
                <h3 class="mb-0">DocFi</h3>
            </a>
        </div>

        <div style="display: flex; align-items: center; gap: 15px;">
            @if (!Request::is('inicio') && !Request::is('/'))
                <button class="btn-back" onclick="history.back()" title="Volver a la página anterior">
                    <i class="fas fa-arrow-left"></i> Atrás
                </button>
            @endif

            @if (Auth::check() || Request::is('contacto') || Request::is('pqr') || Request::is('consultarpqr') || Request::is('infoDocfi') || Request::is('privacy-policy') || Request::is('terminos-condiciones'))
                <span id="estadoSesion" class="badge rounded-pill px-3 py-1 bg-secondary" style="font-size: 0.9rem;">
                    Verificando sesión...
                </span>
            @endif

            @if (Request::is('contacto') || Request::is('pqr') || Request::is('consultarpqr') || Request::is('infoDocfi') || Request::is('privacy-policy') || Request::is('terminos-condiciones') || Request::is('app/*'))
                 <button class="btn-back" onclick="window.cerrarSesion()" title="Cerrar sesión">⎋</button>
            @endif
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    {{-- Resto de tus scripts ... --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ... (Tu código JavaScript existente sin cambios) ...
        if (typeof window.parseJwt === 'undefined') { // Evitar redeclaración
            window.parseJwt = function(token) {
                try {
                    const payload = token.split('.')[1];
                    const base64 = payload.replace(/-/g, '+').replace(/_/g, '/');
                    const jsonPayload = decodeURIComponent(atob(base64).split('').map(c =>
                        '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2)
                    ).join(''));
                    return JSON.parse(jsonPayload);
                } catch (e) {
                    console.error("Error al decodificar el JWT:", e);
                    return null;
                }
            };
        }
        if (typeof window.actualizarEstadoSesion === 'undefined') { // Evitar redeclaración
            window.actualizarEstadoSesion = function(estado) {
                const sesion = document.getElementById("estadoSesion");
                if (!sesion) return;
                sesion.classList.remove("bg-danger", "bg-secondary", "bg-success");
                switch (estado) {
                    case "activa":
                        sesion.textContent = "Sesión activa";
                        sesion.classList.add("bg-success");
                        break;
                    case "renovada":
                        sesion.textContent = "Sesión renovada";
                        sesion.classList.add("bg-success");
                        break;
                    case "expirada":
                    default:
                        sesion.textContent = "Sesión expirada";
                        sesion.classList.add("bg-danger");
                        break;
                }
            };
        }
        if (typeof window.redireccionSiRutaProtegida === 'undefined') { // Evitar redeclaración
            window.redireccionSiRutaProtegida = function() {
                const rutasProtegidas = [
                    "/app/pqr",
                    "/app/consultarpqr",
                    "/app/perfil",
                    "/app/reportes/mis",
                    "/app/reportes/crear",
                    "/app/contacto"
                ];
                const rutaActual = window.location.pathname;
                if (rutasProtegidas.some(r => rutaActual.startsWith(r))) {
                    console.log(`Redirigiendo a /login desde JavaScript. La ruta actual "${rutaActual}" es protegida.`);
                    window.location.href = "/login";
                }
            };
        }
        if (typeof window.verificarYRenovarToken === 'undefined') { // Evitar redeclaración
            window.verificarYRenovarToken = async function() {
                const token = localStorage.getItem("access_token");
                const refreshToken = localStorage.getItem("refresh_token");
                if (!token || !refreshToken) {
                    console.log("Ausencia de tokens de acceso o renovación. Sesión no establecida o expirada.");
                    window.actualizarEstadoSesion("expirada");
                    return window.redireccionSiRutaProtegida();
                }
                try {
                    const payload = window.parseJwt(token);
                    if (!payload) {
                        throw new Error("El token de acceso es inválido o está corrupto.");
                    }
                    const exp = payload.exp * 1000;
                    const ahora = Date.now();
                    if (exp - ahora < 2 * 60 * 1000) { // Menos de 2 minutos para expirar
                        console.log("Token de acceso próximo a expirar. Iniciando proceso de renovación...");
                        const response = await fetch("http://127.0.0.1:8001/api/token/refresh/", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ refresh: refreshToken })
                        });
                        if (response.ok) {
                            const data = await response.json();
                            localStorage.setItem("access_token", data.access);
                            window.actualizarEstadoSesion("renovada");
                            console.log("Token de acceso renovado con éxito.");
                        } else {
                            const errorData = await response.json();
                            console.error("Fallo en la renovación del token. Respuesta del servidor:", errorData);
                            throw new Error("Error en la renovación del token: " + (errorData.detail || "Error desconocido"));
                        }
                    } else {
                        console.log("Sesión activa. El token de acceso es válido por más tiempo.");
                        window.actualizarEstadoSesion("activa");
                    }
                } catch (error) {
                    console.error("Error crítico en la gestión de tokens:", error);
                    localStorage.removeItem("access_token");
                    localStorage.removeItem("refresh_token");
                    window.actualizarEstadoSesion("expirada");
                    window.redireccionSiRutaProtegida();
                }
            };
        }
        if (typeof window.fetchConToken === 'undefined') { // Evitar redeclaración
            window.fetchConToken = async function(url, options = {}) {
                const token = localStorage.getItem("access_token");
                options.headers = options.headers || {};
                if (token) {
                    options.headers["Authorization"] = "Bearer " + token;
                } else {
                    console.warn("Intentando realizar fetchConToken sin access_token. Esto podría resultar en 401 Unauthorized.");
                }
                if (options.body && typeof options.body === 'string' && options.body.startsWith('{')) {
                    options.headers["Content-Type"] = options.headers["Content-Type"] || "application/json";
                }
                return fetch(url, options);
            };
        }
        if (typeof window.cerrarSesion === 'undefined') { // Evitar redeclaración
            window.cerrarSesion = function() {
                localStorage.removeItem("access_token");
                localStorage.removeItem("refresh_token");
                document.cookie = "jwt_token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                console.log("Tokens eliminados. Redirigiendo a /login.");
                window.location.href = "/login";
            };
        }
        if (typeof window.redirigirProtegido === 'undefined') { // Evitar redeclaración
            window.redirigirProtegido = function(targetRoute) {
                const token = localStorage.getItem("access_token");
                if (token) {
                    const payload = window.parseJwt(token);
                    if (payload && payload.exp * 1000 > Date.now()) {
                        window.location.href = targetRoute;
                    } else {
                        console.warn("Token expirado o inválido al intentar acceder a ruta protegida. Redirigiendo a login.");
                        window.cerrarSesion();
                    }
                } else {
                    console.log("No hay token de sesión. Redirigiendo a /login.");
                    window.location.href = "/login";
                }
            };
        }
        document.addEventListener("DOMContentLoaded", window.verificarYRenovarToken);
    </script>

    @stack('scripts')
</body>
</html>