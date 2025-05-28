@extends('layouts.app')

@section('content')
@include('layouts.header')

<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold" style="color: #004455">Términos y Condiciones - DocFi</h1>
        <p class="fs-5" style="color: #454C72">Por favor lee atentamente estos términos antes de usar nuestra aplicación.</p>
    </div>

    <div class="bg-white p-4 rounded shadow-sm" style="color:#333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <h2 class="mb-3 text-primary">1. Objeto</h2>
        <p>DocFi es una plataforma digital que facilita la comunicación entre las personas que han perdido un documento personal y quienes lo han encontrado, sin reemplazar ningún procedimiento legal oficial.</p>

        <h2 class="mb-3 text-primary">2. Uso de la Plataforma</h2>
        <p>El usuario se compromete a utilizar la plataforma de manera responsable, reportando únicamente documentos personales legítimos y actuando con buena fe en las interacciones con otros usuarios.</p>

        <h2 class="mb-3 text-primary">3. No Somos Autoridad Legal</h2>
        <p>DocFi no reemplaza ni suplanta en ningún caso los reportes legales oficiales ante autoridades como la Policía, la Registraduría ni ninguna otra entidad.</p>

        <h2 class="mb-3 text-primary">4. Responsabilidades</h2>
        <p>No nos hacemos responsables por el uso indebido de la información por parte de los usuarios ni por posibles errores o pérdidas derivadas del uso de la plataforma.</p>

        <h2 class="mb-3 text-primary">5. Protección de Datos</h2>
        <p>La información suministrada será manejada de acuerdo con nuestra Política de Privacidad y las leyes aplicables.</p>

        <h2 class="mb-3 text-primary">6. Modificaciones</h2>
        <p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Los cambios serán publicados en esta página.</p>

        <h2 class="mb-3 text-primary">7. Contacto</h2>
        <p>Para dudas, contáctanos en: <a href="mailto:contacto@docfi.com" class="text-primary">contacto@docfi.com</a></p>

        <p class="text-muted mt-4" style="font-size: 0.9rem;">Última actualización: 17 de mayo de 2025</p>
    </div>
</div>
@endsection
