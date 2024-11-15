<?php

Route::get('/inicio', function () {
    return view('inicio');  // Cargar la vista 'resources/views/inicio.blade.php'
});

Route::get('/reportes', function () {
    return view('reportes');  // Cargar la vista 'resources/views/reportes.blade.php'
});

Route::get('/contacto', function () {
    return view('contacto');  // Cargar la vista 'resources/views/contacto.blade.php'
});
