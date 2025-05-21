<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

// Página principal
Route::get('/', function () {
    return view('inicio');
});

// Página de inicio alternativa
Route::get('/inicio', [AuthController::class, 'showInicioPage'])->name('inicio');

// Rutas públicas
Route::view('/pqr', 'pqr')->name('pqr');
Route::view('/contacto', 'contacto')->name('contacto');
Route::view('/terminos-condiciones', 'terminos-condiciones')->name('terms.conditions');
Route::view('/privacy-policy', 'privacy')->name('privacy'); // Renombrado aquí
Route::view('/login', 'login')->name('login');

// Ruta infoDocfi para quienes somos y cómo funciona
Route::get('/infoDocfi', function () {
    return view('infoDocfi');
})->name('infoDocfi');

// Redirección de /register a /login
Route::get('/register', function () {
    return redirect('/login');
})->name('register');

// Autenticación
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

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
