@extends('layouts.app')

@section('content')
<div class="consulta-container">
    <div class="tabla-card">
        <h2 class="titulo">Tus Solicitudes PQR</h2>
        <div class="filter-section">
            <input type="text" id="filtroCorreo" placeholder="Filtrar por correo electrónico" class="form-control">
            <button id="aplicarFiltro" class="btn btn-primary">Aplicar Filtro</button>
            <button id="limpiarFiltro" class="btn btn-secondary">Limpiar Filtro</button>
        </div>

        <div class="table-responsive"> {{-- Contenedor para scroll horizontal en móviles --}}
            <table id="tablaPQRs">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Tipo</th>
                        <th>Título</th>
                        <th>Detalles</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Filas de PQR se cargarán aquí --}}
                </tbody>
            </table>
        </div>

        <div id="mensajeCarga" class="mensaje-info">
            Cargando tus solicitudes...
        </div>
        <div id="mensajeVacio" class="mensaje-info" style="display:none;">
            No tienes PQRs registradas con este usuario o no se encontraron resultados para tu filtro.
        </div>
        <div id="mensajeError" class="mensaje-error" style="display:none;">
            Ocurrió un error al cargar las solicitudes. Por favor, inténtalo de nuevo.
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Estilos generales del layout ya están en app.blade.php */

.consulta-container {
    padding: 60px 20px;
    background-color: #f0f4f8;
    min-height: calc(100vh - 80px);
    display: flex;
    justify-content: center;
    align-items: flex-start;
}
.tabla-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 100%;
    max-width: 1200px;
}
.titulo {
    text-align: center;
    color: #285EAF;
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 25px;
}

/* Sección de filtro */
.filter-section {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
    justify-content: center;
    flex-wrap: wrap;
}
.filter-section input {
    flex-grow: 1;
    max-width: 300px;
    padding: 10px 15px; /* Ligeramente más grande */
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 1rem; /* Tamaño de fuente estándar */
}
.filter-section .btn {
    padding: 10px 20px; /* Botones más grandes */
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease; /* Añadir transform para efecto click */
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Sombra para botones */
}
.filter-section .btn:active {
    transform: translateY(1px); /* Efecto de "presionado" */
}
.filter-section .btn-primary {
    background-color: #285EAF;
    color: white;
    border: none;
}
.filter-section .btn-primary:hover {
    background-color: #004455;
}
.filter-section .btn-secondary {
    background-color: #6c757d;
    color: white;
    border: none;
}
.filter-section .btn-secondary:hover {
    background-color: #5a6268;
}

/* Estilos de la tabla */
.table-responsive {
    overflow-x: auto; /* Permite scroll horizontal en tablas grandes */
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 0.95rem;
    overflow: hidden;
    border-radius: 10px; /* Bordes redondeados para la tabla */
}
thead {
    background-color: #285EAF;
    color: white;
}
th, td {
    padding: 12px 15px;
    text-align: left;
    white-space: nowrap; /* Evitar que el texto se rompa en varias líneas en las celdas */
}
th {
    font-weight: 600;
}
td {
    border-bottom: 1px solid #e0e0e0;
}
tr:last-child td {
    border-bottom: none;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}
tbody tr:hover {
    background-color: #e6f7ff;
}

/* Estilos para los mensajes de estado */
.mensaje-info {
    text-align: center;
    margin-top: 20px;
    color: #004455;
    font-size: 1.1rem;
    font-weight: 500;
}
.mensaje-error {
    text-align: center;
    margin-top: 20px;
    color: #dc3545;
    font-size: 1.1rem;
    font-weight: 500;
}


