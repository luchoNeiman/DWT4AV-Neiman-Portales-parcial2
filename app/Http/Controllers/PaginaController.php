<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PaginaController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function catalogo(): View
    {
        return view('catalogo');
    }

    public function producto(): View
    {
        return view('producto');
    }

    public function nosotros(): View
    {
        return view('nosotros');
    }

    public function contacto(): View
    {
        return view('contacto');
    }

    
}
