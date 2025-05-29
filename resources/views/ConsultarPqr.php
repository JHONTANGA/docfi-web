@include('layouts.header')

@section('content')
<div class="consultar-container">
    <div class="consultar-card">
        <h2>Consulta tu PQR</h2>

        @if(session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif

        @if(session('resultado'))
            <div class="resultado">
                <p><strong>Tipo:</strong> {{ session('resultado')['tipo'] }}</p>
                <p><strong>Nombre:</strong> {{ session('resultado')['nombre'] }}</p>
                <p><strong>Estado:</strong> {{ session('resultado')['estado'] }}</p>
                <p><strong>Descripción:</strong> {{ session('resultado')['detalles'] }}</p>
            </div>
        @endif

        <form method="GET" action="{{ route('consultarPqr') }}">
            <label for="codigo">Código de seguimiento</label>
            <input type="text" id="codigo" name="codigo" placeholder="Ingresa tu código..." required>
            <button type="submit" class="btn-consultar"><i class="fas fa-search"></i> Consultar</button>
        </form>
    </div>
</div>
@endsection

@section('styles')



<style>
.consultar-container {
    background: linear-gradient(to right, #285EAF, #4D6D9D);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
}

.consultar-card {
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 450px;
    text-align: center;
}

.consultar-card h2 {
    color: #285EAF;
    margin-bottom: 20px;
}

form label {
    display: block;
    margin-bottom: 8px;
    text-align: left;
    color: #454C72;
    font-weight: 500;
}

form input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-bottom: 20px;
}

.btn-consultar {
    background: #285EAF;
    color: white;
    padding: 10px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    transition: background 0.3s;
}

.btn-consultar:hover {
    background: #004455;
}

.message.error {
    background-color: #fdecea;
    border-left: 4px solid #e74c3c;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 8px;
    color: #2c3e50;
}

.resultado {
    text-align: left;
    background: #f4f8fb;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
}
</style>
@endsection
