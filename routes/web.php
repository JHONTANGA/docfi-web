<?php
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Ruta para la página principal que llevará a welcome
Route::get('/', [AuthController::class, 'showWelcomePage'])->name('welcome');

// Rutas existentes (no modificadas)
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
Route::post('/reportes/guardar', [ReporteController::class, 'guardar'])->name('guardar-reporte');  // Guardar el reporte
Route::get('/reportes/mis', [ReporteController::class, 'misReportes'])->name('mis-reportes');  // Mostrar mis reportes
Route::get('/reportes/eliminar', [ReporteController::class, 'eliminar'])->name('eliminar-reporte');  // Eliminar reporte
Route::get('/reportes/buscar', [ReporteController::class, 'buscar'])->name('buscar-reportes');  // Buscar reportes

// Ruta para la vista de bienvenida (contendrá ambos formularios)
Route::get('/welcome', [AuthController::class, 'showWelcomePage'])->name('welcome');

// Rutas para login y registro (procesar los formularios)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');  // Procesa el login
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');  // Procesa el registro
