<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="register-container">
        <h2>Registrar Cuenta</h2>

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <button type="submit">Registrarse</button>
        </form>
    </div>

</body>
</html>
