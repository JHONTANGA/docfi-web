<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar PQR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/consultar-pqr.css') }}">
</head>

<body>

    <header>
        <div class="header-content">
            <a href="{{ route('inicio') }}" class="volver-btn">← Volver</a>
            <h1>Consulta de PQRs</h1>
        </div>
    </header>

    <main class="container">
        @if($pqr->isEmpty())
            <p class="mensaje-vacio">No hay PQRs registrados.</p>
        @else
        <table class="tabla-pqr">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Tipo</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pqr as $item)
                    <tr>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->correo }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ ucfirst($item->tipo) }}</td>
                        <td>{{ $item->detalles }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </main>

</body>
</html>
