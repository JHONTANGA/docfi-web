@extends('layouts.app')

@section('content')
@include('layouts.header')

<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold" style="color: #004455">Política de Privacidad - DocFi</h1>
        <p class="fs-5" style="color: #454C72">Conoce cómo protegemos tus datos e información personal.</p>
    </div>

    <div class="bg-white p-4 rounded shadow-sm" style="color:#333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <p><strong>DocFi</strong> se compromete a proteger la privacidad y seguridad de tus datos personales. Esta política explica cómo recopilamos, usamos y protegemos la información que compartes con nosotros.</p>

        <h2 class="mb-3 text-primary">1. Información que recopilamos</h2>
        <ul>
            <li>Datos personales básicos (nombre, correo electrónico, teléfono).</li>
            <li>Información sobre los documentos reportados.</li>
            <li>Datos de contacto para facilitar comunicación entre usuarios.</li>
        </ul>

        <h2 class="mb-3 text-primary">2. Uso de la información</h2>
        <p>Se utiliza para facilitar la búsqueda de documentos perdidos y mejorar la experiencia del usuario.</p>

        <h2 class="mb-3 text-primary">3. No somos una entidad oficial</h2>
        <p><strong>DocFi</strong> no reemplaza ningún proceso legal oficial ni tiene convenios con autoridades.</p>

        <h2 class="mb-3 text-primary">4. Protección de datos</h2>
        <p>Implementamos medidas de seguridad técnicas y administrativas para proteger tu información.</p>

        <h2 class="mb-3 text-primary">5. Compartir información</h2>
        <p>No compartimos tu información con terceros salvo para facilitar el contacto con tu consentimiento.</p>

        <h2 class="mb-3 text-primary">6. Derechos del usuario</h2>
        <p>Puedes acceder, corregir o eliminar tus datos en cualquier momento. Escríbenos para ejercer estos derechos.</p>

        <h2 class="mb-3 text-primary">7. Cambios a esta política</h2>
        <p>Notificaremos sobre cualquier cambio significativo por medio de la app o correo electrónico.</p>

        <p class="text-muted mt-4" style="font-size: 0.9rem;">Última actualización: 17 de mayo de 2025</p>
    </div>
</div>
@endsection
