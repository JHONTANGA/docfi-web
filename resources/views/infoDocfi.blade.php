@include('layouts.header')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCFI - ¿QUIÉNES SOMOS?</title>
</head>

<body>
    

    <section class="container mt-3">
   

   
       <div class="text-center mb-3">
            <h1 class="fw-bold" style="color: #004455">¿Quiénes Somos?</h1>
            <p class="fs-5" style="color: #454C72">
                <strong>DocFi</strong> es una plataforma innovadora diseñada
                    para ayudar a las personas a reportar y recuperar documentos perdidos, Ya sea, que hayas perdido tu identificación,
                    pasaporte, licencia de conducir u otros
                    documentos importantes que se encuentren
                    disponibles en nuestra app móvil o plataforma
                    web.
                    <br>
                    <strong>DocFi</strong> te ofrece una solución sencilla y eficiente
                    para recuperarlos.
              </div>   
            </p>
        
        <br>
        
    <div style="background-color: #00475c; padding: 60px 20px;">
    <div class="row align-items-center justify-content-center" style="color: white; text-align: center;">
        <div class="col-md-8 mb-4">
            <h3 style="font-weight: bold; color: white;">Nuestra Misión</h3>
            <p style="font-size: 1.2rem; color: white;">
                Ofrecer una solución confiable y eficiente para que cualquier persona pueda reportar o recuperar documentos extraviados a través de nuestra plataforma web y aplicación móvil.
            </p>

            <h3 style="font-weight: bold; color: white;" class="mt-4">¿Qué hacemos?</h3>
            <p style="font-size: 1.2rem; color: white;">
                Ayudamos a quienes han perdido documentos como cédulas, licencias, pasaportes, entre otros, a encontrarlos gracias a la colaboración ciudadana.
            </p>
        </div>

        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/Web_Images/web.jpg') }}" alt="Quiénes somos" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.3);">
        </div>
    </div>
</div>
<br>



        <div class="mb-5">
            <h2 class="fw-bold text-center" style="color: #004455">¿Cómo Funciona?</h2>
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
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
                <div class="col-md-6 mb-4">
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

       <div style="text-align: center; margin: 20px 0;">
    <h4 style="color: #285EAF;">Síguenos en nuestras redes</h4>
    <div style="display: flex; justify-content: center; gap: 15px; margin-top: 15px;">
        <a href="https://facebook.com/" target="_blank" style="display: inline-block; text-decoration: none;">
            <img src="{{ asset('images/Web_Images/facebook.png') }}" alt="Facebook" style="width: 40px; height: 40px; transition: transform 0.3s ease, opacity 0.3s ease;">
        </a>
        <a href="https://x.com/" target="_blank" style="display: inline-block; text-decoration: none;">
            <img src="{{ asset('images/Web_Images/X.png') }}" alt="X" style="width: 40px; height: 40px; transition: transform 0.3s ease, opacity 0.3s ease;">
        </a>
        <a href="https://www.instagram.com/" target="_blank" style="display: inline-block; text-decoration: none;">
            <img src="{{ asset('images/Web_Images/instagram.png') }}" alt="Instagram" style="width: 40px; height: 40px; transition: transform 0.3s ease, opacity 0.3s ease;">
        </a>
        <a href="https://www.tiktok.com/" target="_blank" style="display: inline-block; text-decoration: none;">
            <img src="{{ asset('images/Web_Images/tik-tok.png') }}" alt="TikTok" style="width: 40px; height: 40px; transition: transform 0.3s ease, opacity 0.3s ease;">
        </a>
    </div>
</div>

<script>
    // Agrega efecto de hover con JavaScript si no estás usando CSS externo
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
</script>

    <footer class="text-center mt-5" style="background-color: #004455; color: white; padding: 15px 0;">
        <p class="mb-1">© 2025 DOCFI. Todos los derechos reservados.</p>
        <a href="{{ route('terms.conditions') }}" class="text-white me-2">Términos y condiciones</a> |
        <a href="#" class="text-white mx-2">Política de cookies</a> |
        <a href="{{ route('privacy.policy') }}" class="text-white ms-2">Política de privacidad</a>
    </footer>

</body>
</html>
