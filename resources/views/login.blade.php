<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Docfi | Iniciar sesión / Registrarse</title>
  <link rel="stylesheet" href="{{ asset('css/estilo-docfi.css') }}">
  <style>
    body {
      background-color: #004b5c;
      font-family: 'Segoe UI', sans-serif;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background-color: #004b5c;
      padding: 2rem;
      width: 100%;
      max-width: 400px;
    }
    .logo {
      display: block;
      margin: 0 auto 1.5rem;
      width: 120px;
    }
    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    input[type="text"], input[type="email"], input[type="password"], input[type="date"], select {
      width: 100%;
      padding: 10px;
      margin-bottom: 12px;
      border: none;
      border-radius: 20px;
      background-color: #fff;
      color: #000;
    }
    .btn {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 20px;
      background: linear-gradient(to right, #4169e1, #5a67d8);
      color: #fff;
      font-weight: bold;
      cursor: pointer;
    }
    .switch {
      margin-top: 1rem;
      text-align: center;
      cursor: pointer;
      color: #ccc;
    }
    .form-group {
      display: none;
    }
    .form-group.active {
      display: block;
    }
  </style>
</head>
<body>
  <div class="container">
    <img src="{{ asset('images/Web_Images/logoDocfi.png') }}" alt="Docfi Logo" class="logo">

    <!-- Login -->
    <div id="login-form" class="form-group active">
      <h2>Iniciar sesión en Docfi</h2>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="text" name="username" placeholder="No. documento, usuario o correo" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit" class="btn">Iniciar sesión</button>
      </form>
      <div class="switch" onclick="toggleForms()">¿No tienes cuenta? Regístrate</div>
    </div>

    <!-- Registro -->
    <div id="registro-form" class="form-group">
      <h2>Crear cuenta en Docfi</h2>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="password" name="confirm_password" placeholder="Confirmar contraseña" required>
        <input type="text" name="first_name" placeholder="Nombres" required>
        <input type="text" name="last_name" placeholder="Apellidos" required>
        <select name="tipo_documento" required>
          <option value="cc">Cédula</option>
          <option value="ti">Tarjeta de Identidad</option>
        </select>
        <input type="text" name="numero_documento" placeholder="Número de documento" required>
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <input type="text" name="direccion" placeholder="Dirección" required>
        <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
        <select name="tipo_usuario" required>
          <option value="soporte">Soporte</option>
          <option value="usuario">Usuario</option>
        </select>
        <input type="hidden" name="is_staff" value="0">
        <input type="hidden" name="is_superuser" value="0">
        <button type="submit" class="btn">Registrar</button>
      </form>
      <div class="switch" onclick="toggleForms()">¿Ya tienes cuenta? Inicia sesión</div>
    </div>
  </div>

  <script>
    function toggleForms() {
      document.getElementById('login-form').classList.toggle('active');
      document.getElementById('registro-form').classList.toggle('active');
    }
  </script>
</body>
</html>
