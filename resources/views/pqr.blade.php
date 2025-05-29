@extends('layouts.header')

@section('content')
<div class="form-container">
    <div class="main-container">

        <!-- Info Card -->
        <div class="info-card">
            <h2><strong>Radica tu PQR</strong></h2>
            <p>
                En <strong>DocFi</strong> trabajamos por brindarte una atención eficiente y transparente.<br><br>
                Envía tu petición, queja o reclamo de forma segura y rápida.<br><br>
                <strong>¡Estamos aquí para ayudarte!</strong>
            </p>
        </div>

        <!-- Formulario -->
        <div class="form-card">
            <h2>Formulario de<br>Peticiones, Quejas o Reclamos</h2>

            @if(session('success'))
                <div class="message success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="message error">
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

                <label for="telefono">Teléfono</label>
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
                        <strong>Enviar PQR</strong> <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>

            @if(session('codigo'))
                <div class="message success">
                    <strong>Guarda tu código de seguimiento:</strong>
                    <div class="codigo-seguimiento">{{ session('codigo') }}</div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
.form-container {
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
                url('/images/fondo_pqr.png') no-repeat center center;
    background-size: cover;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
}

.main-container {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    max-width: 1200px;
    width: 100%;
    justify-content: center;
}

.info-card, .form-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    padding: 30px;
}

.info-card {
    width: 300px;
    height: 300px;
    color: #285EAF;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.info-card:hover {
    transform: scale(1.03);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
}
.info-card h2 { font-size: 1.5rem; }
.info-card p { color: black; }

.form-card {
    flex: 2;
    min-width: 350px;
    max-width: 600px;
}
.form-card h2 {
    color: #285EAF;
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

form label {
    display: block;
    margin: 15px 0 5px;
    font-weight: 500;
    color: #454C72;
}
form input,
form select,
form textarea {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 1rem;
    box-sizing: border-box;
}
form textarea {
    height: 100px;
    resize: vertical;
}

.boton-contenedor {
    margin-top: 30px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.boton-contenedor:hover {
    transform: scale(1.09);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
}
.custom-send-btn {
    background: #285EAF;
    width: 90%;
    color: white;
    padding: 10px 30px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
}
.custom-send-btn:hover {
    background: #004455;
}

.message.success {
    background-color: #e0f7e9;
    border-left: 4px solid #2ecc71;
    padding: 10px;
    margin-top: 20px;
    border-radius: 8px;
    color: #2c3e50;
}
.message.error {
    background-color: #fdecea;
    border-left: 4px solid #e74c3c;
    padding: 10px;
    margin-top: 20px;
    border-radius: 8px;
    color: #2c3e50;
}
.codigo-seguimiento {
    margin-top: 8px;
    background: #f0f0f0;
    padding: 8px;
    font-family: monospace;
}
</style>
@endsection
