<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <!-- Enlace al archivo CSS específico para esta página -->
    <link rel="stylesheet" href="{{ asset('css/welcome-style.css') }}">
    @vite(['resources/css/welcome-style.css'])
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="logo.png" alt="Logo">
            </div>
            <div class="header-links">
                <a href="/inicio">Inicio</a>
                <a href="/contacto">Contacto</a>
            </div>
        </div>
    </header>

    <!-- Contenedor principal de la vista de bienvenida -->
    <section class="welcome-section">
        <div class="form-container">
            <!-- Formulario de Registro (lado izquierdo) -->
            <div class="form-left">
                <h2>Registrarse</h2>
                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" name="nombres" required>
                    </div>
                    <div class="input-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" required>
                    </div>
                    <div class="input-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" name="correo" required>
                    </div>
                    <div class="input-group">
                        <label for="celular">Número de celular:</label>
                        <input type="text" name="celular" required>
                    </div>
                    <div class="input-group">
                        <label for="documento">Número de documento:</label>
                        <input type="text" name="documento" required>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn">Registrarse</button>
                    </div>
                </form>
            </div>

            <!-- Línea divisoria -->
            <div class="divider"></div>

            <!-- Formulario de Login (lado derecho) -->
            <div class="form-right">
                <h2>Iniciar sesión</h2>
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="usuario">Usuario o Correo:</label>
                        <input type="text" name="usuario" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
