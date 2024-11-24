<?php

use App\Http\Controllers\ReporteController;
use App\Http\Controllers\PrivacyPolicyController; // Importa el controlador de la política de privacidad
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminosyCondicionesController; 

// Rutas para las vistas
Route::get('/inicio', function () {
    return view('inicio');  // Cargar la vista 'inicio.blade.php'
});

// Ruta para los términos y condiciones
Route::get('/terminos-y-condiciones', [TerminosyCondicionesController::class, 'show'])->name('terms.conditions');

// Ruta para la Política de Privacidad
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('privacy.policy');

// Rutas para los reportes
Route::get('/reportes/crear', [ReporteController::class, 'crear'])->name('crear-reporte');
Route::post('/reportes/guardar', [ReporteController::class, 'guardar'])->name('guardar-reporte');
Route::get('/reportes/mis', [ReporteController::class, 'misReportes'])->name('mis-reportes');
Route::get('/reportes/eliminar', [ReporteController::class, 'eliminar'])->name('eliminar-reporte');
Route::get('/reportes/buscar', [ReporteController::class, 'buscar'])->name('buscar-reportes');
