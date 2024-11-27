<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\PrivacyPolicyController; // Importa el controlador de la política de privacidad
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminosyCondicionesController; 


$jwt = request()->cookie('jwt_token');

// Ruta para la pagina principal
Route::get('/', function () {
    return view('inicio');  // Cargar la vista 'inicio.blade.php'
});

// Ruta para la página principal en caso de requerir /inicio
Route::get('/inicio', [AuthController::class, 'showInicioPage'])->name('inicio');


// Ruta para los términos y condiciones
Route::get('/terminos-y-condiciones', [TerminosyCondicionesController::class, 'show'])->name('terms.conditions');

// Ruta para la Política de Privacidad
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('privacy.policy');

// Rutas para los reportes
Route::post('/reportes/guardar', [ReporteController::class, 'guardar'])->name('guardar-reporte')->middleware('FetchUserData');  // Guardar el reporte
Route::get('/reportes/eliminar', [ReporteController::class, 'eliminar'])->name('eliminar-reporte');  // Eliminar reporte
Route::get('/reportes/buscar', [ReporteController::class, 'buscar'])->name('buscar-reportes');  // Buscar reportes

Route::get('/login', [AuthController::class, 'showWelcomePage'])->name('login');

# Aquí se deben poner todas las rutas que requieran iniciar sesión para verse
Route::middleware('JWTAuth')->group(function () {
    Route::get('/reportes/mis', [ReporteController::class, 'misReportes'])->name('mis-reportes'); // Mostrar mis reportes
    Route::get('/reportes/crear', [ReporteController::class, 'crear'])->name('crear-reporte')->middleware('FetchUserData');
});

Route::middleware('CheckAuthenticated')->group(function () {
  // Ruta para la vista de bienvenida (contendrá ambos formularios)
  Route::get('/welcome', [AuthController::class, 'showWelcomePage'])->name('welcome');
});


// Rutas para login y registro (procesar los formularios)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');  // Procesa el login
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');  // Procesa el registro

//Ruta informacion docfi - quienes somos - como funciona
Route::get('/infoDocfi', function () {
    return view('infoDocfi'); // Nombre del archivo Blade
})->name('infoDocfi');