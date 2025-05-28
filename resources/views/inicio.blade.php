{{-- inicio.blade.php --}}
@include('layouts.header')

<!-- ENCABEZADO VISUAL  -->
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


<!-- MENÚ SUPERIOR  -->
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
      <li><a class="dropdown-item" href="#" onclick="mostrarFormulario('login'); document.getElementById('form-login').scrollIntoView({ behavior: 'smooth' });">Información de contacto</a></li>
    </ul>
  </div>
</div>

<!--  SECCIÓN PRINCIPAL  -->
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
    <!-- <a href="{{ route('consultar-pqr') }}" class="btn btn-primary me-2" style="background-color: #285EAF; border: none">Consultar documento</a>
      -->
    <a href="{{ route('login') }}" class="btn btn-primary me-2" style="background-color: #285EAF; border: none">
    Consultar documento
</a>
    <a href="{{ route('pqr') }}" class="btn btn-outline-primary" style="color: #285EAF; border-color: #285EAF">Reportar documento</a>
  </div>
</section>

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
