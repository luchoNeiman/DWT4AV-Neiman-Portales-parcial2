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
        $usuario = Auth::user();
        return view('perfil.index', ['usuario' => $usuario]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Reglas de validación (Nombre y Ubicación)
        // El email lo ignoramos porque no permitimos cambiarlo
        $rules = [
            'name' => 'required|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
        ];

        // 2. Si intenta cambiar la contraseña, exigimos la actual
        if ($request->filled('password') || $request->filled('current_password')) {
            $rules['current_password'] = 'required|current_password'; // Valida que coincida con la real
            $rules['password'] = 'required|string|min:8|confirmed';   // Valida la nueva
        }

        $validated = $request->validate($rules, [
            'current_password.required' => 'Para cambiar la contraseña, debés ingresar tu clave actual.',
            'current_password.current_password' => 'La contraseña actual es incorrecta.',
            'password.confirmed' => 'Las nuevas contraseñas no coinciden.',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
        ]);

        // 3. Actualizar datos básicos
        $user->name = $validated['name'];
        $user->ubicacion = $validated['ubicacion'] ?? null;

        // 4. Actualizar contraseña (solo si pasó la validación)
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back()->with('feedback.message', 'Tu perfil ha sido actualizado correctamente.');
    }
}