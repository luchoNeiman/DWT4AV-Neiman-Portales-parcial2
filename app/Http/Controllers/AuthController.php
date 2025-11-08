<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    // LOGIN

    public function showLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirigir al dashboard si es admin, sino al index.
            if (Auth::user()->rol === 'admin') {
                return redirect()->intended(route('admin.dashboard'))
                    ->with('feedback.message', '¡Sesión iniciada como Admin! Bienvenido, ' . Auth::user()->name . '.');
            }

            return redirect()->route('index') // O a 'perfil.index' cuando exista
                ->with('feedback.message', '¡Sesión iniciada con éxito! Bienvenido de nuevo, ' . Auth::user()->name . '.');
        }

        return back()
            ->withErrors([
                'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ])
            ->onlyInput('email');
    }

    // REGISTRO

    public function showRegistro()
    {
        return view('auth.registro');
    }

    public function doRegistro(Request $request)
    {
        $messages = [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'El campo de contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];

        // Validación
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed',
        ], $messages);

        // Concatenar nombre + apellido (si viene)
        $fullName = trim($request->input('name') . ' ' . $request->input('apellido'));

        // Creación del usuario
        $user = Usuario::create([
            'name' => $fullName ?: $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'rol' => 'usuario',
        ]);

        // Autenticar al usuario recién registrado
        Auth::login($user);

        // Redirigir
        return redirect()->route('index') // O a 'perfil.index' cuando exista
            ->with('feedback.message', '¡Cuenta creada con éxito! Bienvenido a UMAMI, ' . $user->name . '.');
    }


    // --- LOGOUT ---

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')
            ->with('feedback.message', 'Has cerrado la sesión exitosamente.');
    }
}
