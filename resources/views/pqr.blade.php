@extends('layouts.app') {{-- ASEGÚRATE DE QUE ESTÁS EXTENDIENDO layouts.app --}}

@section('content')
<div class="form-container">
    <div class="main-container">

        <div class="info-card">
            <h2><strong>Radica tu PQR</strong></h2>
            <p>
                En <strong>DocFi</strong> trabajamos por brindarte una atención eficiente y transparente.<br><br>
                Envía tu petición, queja o reclamo de forma segura y rápida.<br><br>
                <strong>¡Estamos aquí para ayudarte!</strong>
            </p>
        </div>

        <div class="form-card">
            <h2>Formulario de<br>Peticiones, Quejas o Reclamos</h2>

            <form id="formularioPQR">
                @csrf

                <label for="nombre">Nombre completo</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="correo">Correo electrónico</label>
                <input type="email" name="correo" id="correo" required>

                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" required>

                <label for="tipo_pqrs">Tipo de solicitud</label>
                <select name="tipo_pqrs" id="tipo_pqrs" required>
                    <option value="">-- Selecciona una opción --</option>
                    <option value="Peticiones">Peticiones</option>
                    <option value="Quejas">Quejas</option>
                    <option value="Reclamos">Reclamos</option>
                    <option value="Sugerencias">Sugerencias</option>
                </select>


                <label for="titulo">Título de la solicitud</label>
                <input type="text" name="titulo" id="titulo" maxlength="32" required>

                <label for="detalles">Descripción de la solicitud</label>
                <textarea name="detalles" id="detalles" placeholder="Escribe tu solicitud aquí..." required maxlength="128"></textarea>

                <input type="hidden" name="estado" id="estado" value="Espera">

                <div class="boton-contenedor">
                    <button type="submit" class="custom-send-btn">
                        <strong>Enviar PQR</strong> <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>

            <div id="mensajeCodigo" class="message success" style="display: none;">
                <strong>Guarda tu código de seguimiento:</strong>
                <div id="codigoSeguimiento" class="codigo-seguimiento"></div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('styles') {{-- CORREGIDO: De @section a @push --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/* Aquí van tus estilos CSS existentes */
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
@endpush {{-- CIERRE DE @push --}}

@push('scripts') {{-- CORREGIDO: De @section a @push --}}
<script>
document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM completamente cargado ✅");

    const formulario = document.getElementById("formularioPQR");

    // Agregamos una verificación para asegurarnos de que el formulario exista
    // antes de intentar añadir un event listener, esto previene errores si el DOM no se carga como se espera.
    if (formulario) {
        formulario.addEventListener("submit", async (e) => {
            e.preventDefault();
            console.log("Formulario enviado 🚀");

            const token = localStorage.getItem("access_token");
            
            if (!token) {
                console.warn("Token no encontrado ❌");
                alert("Sesión expirada. Inicia sesión de nuevo.");
                window.location.href = "{{ route('login') }}";
                return;
            }

            // Recopila los datos reales de los campos del formulario
            const datos = {
                nombre: document.getElementById("nombre").value,
                correo: document.getElementById("correo").value,
                telefono: document.getElementById("telefono").value,
                tipo_pqrs: document.getElementById("tipo_pqrs").value,
                titulo: document.getElementById("titulo").value,
                detalles: document.getElementById("detalles").value,
                estado: document.getElementById("estado").value, // Este es el campo oculto
                tomado_por: null // Mantener null si es el comportamiento deseado para tu API
            };

            console.log("Datos a enviar a la API:", datos);

            try {
                // Usar fetchConToken para incluir automáticamente el header de autorización
                // Asegúrate que 'fetchConToken' está definida en 'layouts/app.blade.php' o un script global
                // y que la URL es la correcta de tu API Django para crear PQRs.
                const respuesta = await fetchConToken("http://127.0.0.1:8001/api/pqrs/crear/", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(datos)
                });

                if (respuesta.ok) {
                    const data = await respuesta.json();
                    alert("PQR enviada correctamente.");
                    formulario.reset();

                    if (data.id) {
                        document.getElementById("codigoSeguimiento").textContent = "ID de seguimiento: " + data.id;
                        document.getElementById("mensajeCodigo").style.display = "block";
                    }
                } else if (respuesta.status === 401) {
                    alert("Sesión expirada. Inicia sesión nuevamente.");
                    window.location.href = "{{ route('login') }}";
                } else {
                    const error = await respuesta.json();
                    console.error("Error al enviar la PQR:", error);
                    alert("Error al enviar la PQR: " + JSON.stringify(error));
                }
            } catch (error) {
                console.error("Error de red ❌", error);
                alert("Error de red al enviar la PQR.");
            }
        });
    } else {
        console.error("El formulario con ID 'formularioPQR' no fue encontrado.");
    }
});

console.log("Script directo al final de la vista cargado 🔥");
</script>
@endpush {{-- CIERRE DE @push --}}