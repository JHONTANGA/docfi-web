<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Muestra la vista del perfil del usuario logueado.
     * La carga y actualización de datos se realiza vía JavaScript en el frontend.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('perfil'); // Carga la vista perfil.blade.php
    }
}