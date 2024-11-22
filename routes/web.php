<?php
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\PrivacyPolicyController; // Importa el controlador de la política de privacidad
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminosyCondicionesController; 
use App\Http\Controllers\AuthController;

// Ruta para la página principal que llevará a welcome
Route::get('/', [AuthController::class, 'showWelcomePage'])->name('welcome');

// Rutas existentes (no modificadas)
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

// Ruta para la vista de bienvenida (contendrá ambos formularios)
Route::get('/welcome', [AuthController::class, 'showWelcomePage'])->name('welcome');

// Rutas para login y registro (procesar los formularios)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');  // Procesa el login
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');  // Procesa el registro
