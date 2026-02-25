<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use App\Models\Usuario;

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
        /** @var \App\Models\Usuario $usuario */
        $usuario = Auth::user();

        // Reglas de validación adaptadas a tu tabla 'usuarios'
        $reglas = [
            'nombre'    => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:usuarios,email,' . $usuario->usuario_id . ',usuario_id',
            'ubicacion' => 'nullable|string|max:255',
        ];

        // Validación de cambio de contraseña
        if ($request->filled('password') || $request->filled('current_password')) {
            $reglas['current_password'] = 'required|current_password';
            $reglas['password'] = 'required|string|min:8|confirmed';
        }

        // Ejecutar validación
        $datosValidados = $request->validate($reglas, [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'Este correo ya está registrado por otro usuario.',
            'current_password.required' => 'Para cambiar la contraseña, debés ingresar tu clave actual.',
            'current_password.current_password' => 'La contraseña actual es incorrecta.',
            'password.confirmed' => 'Las nuevas contraseñas no coinciden.',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
        ]);

        // Actualizar datos en el modelo
        $usuario->nombre = $datosValidados['nombre'];
        $usuario->email = $datosValidados['email'];
        $usuario->ubicacion = $datosValidados['ubicacion'] ?? null;

        // Actualizar contraseña si se envió una nueva
        if ($request->filled('password')) {
            $usuario->password = Hash::make($datosValidados['password']);
        }

        $usuario->save();

        return back()->with('feedback.message', '¡Tu perfil ha sido actualizado correctamente!');
    }
}