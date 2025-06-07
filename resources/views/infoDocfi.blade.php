@include('layouts.header')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCFI - ¿QUIÉNES SOMOS?</title>

    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Estilos personalizados -->
    <style>
        .shadow:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>

<section class="container mt-3">
    <div class="text-center mb-3" data-aos="fade-up">
        <h1 class="fw-bold" style="color: #004455">¿Quiénes Somos?</h1>
        <p class="fs-5" style="color: #454C72">
            <strong>DocFi</strong> es una plataforma innovadora diseñada para ayudar a las personas a reportar y recuperar documentos perdidos, Ya sea, que hayas perdido tu identificación, pasaporte, licencia de conducir u otros documentos importantes que se encuentren disponibles en nuestra app móvil o plataforma web.
            <br>
            <strong>DocFi</strong> te ofrece una solución sencilla y eficiente para recuperarlos.
        </p>
    </div>   

    <div style="background-color: #00475c; padding: 60px 20px;">
        <div class="row align-items-center justify-content-center" style="color: white; text-align: center;">
            <div class="col-md-8 mb-4" data-aos="fade-right">
                <h3 style="font-weight: bold; color: white;"><i class="fas fa-bullseye me-2"></i>Nuestra Misión</h3>
                <p style="font-size: 1.2rem;">Ofrecer una solución confiable y eficiente para que cualquier persona pueda reportar o recuperar documentos extraviados a través de nuestra plataforma web y aplicación móvil.</p>

                <h3 style="font-weight: bold; color: white;" class="mt-4"><i class="fas fa-hands-helping me-2"></i>¿Qué hacemos?</h3>
                <p style="font-size: 1.2rem;">Ayudamos a quienes han perdido documentos como cédulas, licencias, pasaportes, entre otros, a encontrarlos gracias a la colaboración ciudadana.</p>
            </div>

            <div class="col-md-4 d-flex justify-content-center align-items-center" data-aos="fade-left">
                <img src="{{ asset('images/Web_Images/web.jpg') }}" alt="Quiénes somos" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.3);">
            </div>
        </div>

        <!-- Contadores -->
        <div class="row text-center mt-5" data-aos="fade-up">
            <div class="col-md-4">
                <h2 class="fw-bold" style="color:#ffffff;"><span id="docsRecuperados">0</span>+</h2>
                <p>Documentos recuperados</p>
            </div>
            <div class="col-md-4">
                <h2 class="fw-bold" style="color:#ffffff;"><span id="usuariosActivos">0</span>+</h2>
                <p>Usuarios activos</p>
            </div>
            <div class="col-md-4">
                <h2 class="fw-bold" style="color:#ffffff;"><span id="ciudadesCobertura">0</span>+</h2>
                <p>Ciudades con cobertura</p>
            </div>
        </div>
    </div>

    <br>

    <div class="mb-5">
        <h2 class="fw-bold text-center" style="color: #004455" data-aos="zoom-in"><i class="fas fa-cogs me-2"></i>¿Cómo Funciona?</h2>
        <div class="row mt-4">
            <div class="col-md-6 mb-4" data-aos="fade-right">
                <div class="p-4 shadow" style="background-color:rgb(200, 205, 207); border: 2px solid #004455; border-radius: 10px;">
                    <h4 style="color:#1a407a;">📄 Reportar un documento perdido</h4>
                    <ul class="mt-3" style="color:rgb(47, 47, 49)">
                        <li><strong>Registro:</strong> Crea una cuenta en nuestra página web o aplicación móvil.</li>
                        <li><strong>Reporte de pérdida:</strong> Completa un formulario con los detalles del documento perdido.</li>
                        <li><strong>Descripción adicional:</strong> Añade información adicional como lugar o fecha aproximada.</li>
                        <li><strong>Notificaciones:</strong> Activa alertas para recibir información si alguien encuentra tu documento.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 mb-4" data-aos="fade-left">
                <div class="p-4 shadow" style="background-color:rgb(200, 205, 207); border: 2px solid #004455; border-radius: 10px;">
                    <h4 style="color: #1a407a;">🔍 Reportar un documento encontrado</h4>
                    <ul class="mt-3" style="color:rgb(47, 47, 49);">
                        <li><strong>Registro:</strong> Crea una cuenta en nuestra plataforma e inicia sesión para comenzar</li>
                        <li><strong>Reporte de encuentro:</strong> Completa un formulario con detalles del documento encontrado.</li>
                        <li><strong>Subir fotos:</strong> Si es posible, por favor sube algunas fotos del documento para poder revisarlo mejor.</li>
                        <li><strong>Entrega segura:</strong> Coordinamos la entrega del documento al dueño legítimo.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonios -->
    <section class="py-5" style="background-color:#eef4f7;">
        <div class="container text-center">
            <h3 class="fw-bold mb-4" style="color:#004455;">Lo que dicen nuestros usuarios</h3>
            <div class="row justify-content-center">
                <div class="col-md-4" data-aos="fade-right">
                    <blockquote class="blockquote">
                        <p>"Gracias a DocFi recuperé mi cédula en menos de 3 días. ¡Excelente servicio!"</p>
                        <footer class="blockquote-footer">María G.</footer>
                    </blockquote>
                </div>
                <div class="col-md-4" data-aos="fade-left">
                    <blockquote class="blockquote">
                        <p>"Encontré una billetera en el parque y pude reportarla fácilmente. Muy útil."</p>
                        <footer class="blockquote-footer">Carlos A.</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- Redes Sociales -->
    <div style="text-align: center; margin: 20px 0;">
        <h4 style="color: #285EAF;">Síguenos en nuestras redes</h4>
        <div style="display: flex; justify-content: center; gap: 15px; margin-top: 15px;">
            <a href="https://facebook.com/" target="_blank">
                <img src="{{ asset('images/Web_Images/facebook.png') }}" alt="Facebook" style="width: 40px; height: 40px; transition: transform 0.3s ease, opacity 0.3s ease;">
            </a>
            <a href="https://x.com/" target="_blank">
                <img src="{{ asset('images/Web_Images/X.png') }}" alt="X" style="width: 40px; height: 40px; transition: transform 0.3s ease, opacity 0.3s ease;">
            </a>
            <a href="https://www.instagram.com/" target="_blank">
                <img src="{{ asset('images/Web_Images/instagram.png') }}" alt="Instagram" style="width: 40px; height: 40px; transition: transform 0.3s ease, opacity 0.3s ease;">
            </a>
            <a href="https://www.tiktok.com/" target="_blank">
                <img src="{{ asset('images/Web_Images/tik-tok.png') }}" alt="TikTok" style="width: 40px; height: 40px; transition: transform 0.3s ease, opacity 0.3s ease;">
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5" style="background-color: #004455; color: white; padding: 15px 0;">
        <p class="mb-1">© 2025 DOCFI. Todos los derechos reservados.</p>
        <a href="{{ route('terms.conditions') }}" class="text-white me-2">Términos y condiciones</a> |
        <a href="#" class="text-white mx-2">Política de cookies</a> |
        <a href="{{ route('privacy.policy') }}" class="text-white ms-2">Política de privacidad</a>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        // Hover efecto para íconos
        document.querySelectorAll('a img').forEach(icon => {
            icon.addEventListener('mouseenter', () => {
                icon.style.transform = 'scale(1.1)';
                icon.style.opacity = '0.8';
            });
            icon.addEventListener('mouseleave', () => {
                icon.style.transform = 'scale(1)';
                icon.style.opacity = '1';
            });
        });

        // Contadores animados
        function animateValue(id, start, end, duration) {
            let obj = document.getElementById(id);
            let range = end - start;
            let startTime = null;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                let progress = Math.min((timestamp - startTime) / duration, 1);
                obj.innerText = Math.floor(progress * range + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            }

            window.requestAnimationFrame(step);
        }

        document.addEventListener("DOMContentLoaded", function () {
            animateValue("docsRecuperados", 0, 2500, 2000);
            animateValue("usuariosActivos", 0, 800, 1500);
            animateValue("ciudadesCobertura", 0, 120, 1500);
        });
    </script>
</section>

</body>
</html>
