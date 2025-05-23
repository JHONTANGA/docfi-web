<!-- resources/views/privacy-policy.blade.php -->

@extends('layouts.app')

@section('content')

        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DocFi | Política de Privacidad</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FFFFFF;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header, footer {
            background-color: #f5f5f5;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        main {
            padding: 30px 40px;
            max-width: 1000px;
            margin: 0 auto;
            text-align: justify;
        }
        h1, h2 {
            color: #285EAF;
        }
        p, ul {
            font-size: 1rem;
            line-height: 1.6;
        }
        ul {
            padding-left: 20px;
        }
        a {
            color: #285EAF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header>
        <h1>Política de Privacidad</h1>
    </header>

    <main>
        <p>En <strong>DocFi</strong> nos comprometemos a proteger la privacidad y seguridad de tus datos personales. Esta política explica cómo recopilamos, usamos y protegemos la información que compartes con nosotros a través de nuestra aplicación.</p>

        <h2>1. Información que recopilamos</h2>
        <p>Recopilamos la información que proporcionas al reportar documentos extraviados, contactar a otros usuarios o usar nuestras funcionalidades, incluyendo:</p>
        <ul>
            <li>Datos personales básicos (nombre, correo electrónico, teléfono).</li>
            <li>Información relacionada con los documentos reportados.</li>
            <li>Datos de contacto para facilitar la comunicación entre quien encuentra y quien extravió un documento.</li>
        </ul>

        <h2>2. Uso de la información</h2>
        <p>La información recolectada se usa exclusivamente para facilitar la comunicación entre usuarios, ayudar a encontrar documentos perdidos y mejorar la experiencia en la plataforma.</p>

        <h2>3. No somos una entidad oficial ni reemplazamos reportes legales</h2>
        <p><strong>DocFi no reemplaza ni sustituye ningún reporte oficial ante autoridades como la Policía o la Registraduría.</strong> No tenemos convenios ni asociaciones oficiales con estas entidades. Nuestra aplicación funciona únicamente como un puente de contacto entre las personas que encontraron un documento y quienes lo extraviaron.</p>

        <h2>4. Protección de datos</h2>
        <p>Implementamos medidas de seguridad técnicas y administrativas para proteger tus datos contra accesos no autorizados, alteración, pérdida o divulgación.</p>

        <h2>5. Compartir información con terceros</h2>
        <p>No compartimos tu información personal con terceros para fines comerciales. Solo compartimos datos con otros usuarios para facilitar la localización de documentos, siempre con tu consentimiento.</p>

        <h2>6. Derechos del usuario</h2>
        <p>Tienes derecho a acceder, corregir o eliminar tus datos personales en cualquier momento. Puedes contactarnos para ejercer estos derechos o para cualquier consulta relacionada con la privacidad.</p>

        <h2>7. Cambios a esta política</h2>
        <p>Podemos actualizar esta política de privacidad ocasionalmente. Te notificaremos sobre cambios significativos mediante la aplicación o correo electrónico.</p>

        <p>Si tienes preguntas o inquietudes sobre nuestra política de privacidad, contáctanos a través de los canales disponibles en la plataforma.</p>
    </main>

    <footer>
        &copy; 2024 DocFi. Todos los derechos reservados.
    </footer>

</body>
</html>

        </div>
    </div>
@endsection
