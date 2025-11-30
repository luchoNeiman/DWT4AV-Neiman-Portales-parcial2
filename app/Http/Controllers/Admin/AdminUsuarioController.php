<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsuarioController extends Controller
{
    public function index()
    {
        // cargamos 'pedidos' y sus 'items'
        $usuarios = Usuario::with(['pedidos.items'])
            ->paginate(10);

        return view('admin.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function edit(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('admin.usuarios.editar', ['usuario' => $usuario]);
    }

    public function update(Request $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $usuario->id,
            'rol' => 'required|in:usuario,admin',
        ]);

        $usuario->update($data);

        return redirect()
            ->route('admin.usuarios.index')
            ->with('feedback.message', 'Usuario actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        // Evitar que un admin se borre a sí mismo
        if (Auth::id() == $usuario->id) {
            return redirect()
                ->route('admin.usuarios.index')
                ->with('feedback.error', 'No puedes eliminar tu propia cuenta mientras estás logueado.');
        }

        $usuario->delete();

        return redirect()
            ->route('admin.usuarios.index')
            ->with('feedback.message', 'Usuario eliminado correctamente.');
    }
}
