<?php
use App\Http\Controllers\ReporteController;

Route::get('/inicio', function () {
    return view('inicio');  // Cargar la vista 'inicio.blade.php'
});

Route::get('/reportes', function () {
    return view('reportes');  // Cargar la vista 'reportes.blade.php'
});

Route::get('/contacto', function () {
    return view('contacto');  // Cargar la vista 'contacto.blade.php'
});

// Rutas para los reportes
Route::get('/reportes/crear', [ReporteController::class, 'crear'])->name('crear-reporte');
Route::get('/reportes/mis', [ReporteController::class, 'misReportes'])->name('mis-reportes');
Route::get('/reportes/eliminar', [ReporteController::class, 'eliminar'])->name('eliminar-reporte');
Route::get('/reportes/buscar', [ReporteController::class, 'buscar'])->name('buscar-reportes');
