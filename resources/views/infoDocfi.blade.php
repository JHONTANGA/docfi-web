<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCFI - ¿QUIENES SOMOS?</title>
    <!-- Vinculo al CSS -->
    <link rel="stylesheet" href="infoDocficss.css">
    @vite(['resources/css/infoDocficss.css'])
</head>

<body>
    <!-- Encabezado -->
    <x-header />

    <main>
        <section class="about">
            <div class="about-content">
                <h1>¿QUIÉNES SOMOS?</h1>
                <h1>
                    <br>
                    <strong>DocFi</strong> es una plataforma innovadora diseñada
                    para ayudar a las personas a reportar y recuperar documentos perdidos.
                </h1>
                <br>
                <h1>
                    Ya sea, que hayas perdido tu identificación,
                    pasaporte, licencia de conducir u otros
                    documentos importantes que se encuentren
                    disponibles en nuestra app móvil o plataforma
                    web.
                </h1>
                <br>
                <h1><strong>DocFi</strong> te ofrece una solución sencilla y eficiente
                    para recuperarlos.
                </h1>
            </div>
            <div class="about-image">
                <img src="{{asset('images/Web_Images/info.jpg')}}" alt="Imagen representativa">
            </div>
        </section>

        <section class="how-it-works">
            <h1>¿CÓMO FUNCIONA?</h1>
            <br>
            <div class="steps">
                <div class="step">
                    <h2>1. Reportar un Documento Perdido</h2>
                    <br>
                    <p>
                        Si has perdido un documento importante, simplemente ingresa a nuestra plataforma y sigue estos pasos:
                    </p>
                    <br>
                    <ul>
                        <li><strong>Registro:</strong> Crea una cuenta en nuestra página web o aplicación móvil.</li>
                        <br>
                        <li><strong>Reporte de Pérdida:</strong> Completa un formulario con los detalles del documento perdido.</li>
                        <br>
                        <li><strong>Descripción Adicional:</strong> Añade información adicional como lugar o fecha aproximada.</li>
                        <br>
                        <li><strong>Notificaciones:</strong>Notificaciones: Activa alertas para recibir información si alguien encuentra tu documento.</li>
                    </ul>
                </div>
                <div class="step">
                    <h2>2. Encontrar un Documento</h2>
                    <br>
                    <p>
                        Si has encontrado un documento que no te pertenece, puedes ayudar a devolverlo a su dueño siguiendo estos pasos:
                    </p>
                    <br>
                    <ul>
                        <li>Registro: Crea una cuenta e inicia sesión.</li>
                        <br>
                        <li>Reporte de Encuentro: Completa un formulario con detalles del documento encontrado.</li>
                        <br>
                        <li>Subir Fotos: Si es posible, sube fotos del documento.</li>
                        <br>
                        <li>Entrega Segura: Coordinamos la entrega del documento al dueño legítimo.</li>
                    </ul>
                </div>
            </div>
        </section>

        <br>
        <section class="social-media">
            <p>Comparte esta información:</p>
            <a href="https://facebook.com/" target="_blank" class="social-link">
                <img src="{{asset('images/Web_Images/facebook.png')}}" alt="Facebook" class="social-icon">
            </a>
            <a href="https://x.com/" target="_blank" class="social-link">
                <img src="{{asset('images/Web_Images/X.png')}}" alt="X" class="social-icon">
            </a>
            <a href="https://www.instagram.com/" target="_blank" class="social-link">
                <img src="{{asset('images/Web_Images/instagram.png')}}" alt="instagram" class="social-icon">
            </a>
            <a href="https://www.tiktok.com/" target="_blank" class="social-link">
                <img src="{{asset('images/Web_Images/tik-tok.png')}}" alt="tiktok" class="social-icon">
            </a>
        </section>

        <!-- Footer -->
        <footer style="background-color: #285EAF;color: white;text-align: center;padding: 10px 0;">
            <p>© 2024 DocFi. Todos los derechos reservados.</p>
            <a href="{{ route('terms.conditions') }}" style="color: white; padding: 10px;">Términos y condiciones</a> |
            <a href="#">Política de cookies</a> |
            <a href="{{ route('privacy.policy') }}" style="color: white; padding: 10px;">Política de privacidad</a>
        </footer>



</body>

</html>