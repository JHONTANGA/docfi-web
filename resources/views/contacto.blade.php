
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información Personal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Ruta -->
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    
    <!-- Fuente Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
</head>
<body>

    <div class="perfil-card">

    <a href="{{ route('inicio') }}" class="volver-btn">← Volver</a>

        <h2>Información Personal</h2>

        <button class="btn-editar">Editar perfil</button>

        <div class="info-section">
          <p><span class="campo"><strong>Nombres y apellidos:</strong></span> Esteban Molina Castro</p>
          <p><span class="campo"><strong>Documento de Identidad:</strong></span> CC: 1092823345</p>
          <p><span class="campo"><strong>Correo Electrónico:</strong></span> esteb45@gmail.com</p>
          <p><span class="campo"><strong>Teléfono de contacto:</strong></span> 345 8975688</p>
        </div>

        <div class="info-section">
            <strong class="section-title">¿Necesitas ayuda?</strong>
            <a href="{{ route('consultar-pqr') }}">PQR</a> |
            <a href="#">Soporte Técnico</a>
        </div>

        <div class="info-section">
            <strong class="section-title">Cuenta</strong>
            <a href="#">Cerrar sesión</a> |
            <a href="#">Eliminar cuenta</a>
        </div>
    </div>

</body>
</html>

