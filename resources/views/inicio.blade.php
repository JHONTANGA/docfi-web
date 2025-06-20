{{-- resources/views/inicio.blade.php --}}
@extends('layouts.app') {{-- Esto extiende el layout base, incluyendo su header fijo y JS --}}

@section('content')
<div class="py-5 text-white" style="background: linear-gradient(135deg, #004455, #007788);">
    <div class="container text-center">
        <img src="{{ asset('images/docfi-logo.png') }}"
             alt="Logo DocFi"
             class="mb-4 animate__animated animate__fadeInDown"
             style="height: 90px; max-width: 100%;">
        <h1 class="fw-bold animate__animated animate__fadeInUp" style="font-size: 2.5rem;">
            Recupera tus documentos perdidos fácilmente
        </h1>
        <p class="mt-3 animate__animated animate__fadeIn animate__delay-1s" style="font-size: 1.25rem;">
            DocFi te conecta con quienes han encontrado tus pertenencias.<br class="d-none d-md-block">
            Rápido, seguro y gratuito.
        </p>
    </div>
</div>

{{-- ESTE ES EL MENÚ DE NAVEGACIÓN QUE ME PROPORCIONASTE DENTRO DE inicio.blade.php --}}
{{-- No lo vamos a mover para no desordenar tu estructura actual a estas alturas --}}
<div class="d-flex justify-content-end pt-3 pe-3 align-items-center top-menu flex-wrap">
  <div class="dropdown me-3">
    <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">PQR</a>
    <ul class="dropdown-menu">
      {{-- Ahora window.redirigirProtegido SÍ existe y se usa con la ruta completa --}}
      <li><a class="dropdown-item" href="#" onclick="window.redirigirProtegido('{{ route('pqr') }}')">Crear PQR</a></li>
      <li><a class="dropdown-item" href="#" onclick="window.redirigirProtegido('{{ route('consultarpqr') }}')">Consultar PQR</a></li>
    </ul>
  </div>
  <div class="dropdown me-3">
    <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">Reportes</a>
    <ul class="dropdown-menu">
      {{-- 'mis-reportes' tienen rutas definidas en web.php --}}
      <li><a class="dropdown-item" href="#" onclick="window.redirigirProtegido('{{ route('mis-reportes') }}')">Mis reportes</a></li>
    </ul>
  </div>
  <div class="dropdown me-3">
    <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">Información</a>
    <ul class="dropdown-menu">
      {{-- Estas rutas son públicas, no necesitan redirigirProtegido --}}
      <li><a class="dropdown-item" href="{{ route('infoDocfi') }}">¿Quiénes somos?</a></li>
      <li><a class="dropdown-item" href="{{ route('infoDocfi') }}">¿Cómo funciona?</a></li>
    </ul>
  </div>
<div class="dropdown me-2">
    <a class="dropdown-toggle text-primary fw-bold text-decoration-none" href="#" data-bs-toggle="dropdown">Mi Perfil</a>
    <ul class="dropdown-menu">
      {{-- Usar window.redirigirProtegido para asegurar la verificación de sesión --}}
      <li><a class="dropdown-item" href="#" onclick="window.redirigirProtegido('{{ route('perfil') }}')">Ver Perfil</a></li>
      
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#" onclick="window.cerrarSesion()">Cerrar Sesión</a></li>
    </ul>
</div>
  <div id="sesion-info" class="me-3"></div>
</div>

<section class="container mt-5">
  <div class="text-center mb-5">
    <h1 class="fw-bold" style="color: #004455">Bienvenido a DocFi</h1>
    <p class="fs-5" style="color: #454C72">La plataforma para reportar y recuperar documentos extraviados.</p>
  </div>

  <div class="row g-4">
    <div class="col-md-6">
      <div class="p-4 shadow rounded" style="background-color: #F8F9FA;">
        <h4 style="color: #285EAF">🔍 Busca tu documento</h4>
        <p style="color: #454C72">Consulta si alguien ha reportado tu documento perdido. Rápido, seguro y gratuito.</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="p-4 shadow rounded" style="background-color: #F8F9FA;">
        <h4 style="color: #285EAF">📢 Reporta uno encontrado</h4>
        <p style="color: #454C72">Ayuda a otra persona subiendo información de un documento encontrado. Contribuye con la comunidad.</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="p-4 shadow rounded" style="background-color: #F8F9FA;">
        <h4 style="color: #285EAF">🔒 Privacidad y seguridad</h4>
        <p style="color: #454C72">Tus datos están protegidos. Utilizamos autenticación y cifrado para tu seguridad.</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="p-4 shadow rounded" style="background-color: #F8F9FA;">
        <h4 style="color: #285EAF">📱 Accede desde cualquier lugar</h4>
        <p style="color: #454C72">Disponible en web, PC y dispositivos móviles para que lo uses donde quieras.</p>
      </div>
    </div>
  </div>

  <div class="text-center mt-5">
    <a href="{{ route('login') }}" class="btn btn-primary me-2" style="background-color: #285EAF; border: none">
      Consultar documento
    </a>
    {{-- Este botón de "Reportar documento" ahora usa redirigirProtegido --}}
    <a href="#" onclick="window.redirigirProtegido('{{ route('crear-reporte') }}')" class="btn btn-outline-primary" style="color: #285EAF; border-color: #285EAF">
      Reportar documento
    </a>
  </div>
</section>

<footer class="text-center mt-5">
  <div class="container">
    <p class="mb-2">
      <a href="{{ route('terminos-condiciones') }}">Términos y Condiciones</a> |
      <a href="{{ route('privacy-policy') }}">Política de Privacidad</a>
    </p>
    <small class="text-muted">&copy; 2025 DOCFI. Todos los derechos reservados.</small>
  </div>
</footer>
@endsection

@push('scripts')
<script>
    // Esta función `mostrarFormulario` probablemente pertenece a tu lógica de login/registro
    // Si esta función es usada en otras vistas, también debería ser global en app.blade.php
    // Por ahora, la mantenemos aquí asumiendo que solo se usa en `inicio.blade.php` si hay un formulario aquí.
    // Si te da error "mostrarFormulario is not defined" en otras páginas, avísame.
    function mostrarFormulario(tipo) {
        const loginForm = document.getElementById('form-login');
        const registroForm = document.getElementById('form-registro');
        if (loginForm && registroForm) {
            loginForm.style.display = tipo === 'login' ? 'block' : 'none';
            registroForm.style.display = tipo === 'registro' ? 'block' : 'none';
        }
    }

    // Esta función ahora usa `window.actualizarEstadoSesion` del `app.blade.php`
    function verificarSesionJWTEnInicio() {
        const sesionInfo = document.getElementById("sesion-info");
        const token = localStorage.getItem("access_token");

        if (!sesionInfo) return;

        if (token) {
            // Si hay un token, intentamos usar la lógica global para una verificación más robusta.
            // Aunque para mostrar el texto es suficiente saber si existe.
            sesionInfo.innerHTML = `<span class="badge bg-success">Sesión activa</span>`;
            // Opcional: Llamar a la función principal de app.blade.php para una verificación completa.
            // window.verificarYRenovarToken();
        } else {
            sesionInfo.innerHTML = `<span class="badge bg-danger">Sesión expirada</span>`;
        }
    }

    document.addEventListener("DOMContentLoaded", verificarSesionJWTEnInicio);
</script>
@endpush