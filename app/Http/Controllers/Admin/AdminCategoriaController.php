<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria; 
use Illuminate\Http\Request;

class AdminCategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', ['categorias' => $categorias]);
    }

}
