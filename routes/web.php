<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PqrController;

// Página principal
Route::get('/', function () {
    return view('inicio');
});

// Página de inicio alternativa
Route::get('/inicio', [AuthController::class, 'showInicioPage'])->name('inicio');

// Rutas públicas
Route::view('/reporte', 'reporte')->name('reporte');
Route::view('/contacto', 'contacto')->name('contacto');
Route::view('/terminos-condiciones', 'terminos-condiciones')->name('terms.conditions');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy.policy');

// Ruta infoDocfi
Route::get('/infoDocfi', function () {
    return view('infoDocfi');
})->name('infoDocfi');

// Redirección de /register a /login
Route::get('/register', function () {
    return redirect('/login');
})->name('register');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');


// 🔹 RUTAS PQR ACTUALIZADAS Y FUNCIONALES

// 1. Formulario para crear PQR
Route::get('/pqr', [PqrController::class, 'create'])->name('pqr');

// 2. Envío del formulario al API
Route::post('/enviar-pqr', [PqrController::class, 'enviar'])->name('enviar.pqr');

// 3. Vista para consultar el estado de un PQR con parámetro GET
Route::get('/consultarpqr', [PqrController::class, 'consultar'])->name('consultarpqr');

// Rutas con middleware
Route::middleware('JWTAuth')->group(function () {
    Route::get('/reportes/mis', [ReporteController::class, 'misReportes'])->name('mis-reportes');
    Route::get('/reportes/crear', [ReporteController::class, 'crear'])->name('crear-reporte')->middleware('FetchUserData');
    Route::post('/reportes/guardar', [ReporteController::class, 'guardar'])->name('guardar-reporte');
});

// Rutas fuera del middleware
Route::get('/reportes/eliminar', [ReporteController::class, 'eliminar'])->name('eliminar-reporte');
Route::get('/reportes/buscar', [ReporteController::class, 'buscar'])->name('buscar-reportes');

// Página de bienvenida con autenticación
Route::middleware('CheckAuthenticated')->group(function () {
    Route::get('/welcome', [AuthController::class, 'showWelcomePage'])->name('welcome');
});
