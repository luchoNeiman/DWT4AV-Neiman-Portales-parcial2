<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria; // Importamos Categoria
use Illuminate\Http\Request;

class AdminCategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', ['categorias' => $categorias]);
    }

    // La lógica de store, update y destroy la pondremos
    // directamente en esta clase más adelante.
}
