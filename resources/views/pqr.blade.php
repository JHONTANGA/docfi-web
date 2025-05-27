
@include('layouts.header')


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario PQR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/EstiloPQR.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  
</head>
<body>

<header>
<a href="{{ route('inicio') }}" class="volver-btn">← Volver</a>

    <div style="padding: 20px; text-align: center;">
         <a href="{{ route('inicio') }}">
    <img src="{{asset('images/Web_Images/logoDocfi.png')}}" alt="DocFi Logo" style="height: 100px;">
    </a>
        </div>
    </header>

<div class="container">
    <h2>Formulario de Peticiones, Quejas o Reclamos</h2>

    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="message error errors">
            <strong>Se encontraron errores:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('enviar.pqr') }}" method="POST">
        @csrf

        <label for="nombre">Nombre completo</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>

        <label for="correo">Correo electrónico</label>
        <input type="email" name="correo" id="correo" value="{{ old('correo') }}" required>

        <label for="telefono">Télefono</label>
        <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" required>
        
           
        <label for="tipo">Tipo de solicitud</label>
        <select name="tipo" id="tipo" required>
            <option value="">-- Selecciona una opción --</option>
            <option value="peticion" {{ old('tipo') == 'peticion' ? 'selected' : '' }}>Petición</option>
            <option value="queja" {{ old('tipo') == 'queja' ? 'selected' : '' }}>Queja</option>
            <option value="reclamo" {{ old('tipo') == 'reclamo' ? 'selected' : '' }}>Reclamo</option>
        </select>

        <label for="detalles">Descripción de la solicitud</label>
        <textarea name="detalles" id="detalles" placeholder="Escribe tu solicitud aquí..." required>{{ old('detalles') }}</textarea>

        <div class="boton-contenedor">
          <button class="custom-send-btn">
           Enviar PQR <i class="fas fa-paper-plane"></i>
          </button>
        </div>
    </form>

    @if(session('success'))
    <div class="message success">
        {{ session('success') }}
        <br><strong>Guarda tu código de seguimiento:</strong>
        <div style="margin-top: 8px; background: #f0f0f0; padding: 8px; font-family: monospace;">
            {{ session('codigo') }}
        </div>
    </div>
@endif

  </div>

</body>
</html>
