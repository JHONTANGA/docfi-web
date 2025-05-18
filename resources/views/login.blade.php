<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DocFi | Iniciar sesión / Registrarse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #0066cc, #004080);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 4rem auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            overflow: hidden;
        }

        .form-section {
            flex: 1 1 50%;
            padding: 2rem;
        }

        .form-section h2 {
            color: #004080;
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.3rem;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.2s;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn {
            background-color: #004080;
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0066cc;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                margin: 2rem;
            }

            .form-section {
                flex: 1 1 100%;
                border-right: none;
                border-bottom: 1px solid #eee;
            }
        }

        .divider {
            width: 2px;
            background-color: #eee;
        }

        @media (max-width: 768px) {
            .divider {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Registro -->
        <div class="form-section">
            <h2>Registrarse</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label for="nombre">Nombres:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellido">Apellidos:</label>
                <input type="text" id="apellido" name="apellido" required>

                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="celular">Número de celular:</label>
                <input type="text" id="celular" name="celular" required>

                <label for="documento">Número de documento:</label>
                <input type="text" id="documento" name="documento" required>

                <button type="submit" class="btn">Registrarse</button>
            </form>
        </div>

        <!-- Separador -->
        <div class="divider"></div>

        <!-- Iniciar Sesión -->
        <div class="form-section">
            <h2>Iniciar sesión</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="usuario">Usuario o Correo:</label>
                <input type="text" id="usuario" name="usuario" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" class="btn">Iniciar sesión</button>
            </form>
        </div>
    </div>

</body>
</html>
