<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// Si usas otros controladores para tus vistas, impórtalos aquí.

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ========================================================================
// RUTAS PÚBLICAS (Accesibles sin autenticación)
// ========================================================================

// Página de inicio (generalmente es pública y sirve como punto de entrada)
Route::get('/', function () {
    return view('inicio'); // Corregido: apunta a 'inicio.blade.php'
})->name('inicio');

// Rutas de Autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Páginas de información pública
Route::get('/infoDocfi', function () {
    return view('infoDocfi');
})->name('infoDocfi'); // "Quiénes somos" y "Cómo funciona"

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/terminos-condiciones', function () {
    return view('terminos-condiciones');
})->name('terminos-condiciones');


// ========================================================================
// RUTAS PROTEGIDAS (Requieren autenticación - Manejado por JavaScript en el cliente)
// ========================================================================
// Las redirecciones si el usuario no tiene token se gestionan en app.blade.php
// mediante window.redirigirProtegido() y la lista de rutas en redireccionSiRutaProtegida().

// Grupo de Rutas Protegidas
// Aunque no usamos un middleware de Laravel 'auth:web' aquí (ya que la autenticación es JWT),
// este agrupamiento es para mantener la lógica clara y saber qué rutas DEBEN ser protegidas
// por el JavaScript del frontend.
Route::prefix('app')->group(function () {
    // PQR
    Route::get('/pqr', function () {
        return view('pqr');
    })->name('pqr'); // Para crear PQR

    Route::get('/consultarpqr', function () {
        return view('consultarpqr');
    })->name('consultarpqr'); // Para consultar PQR

    // Perfil del Usuario
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil'); // Para ver la información de perfil

    // Reportes
    Route::get('/reportes/mis', function () {
        return view('reportes'); // Para ver los reportes del usuario
    })->name('mis-reportes');

    Route::get('/reportes/crear', function () {
        return view('crear-reporte');
    })->name('crear-reporte'); // Para crear un nuevo reporte

    // Información de Contacto (si es una página dedicada al usuario logueado)
    // Asumo que esta es la "Información de contacto" a la que te refieres en "Mi Perfil"
    Route::get('/contacto', function () {
        return view('contacto'); // Por ejemplo, un formulario de contacto para usuarios logueados o su info de contacto
    })->name('contacto');
});

// Nota: Las rutas de POST (como para guardar un PQR o un reporte)
// no necesitan estar en la lista de 'rutasProtegidas' en JavaScript,
// ya que la navegación GET es la que activa la redirección.
// La protección de las API routes para POST la manejaría tu backend de Django con JWT.
// Si tienes alguna ruta para manejar el "guardar-reporte" por POST, debería ir aquí:
// Route::post('/guardar-reporte', [TuController::class, 'storeReport'])->name('guardar-reporte');