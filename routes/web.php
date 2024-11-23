<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReporteController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

$jwt = request()->cookie('jwt_token');

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

Route::get('/loginview', [AuthController::class, 'loginview'])->name('loginview');
Route::post('/login', [AuthController::class, 'login'])->name('login');

# Aquí se deben poner todas las rutas que requieran iniciar sesión para verse
Route::middleware('JWTAuth')->group(function () {
    Route::get('/logintest', [AuthController::class, 'protview'])->name('logintest');
});