/* Responsive para tablas pequeñas (mantener si lo necesitas) */
@media (max-width: 768px) {
    /* Aquí puedes ajustar si quieres que la tabla sea "stackable" o solo con scroll */
    /* Si la quieres stackable (cada celda se convierte en bloque): */
    table, thead, tbody, th, td, tr {
        display: block;
    }
    thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }
    tr {
        margin-bottom: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
    }
    td {
        border: none;
        position: relative;
        padding-left: 50%;
        text-align: right;
        font-size: 0.9rem;
        white-space: normal; /* Permitir que el texto se rompa en móviles */
    }
    td::before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        width: 45%;
        font-weight: bold;
        text-align: left;
        color: #285EAF;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", async () => {
    const tablaBody = document.querySelector("#tablaPQRs tbody");
    const mensajeCarga = document.getElementById("mensajeCarga");
    const mensajeVacio = document.getElementById("mensajeVacio");
    const mensajeError = document.getElementById("mensajeError");
    const filtroCorreoInput = document.getElementById("filtroCorreo");
    const aplicarFiltroBtn = document.getElementById("aplicarFiltro");
    const limpiarFiltroBtn = document.getElementById("limpiarFiltro");

    // Helper para mostrar/ocultar mensajes
    function mostrarMensaje(tipo) {
        mensajeCarga.style.display = "none";
        mensajeVacio.style.display = "none";
        mensajeError.style.display = "none";
        if (tipo === 'cargando') mensajeCarga.style.display = "block";
        else if (tipo === 'vacio') mensajeVacio.style.display = "block";
        else if (tipo === 'error') mensajeError.style.display = "block";
    }

    // Asegurarse de que parseJwt esté disponible globalmente.
    // Si no está en app.blade.php o un archivo global, lo definimos aquí.
    if (typeof parseJwt === 'undefined') {
        window.parseJwt = function(token) {
            try {
                const payload = token.split('.')[1];
                const base64 = payload.replace(/-/g, '+').replace(/_/g, '/');
                const jsonPayload = decodeURIComponent(atob(base64).split('').map(c =>
                    '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2)
                ).join(''));
                return JSON.parse(jsonPayload);
            } catch (e) {
                console.error("Error al parsear JWT:", e);
                return null;
            }
        };
    }

    let todasLasPQRsEnCache = []; // Para almacenar todas las PQRs de la API y poder filtrar

    async function cargarPQRs(filtroEmail = null) {
        mostrarMensaje('cargando');
        tablaBody.innerHTML = ''; // Limpiar la tabla

        // Usar la función global de app.blade.php para verificar y renovar token
        await verificarYRenovarToken(); // Esta función ya maneja la redirección

        const token = localStorage.getItem("access_token");

        if (!token) {
            // Si después de verificar y renovar, no hay token, significa que no está logueado
            window.location.href = "{{ route('login') }}";
            return;
        }

        try {
            // Intentar cargar de la caché primero si no hay filtro nuevo y ya tenemos datos
            if (filtroEmail === null && todasLasPQRsEnCache.length > 0) {
                console.log("Cargando PQRs desde caché local.");
                renderizarPQRs(todasLasPQRsEnCache, token);
                return; // Salir de la función después de cargar desde caché
            }

            // Realizar la llamada a la API si no hay caché o si hay un filtro nuevo
            const response = await fetchConToken("http://127.0.0.1:8001/api/pqrs/listado/", {
                method: "GET"
            });

            const apiResponse = await response.json(); // Leer la respuesta completa

            // ¡EL CAMBIO CRÍTICO AQUÍ! Acceder a la propiedad 'data' del objeto de respuesta
            if (response.ok && apiResponse && Array.isArray(apiResponse.data)) {
                todasLasPQRsEnCache = apiResponse.data; // Guardar *todos* los datos de la API en caché

                renderizarPQRs(todasLasPQRsEnCache, token, filtroEmail); // Llamar a la nueva función de renderizado

            } else {
                console.error("Error en la respuesta de la API (no es un array o formato incorrecto):", apiResponse);
                mostrarMensaje('error');
            }
        } catch (err) {
            console.error("Error al cargar PQRs:", err);
            mostrarMensaje('error');
        }
    }

    // Nueva función para renderizar y filtrar los PQRs
    function renderizarPQRs(pqrsParaRenderizar, token, filtroEmail = null) {
        tablaBody.innerHTML = ''; // Limpiar la tabla antes de renderizar
        const usuario = parseJwt(token);
        const usuarioEmailLogueado = usuario?.email;

        const pqrFiltradas = pqrsParaRenderizar.filter(pqr => {
            const esDelUsuarioLogueado = pqr.correo === usuarioEmailLogueado;
            const coincideConFiltroManual = filtroEmail ? pqr.correo.toLowerCase().includes(filtroEmail.toLowerCase()) : true;
            return esDelUsuarioLogueado && coincideConFiltroManual;
        });

        if (pqrFiltradas.length === 0) {
            mostrarMensaje('vacio');
        } else {
            pqrFiltradas.forEach(pqr => {
                const fila = document.createElement("tr");
                const fechaPQR = pqr.fecha ? new Date(pqr.fecha) : new Date(pqr.created_at);
                const fechaFormateada = fechaPQR instanceof Date && !isNaN(fechaPQR) ? fechaPQR.toLocaleString() : 'Fecha Desconocida';

                fila.innerHTML = `
                    <td data-label="ID">${pqr.id || 'N/A'}</td>
                    <td data-label="Nombre">${pqr.nombre || 'N/A'}</td>
                    <td data-label="Correo">${pqr.correo || 'N/A'}</td>
                    <td data-label="Teléfono">${pqr.telefono || 'N/A'}</td>
                    <td data-label="Tipo">${pqr.tipo_pqrs || 'N/A'}</td>
                    <td data-label="Título">${pqr.titulo || 'N/A'}</td>
                    <td data-label="Detalles">${pqr.detalles || 'N/A'}</td>
                    <td data-label="Fecha">${fechaFormateada}</td>
                    <td data-label="Estado">${pqr.estado || 'N/A'}</td>
                `;
                tablaBody.appendChild(fila);
            });
            mostrarMensaje('none'); // Ocultar todos los mensajes
        }
    }


    // Event listeners para el filtro
    aplicarFiltroBtn.addEventListener('click', () => {
        const filtro = filtroCorreoInput.value.trim();
        renderizarPQRs(todasLasPQRsEnCache, localStorage.getItem("access_token"), filtro);
    });

    limpiarFiltroBtn.addEventListener('click', () => {
        filtroCorreoInput.value = ''; // Limpiar el campo
        renderizarPQRs(todasLasPQRsEnCache, localStorage.getItem("access_token"), null); // Recargar sin filtro
    });

    // Cargar PQRs al iniciar la página
    cargarPQRs();
});
</script>
@endpush