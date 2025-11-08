<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPerfilController extends Controller
{
    public function index()
    {
        $usuario = Auth::user(); // Obtenemos el admin logueado
        return view('admin.perfil.index', ['usuario' => $usuario]);
    }

    public function update(Request $request)
    {
        // Lógica para actualizar el perfil
    }
}
