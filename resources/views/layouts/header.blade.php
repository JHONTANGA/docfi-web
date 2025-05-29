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

  
    @yield('styles') <!-- linea para que se visualice le formulario pqr -->

  <!-- Estilos propios -->
  <style>
    
    body {
      background-color: #f0f4f8;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding-top: 80px; /* evita que el contenido se oculte debajo del header */
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
    }
    .btn-back:hover {
      color: #a0c4ff;
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
    @if (Request::is('contacto') || Request::is('pqr') || Request::is('ConsultarPqr') || Request::is('infoDocfi') || Request::is('privacy-policy') || Request::is('terminos-condiciones'))
    <button class="btn-back" onclick="history.back()">← Atrás</button>
    @endif
  </header>

  @yield('content')   <!-- linea para que se visualice le formulario pqr -->

</body>
</html>
