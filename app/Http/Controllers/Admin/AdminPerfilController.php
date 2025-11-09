<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Usuario;

class AdminPerfilController extends Controller
{
    public function index()
    {
        $usuario = Auth::user(); // Obtenemos el admin logueado

        // Métricas del sistema (podemos refinar a métricas por usuario si se agregan campos de auditoría)
        $metricas = [
            'productos' => Producto::count(),
            'categorias' => Categoria::count(),
            'usuarios' => Usuario::count(),
            'pedidos' => 0,
        ];

        return view('admin.perfil.index', [
            'usuario' => $usuario,
            'metricas' => $metricas,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $user->id,
            'ubicacion' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->ubicacion = $validated['ubicacion'] ?? null;

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return back()->with('feedback.message', 'Perfil actualizado correctamente.');
    }
}
