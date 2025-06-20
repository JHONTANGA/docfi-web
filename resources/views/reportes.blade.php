{{-- resources/views/mis-reportes.blade.php --}}
@extends('layouts.app')

@section('content')
{{-- Banner superior con el degradado --}}
{{-- Se ha eliminado el párrafo que causaba solapamiento y el botón de atrás de la tabla --}}
<div class="py-5 text-white docfi-gradient-banner">
    <div class="container text-center animate__animated animate__fadeInDown">
        <h1 class="fw-bold" style="font-size: 1.5rem;">Mis Reportes de Documentos Extraviados
  </h1>
        {{-- ¡ELIMINADO! <p class="mt-3" style="font-size: 1.25rem;">Aquí puedes ver los documentos que has reportado.</p> --}}
    </div>
</div>

{{-- Contenedor principal con fondo blanco y sombra, para la tabla --}}
<div class="container main-white-content animate__animated animate__fadeInUp">
    <div class="card my-4 shadow-sm border-0">
        <div class="card-header card-header-custom text-white py-3 px-4">
            <h5 class="mb-0 text-capitalize ps-3">Listado de Reportes</h5>
            {{-- ¡ELIMINADO EL BOTÓN DE ATRÁS DE AQUÍ! --}}
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Tipo Doc.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Número Doc.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Propietario</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ubicación Perdida</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Detalle</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha Reporte</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Estado</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody id="reportesTableBody">
                        <tr>
                            <td colspan="8" class="text-center text-muted py-5" id="initialLoadMessage">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Cargando reportes...</span>
                                </div>
                                <p class="mt-3 text-muted">Cargando reportes, por favor espera...</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-4">
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* No necesitamos padding-top para el body aquí, lo maneja app.blade.php */
    body {
        padding-top: 0 !important; /* Aseguramos que no haya padding-top extra aquí */
    }

    /* Estilo para el banner superior con degradado */
    .docfi-gradient-banner {
        background: linear-gradient(135deg, #004455, #007788);
        padding-top: 3rem; /* Padding interno para el contenido del banner */
        padding-bottom: 3rem;
        margin-top: 0; /* No debe tener margen superior negativo aquí */
        position: relative; /* Importante para z-index */
        z-index: 0; /* Asegura que esté por debajo del contenido blanco */
    }

    /* Contenedor principal con fondo blanco y sombra, para la tabla */
    .main-white-content {
        background-color: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        padding: 2rem;
        /* Este margen negativo hará que se superponga con el banner */
        /* Puedes ajustar este valor si necesitas que el card suba más o baje un poco */
        margin-top: -5rem; 
        position: relative; /* Importante para z-index */
        z-index: 1; /* Asegura que esté por encima del degradado */
    }

    /* Estilos para el encabezado del Card donde está la tabla */
    .card-header-custom {
        background: linear-gradient(90deg, #004455, #007788) !important;
        border-radius: 0.75rem 0.75rem 0 0 !important;
    }

    /* Estilos generales de la tabla (sin cambios significativos) */
    .table thead th {
        font-weight: bold;
        color: #454C72;
        border-bottom: 2px solid #e0e0e0;
        padding: 12px 15px;
    }
    .table tbody tr {
        transition: background-color 0.2s ease;
    }
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    .table tbody td {
        padding: 10px 15px;
        vertical-align: middle;
        border-top: 1px solid #f0f0f0;
    }

    .text-xs { font-size: 0.85rem; }
    .font-weight-bold { font-weight: 600; }
    .badge { display: inline-block; padding: 0.35em 0.65em; font-size: 0.75em; font-weight: 700; line-height: 1; color: #fff; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 0.375rem; }
    .badge-success { background-color: #28a745; }
    .badge-warning { background-color: #ffc107; color: #333; }
    .badge-danger { background-color: #dc3545; }
    .badge-info { background-color: #17a2b8; }
    .badge-primary { background-color: #007bff; }
    .badge-secondary { background-color: #6c757d; }

    .spinner-border { width: 3rem; height: 3rem; }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM para mis-reportes.blade.php cargado ✅");

    const reportesTableBody = document.getElementById("reportesTableBody");
    const initialLoadMessage = document.getElementById("initialLoadMessage");

    const API_URL = "http://127.0.0.1:8001/api/reporte/listado/?page=1"; 

    async function fetchAndDisplayReports() {
        reportesTableBody.innerHTML = `
            <tr>
                <td colspan="8" class="text-center text-muted py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Cargando reportes...</span>
                    </div>
                    <p class="mt-3 text-muted">Cargando reportes, por favor espera...</p>
                </td>
            </tr>
        `;

        try {
            const response = await window.fetchConToken(API_URL, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json"
                }
            });

            if (response.ok) {
                const data = await response.json();
                console.log("Datos de reportes recibidos:", data);
                renderReports(data.data);
            } else if (response.status === 401) {
                console.warn("Sesión expirada o no autorizada. Redirigiendo a login.");
                alert("Sesión expirada. Por favor, inicia sesión de nuevo.");
                window.location.href = "{{ route('login') }}";
            } else {
                const errorData = await response.json();
                console.error("Error al obtener reportes:", errorData);
                reportesTableBody.innerHTML = `<tr><td colspan="8" class="text-center text-danger py-5">Error al cargar los reportes: ${errorData.detail || 'Error desconocido'}.</td></tr>`;
            }
        } catch (error) {
            console.error("Error de red o en la petición:", error);
            reportesTableBody.innerHTML = `<tr><td colspan="8" class="text-center text-danger py-5">No se pudo conectar con el servidor de reportes.</td></tr>`;
        }
    }

    function renderReports(reports) {
        reportesTableBody.innerHTML = "";

        if (reports.length === 0) {
            reportesTableBody.innerHTML = `<tr><td colspan="8" class="text-center text-muted py-5">No se encontraron reportes.</td></tr>`;
            return;
        }

        reports.forEach(report => {
            const row = document.createElement("tr");

            function getBadgeClass(estado) {
                switch (estado) {
                    case 'aprobado': return 'badge-success';
                    case 'en_revision': return 'badge-warning';
                    case 'no_aprobado': return 'badge-danger';
                    case 'identidad_confirmada': return 'badge-info';
                    case 'entregado': return 'badge-primary';
                    case 'archivado': return 'badge-secondary';
                    default: return '';
                }
            }

            row.innerHTML = `
                <td>
                    <p class="text-xs font-weight-bold mb-0 ps-3">${report.documento.tipo_documento || 'N/A'}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">${report.documento.numero_documento || 'N/A'}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">${report.documento.nombre_propietario || 'N/A'}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">${report.ubicacion_perdida || 'N/A'}</p>
                </td>
                <td class="align-middle text-wrap" style="max-width: 250px;">
                    <p class="text-xs font-weight-bold mb-0">${report.detalle_reporte || 'Sin detalles'}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">${new Date(report.fecha_reporte).toLocaleDateString()}</p>
                </td>
                <td>
                    <span class="badge ${getBadgeClass(report.estado)}">${report.estado.replace(/_/g, ' ').toUpperCase()}</span>
                </td>
                <td class="align-middle">
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Ver Detalles
                    </a>
                </td>
            `;
            reportesTableBody.appendChild(row);
        });
    }

    fetchAndDisplayReports();
});
</script>
@endpush