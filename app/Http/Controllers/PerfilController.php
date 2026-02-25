<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class PerfilController extends Controller
{
    public function index()
    {
        // Cargo el usuario con sus pedidos para el historial
        $usuario = Auth::user();
        $pedidos = \App\Models\Pedido::where('id', $usuario->usuario_id)
            ->orderBy('fecha', 'desc')
            ->get();

        return view('perfil.index', compact('usuario', 'pedidos'));
    }

    public function update(Request $request)
{
    // Auth::id() devuelve el valor de la columna 'id'
    $idLogueado = Auth::id();

    // Validación básica 
    $request->validate([
        'nombre'    => 'required|string|max:255',
        'email'     => 'required|email|max:255|unique:usuarios,email,' . $idLogueado,
        'ubicacion' => 'nullable|string|max:255',
    ]);

    // Busco al usuario por su ID real
    $usuario = \App\Models\Usuario::findOrFail($idLogueado);

    // Asigno los campos exactos de la tabla
    $usuario->nombre    = $request->nombre;
    $usuario->email     = $request->email;
    $usuario->ubicacion = $request->ubicacion;

    // Contraseña (solo si se llena)
    if ($request->filled('password')) {
        $request->validate(['password' => 'confirmed|min:8']);
        $usuario->password = Hash::make($request->password);
    }

    // El guardado de los cambios
    $usuario->save();

    return redirect()->route('perfil.index')->with('feedback.message', '¡Datos actualizados con éxito!');
}
}
