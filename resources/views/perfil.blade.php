{{-- resources/views/perfil.blade.php --}}
@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    /* ... (Tu CSS existente) ... */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding-top: 80px; /* Asegura espacio para el header fijo de app.blade.php */
        display: flex;
        justify-content: center;
        align-items: flex-start; /* Alinea al inicio para no ocultar el header */
        min-height: 100vh;
    }

    .profile-card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        width: 100%;
        padding: 20px 40px;
        margin: 40px 20px;
        box-sizing: border-box; /* Incluye padding en el width */
    }

    .header-title {
        background-color: #004455;
        padding: 80px;
        text-align: center;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        color: white;
        margin: -20px -40px 20px -40px; /* Ajusta márgenes para que ocupe todo el ancho de la tarjeta */
        border-radius: 12px 12px 0 0; /* Solo bordes superiores redondeados */
    }

    .header-title h2 {
        font-size: 40px;
        font-weight: bold;
        margin: 0;
    }

    .header-title span {
        display: block;
        margin-top: 8px;
        font-size: 14px;
        color: #cce3ff;
    }

    .profile-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .profile-image {
        position: relative;
        margin-top: -70px;
        margin-bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2;
    }

    .profile-pic {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        border: 5px solid white;
        background-color: white;
        object-fit: cover;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .upload-btn {
        position: absolute;
        bottom: 0;
        right: 20px;
        background: #285EAF;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .upload-btn:hover {
        background: #1b4b8a;
    }

    input[type="file"] {
        display: none;
    }

    .profile-form {
        width: 100%;
        max-width: 600px;
    }

    .form-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    label {
        flex: 1;
        font-weight: 600;
        color: #333;
        margin-right: 15px;
    }

    input,
    select {
        flex: 2;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        background: #f9f9f9;
    }

    input:focus,
    select:focus {
        border-color: #285EAF;
        outline: none;
        background: white;
    }

    .section-title {
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        color: #004455;
        margin: 30px 0 20px;
    }

    .button-container {
        text-align: center;
        margin-top: 25px;
    }

    .btn {
        background-color: #004455;
        color: white;
        padding: 10px 38px;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        margin: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #285EAF;
    }

    .hidden {
        display: none;
    }

    .ayuda, .cuenta {
        text-align: center;
        font-weight: bold;
        margin-top: 30px;
        font-size: 16px;
        color: #004455;
    }

    .ayuda p {
        font-size: 18px;
        font-weight: bold;
        color: #285EAF;
        margin-bottom: 10px;
    }

    .ayuda a,
    .cuenta a {
        color: #285EAF;
        text-decoration: none;
        margin: 0 10px;
    }

    .cuenta .eliminar {
        color: #B45959;
    }

    .cuenta .eliminar:hover {
        color: #922e2e;
    }
</style>
@endpush

@section('content')
<div class="profile-card">
    <div class="header-title">
        <h2>Perfil del Usuario</h2>
        <span id="estado-perfil">Cargando estado...</span>
    </div>

    <div class="profile-content">
        <div class="profile-image">
            <img src="{{ asset('images/Web_Images/perfil.png') }}" id="preview-image" class="profile-pic">
            <input type="file" id="file-input" accept="image/*" disabled>
            <label for="file-input" class="upload-btn" id="upload-label" style="display: none;">
                <i class="fas fa-camera"></i>
            </label>
        </div>

        <div class="profile-form">
            <div class="section-title">Datos personales</div>

            @foreach(['documento' => 'text', 'usuario' => 'text', 'correo' => 'email', 'nombres' => 'text', 'apellidos' => 'text', 'telefono' => 'text', 'direccion' => 'text', 'fecha' => 'date'] as $campo => $type)
            <div class="form-group">
                <label for="{{ $campo }}">{{ ucfirst(str_replace('_', ' ', $campo)) }}</label>
                <input type="{{ $type }}" id="{{ $campo }}" disabled>
            </div>
            @endforeach

            <div class="form-group">
                <label for="tipo_doc">Tipo de Documento</label>
                <select id="tipo_doc" disabled>
                    <option value="">Seleccione</option>
                    <option value="cc">Cédula</option>
                    <option value="ti">Tarjeta de Identidad</option>
                    <option value="pasaporte">Pasaporte</option>
                </select>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select id="rol" disabled>
                    <option value="">Seleccione</option>
                    <option value="usuario">Usuario</option>
                    <option value="soporte">Soporte</option>
                </select>
            </div>
        </div>
    </div>

    <div class="button-container">
        {{-- BOTÓN DE CAMBIAR CONTRASEÑA COMENTADO PARA NO MOSTRARLO --}}
        {{-- <button class="btn" type="button" onclick="mostrarCambioClave()">Cambiar Contraseña</button> --}}
        <button class="btn" id="edit-btn" onclick="editarPerfil()">Editar Perfil</button>
    </div>

    {{-- <div id="password-section" class="hidden" style="margin-top: 20px;">
        <div class="form-group">
            <label for="current-password">Contraseña actual</label>
            <input type="password" id="current-password">
        </div>
        <div class="form-group">
            <label for="new-password">Nueva contraseña</label>
            <input type="password" id="new-password">
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirmar contraseña</label>
            <input type="password" id="confirm-password">
        </div>
        <div class="button-container">
            <button class="btn" type="button" onclick="guardarNuevaClave()">Guardar Contraseña Nueva</button>
            <button class="btn" type="button" onclick="cancelarCambioClave()">Cancelar</button>
        </div>
    </div> --}}

    <div class="button-container">
        <button class="btn hidden" id="save-btn" onclick="guardarPerfil()">Guardar Cambios</button>
        <button class="btn hidden" id="back-btn" onclick="cancelarCambios()">Volver</button>
    </div>

    <div class="ayuda">
        <p><strong>¿Necesitas ayuda?</strong></p>
        <a href="{{ route('pqr') }}">PQR</a>
    </div>

    <div class="cuenta">
        <a href="#" onclick="window.cerrarSesion()">Cerrar sesión</a> |
        <a href="#" class="eliminar" onclick="eliminarCuenta()">Eliminar cuenta</a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let originalProfileData = {};
    let currentUserId = null; // Necesitamos este ID para la URL de PATCH ahora que el urls.py lo requiere

    async function cargarDatosPerfil() {
        try {
            // URL para obtener el perfil del usuario autenticado (Endpoint /api/me/)
            const profileApiUrl = 'http://127.0.0.1:8001/api/me/'; 
            
            const response = await window.fetchConToken(profileApiUrl);
            
            if (response.ok) {
                const data = await response.json();
                console.log("Datos del perfil recibidos:", data);

                // ALMACENAR EL ID DEL USUARIO PARA LA FUNCIÓN DE ACTUALIZAR
                currentUserId = data.id; 

                document.getElementById('documento').value = data.numero_documento || '';
                document.getElementById('usuario').value = data.username || '';
                document.getElementById('correo').value = data.email || '';
                document.getElementById('nombres').value = data.first_name || '';
                document.getElementById('apellidos').value = data.last_name || '';
                document.getElementById('telefono').value = data.telefono || '';
                document.getElementById('direccion').value = data.direccion || '';
                document.getElementById('fecha').value = data.fecha_nacimiento || '';

                const tipoDocSelect = document.getElementById('tipo_doc');
                if (tipoDocSelect) {
                    const docType = data.tipo_documento ? data.tipo_documento.toLowerCase() : '';
                    tipoDocSelect.value = docType;
                }

                const rolSelect = document.getElementById('rol');
                if (rolSelect) {
                    const userType = data.tipo_usuario ? data.tipo_usuario.toLowerCase() : '';
                    rolSelect.value = userType;
                }

                originalProfileData = {
                    documento: data.numero_documento || '',
                    usuario: data.username || '',
                    correo: data.email || '',
                    nombres: data.first_name || '',
                    apellidos: data.last_name || '',
                    telefono: data.telefono || '',
                    direccion: data.direccion || '',
                    fecha: data.fecha_nacimiento || '',
                    tipo_doc: data.tipo_documento || '', 
                    rol: data.tipo_usuario || '' 
                };

                document.getElementById('estado-perfil').textContent = 'Estado: Activo';

            } else if (response.status === 401) {
                console.error('Error 401: Sesión no autorizada o expirada. Redirigiendo al login.');
                alert('Sesión expirada. Por favor, inicia sesión de nuevo.');
                window.location.href = "{{ route('login') }}";
            } else {
                let errorDetails = '';
                try {
                    const errorData = await response.json();
                    errorDetails = JSON.stringify(errorData, null, 2);
                } catch (jsonError) {
                    errorDetails = await response.text();
                    errorDetails = errorDetails.substring(0, Math.min(errorDetails.length, 200)) + '...';
                }
                
                console.error("Error al cargar datos del perfil. Estado:", response.status, "Detalles:", errorDetails);
                document.getElementById('estado-perfil').textContent = 'Estado: Error al cargar';
                alert(`Error al cargar la información del perfil. Código: ${response.status}. Detalles: ${errorDetails}`);
            }
        } catch (error) {
            console.error("Error de red o inesperado al cargar perfil:", error);
            document.getElementById('estado-perfil').textContent = 'Estado: Error de red';
            alert('Error de conexión al cargar la información del perfil. Por favor, verifica tu conexión y que el servidor de la API esté corriendo.');
        }
    }

    document.addEventListener("DOMContentLoaded", cargarDatosPerfil);

    function editarPerfil() {
        document.getElementById('correo').disabled = false;
        document.getElementById('telefono').disabled = false;
        document.getElementById('direccion').disabled = false;

        document.getElementById('edit-btn').classList.add('hidden');
        document.getElementById('save-btn').classList.remove('hidden');
        document.getElementById('back-btn').classList.remove('hidden');
        document.getElementById('upload-label').style.display = 'inline-block';
    }

    async function guardarPerfil() {
        if (currentUserId === null) {
            alert('No se pudo obtener el ID del usuario para actualizar el perfil. Recarga la página y asegúrate de iniciar sesión.');
            return;
        }

        const email = document.getElementById('correo').value;
        const telefono = document.getElementById('telefono').value;
        const direccion = document.getElementById('direccion').value;

        if (!email || !telefono || !direccion) {
            alert('Todos los campos editables (Email, Teléfono, Dirección) son obligatorios.');
            return;
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            alert('Por favor, introduce un formato de email válido.');
            return;
        }

        const dataToUpdate = {
            email: email,
            telefono: telefono,
            direccion: direccion
        };

        try {
            // URL para actualizar el perfil del usuario autenticado (Endpoint /api/usuario/perfil/actualizar/{idUsuario}/)
            const updateApiUrl = `http://127.0.0.1:8001/api/usuario/perfil/actualizar/${currentUserId}/`; 
            
            const response = await window.fetchConToken(updateApiUrl, {
                method: 'PATCH',
                body: JSON.stringify(dataToUpdate)
            });

            if (response.ok) {
                alert('Cambios guardados correctamente.');
                document.getElementById('correo').disabled = true;
                document.getElementById('telefono').disabled = true;
                document.getElementById('direccion').disabled = true;

                document.getElementById('save-btn').classList.add('hidden');
                document.getElementById('back-btn').classList.add('hidden');
                document.getElementById('edit-btn').classList.remove('hidden');
                document.getElementById('upload-label').style.display = 'none';
                cargarDatosPerfil(); 
            } else if (response.status === 401) {
                console.error('Error 401: Sesión no autorizada o expirada al guardar perfil. Redirigiendo al login.');
                alert('Sesión expirada. Por favor, inicia sesión de nuevo.');
                window.location.href = "{{ route('login') }}";
            } else {
                let errorDetails = '';
                try {
                    const errorData = await response.json();
                    errorDetails = JSON.stringify(errorData, null, 2);
                } catch (jsonError) {
                    errorDetails = await response.text();
                    errorDetails = errorDetails.substring(0, Math.min(errorDetails.length, 200)) + '...';
                }
                
                console.error("Error al guardar perfil. Estado:", response.status, "Detalles:", errorDetails);
                let errorMessage = 'Error al guardar los cambios.';
                if (errorDetails) {
                    errorMessage += '\nDetalles: ' + errorDetails;
                }
                alert(errorMessage);
            }
        } catch (error) {
            console.error("Error de red al guardar perfil:", error);
            alert('Error de conexión al intentar guardar los cambios. Por favor, verifica tu conexión y el servidor de la API.');
        }
    }

    function cancelarCambios() {
        document.getElementById('documento').value = originalProfileData.documento;
        document.getElementById('usuario').value = originalProfileData.usuario;
        document.getElementById('correo').value = originalProfileData.correo;
        document.getElementById('nombres').value = originalProfileData.nombres;
        document.getElementById('apellidos').value = originalProfileData.apellidos;
        document.getElementById('telefono').value = originalProfileData.telefono;
        document.getElementById('direccion').value = originalProfileData.direccion;
        document.getElementById('fecha').value = originalProfileData.fecha;

        const tipoDocSelect = document.getElementById('tipo_doc');
        if (tipoDocSelect) {
            tipoDocSelect.value = originalProfileData.tipo_doc ? originalProfileData.tipo_doc.toLowerCase() : '';
        }
        const rolSelect = document.getElementById('rol');
        if (rolSelect) {
            rolSelect.value = originalProfileData.rol ? originalProfileData.rol.toLowerCase() : '';
        }

        document.querySelectorAll('input, select').forEach(el => el.disabled = true);

        document.getElementById('save-btn').classList.add('hidden');
        document.getElementById('back-btn').classList.add('hidden');
        document.getElementById('edit-btn').classList.remove('hidden');
        document.getElementById('upload-label').style.display = 'none';
    }

    document.getElementById('file-input').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview-image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    async function eliminarCuenta() {
        if (confirm('¿Estás seguro de que quieres eliminar tu cuenta? Esta acción es irreversible.')) {
            try {
                // Esta URL dependerá de cómo configures el endpoint de eliminación en Django.
                // Si tienes un endpoint DELETE para /api/usuario/{id}/ o /api/me/delete/
                // Asumo que si vas a eliminar la cuenta del usuario autenticado, no necesitas el ID en la URL.
                // Si Django tiene un endpoint como `path('eliminar/', views.eliminarUsuarioView, name='eliminar-usuario')`
                // entonces la URL sería 'http://127.0.0.1:8001/api/usuario/eliminar/'
                // Si necesitas el ID en la URL, sería `http://127.0.0.1:8001/api/usuario/${currentUserId}/` y tu vista de Django debe manejar DELETE.
                const deleteApiUrl = 'http://127.0.0.1:8001/api/usuario/eliminar/'; // Asumo esta URL, ajústala a tu implementación real para DELETE
                
                const response = await window.fetchConToken(deleteApiUrl, {
                    method: 'DELETE' 
                });

                if (response.ok) {
                    alert('Tu cuenta ha sido eliminada exitosamente.');
                    window.cerrarSesion();
                } else if (response.status === 401) {
                    alert('No autorizado. Tu sesión puede haber expirado. Por favor, inicia sesión de nuevo.');
                    window.location.href = "{{ route('login') }}";
                } else {
                    let errorData = '';
                    try {
                        errorData = await response.json();
                        errorData = JSON.stringify(errorData, null, 2);
                    } catch (e) {
                        errorData = await response.text();
                        errorData = errorData.substring(0, Math.min(errorData.length, 200)) + '...';
                    }
                    console.error("Error al eliminar cuenta:", errorData);
                    let errorMessage = 'Error al eliminar la cuenta.';
                    if (errorData) {
                        errorMessage += '\nDetalles: ' + errorData;
                    }
                    alert(errorMessage);
                }
            } catch (error) {
                console.error("Error de red al eliminar cuenta:", error);
                alert('Error de conexión al intentar eliminar la cuenta.');
            }
        }
    }
</script>
@endpush