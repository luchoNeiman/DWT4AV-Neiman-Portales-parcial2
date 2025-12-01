<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Usuario;

class AdminPerfilController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

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

        $rules = [
            'name' => 'required|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
        ];

        // Validación de contraseña (si intenta cambiarla)
        if ($request->filled('password') || $request->filled('current_password')) {
            $rules['current_password'] = 'required|current_password'; // Verifica la pass actual
            $rules['password'] = 'required|string|min:8|confirmed';   // Verifica la nueva
        }

        $validated = $request->validate($rules, [
            'current_password.current_password' => 'La contraseña actual es incorrecta.',
            'password.confirmed' => 'La confirmación de la nueva contraseña no coincide.',
        ]);

        // Actualizar datos básicos
        $user->name = $validated['name'];
        $user->ubicacion = $validated['ubicacion'] ?? null;

        // Actualizar contraseña si corresponde
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.perfil.index')
            ->with('feedback.message', 'Perfil actualizado correctamente.');
    }
}
