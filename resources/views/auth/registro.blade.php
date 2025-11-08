@extends('layout.app')

@section('titulo', 'Crear Cuenta - UMAMI')

@section('content')
<section class="bg-umami d-flex align-items-center justify-content-center min-vh-100 mt-5">
    <form action="{{ route('auth.doRegistro') }}" method="POST"
        class="bg-cream registro-container pt-5 pb-5 px-5 rounded-5 shadow-lg text-center">
        @csrf

        <img src="{{ asset('img/UI/logo-umami-green.svg') }}" alt="Logo UMAMI" class="mb-4 w-50 mx-auto">
        <h1 class="h3 mb-4 text-umami">Crear cuenta</h1>

        {{-- Errores generales de validación --}}
        @if ($errors->any())
        <div class="alert alert-danger text-start">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mb-3 text-start">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="name"
                class="form-control borde-verde {{ $errors->has('name') ? 'is-invalid' : '' }}"
                placeholder="Tu nombre" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 text-start">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" id="apellido" name="apellido"
                class="form-control borde-verde {{ $errors->has('apellido') ? 'is-invalid' : '' }}"
                placeholder="Tu apellido" value="{{ old('apellido') }}">
            @error('apellido')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 text-start">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" id="email" name="email"
                class="form-control borde-verde {{ $errors->has('email') ? 'is-invalid' : '' }}"
                placeholder="tuemail@ejemplo.com" value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 text-start">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password"
                class="form-control borde-verde {{ $errors->has('password') ? 'is-invalid' : '' }}"
                placeholder="••••••••" required>
            <div class="form-text">Debe tener al menos 8 caracteres.</div>
            @error('password')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 text-start">
            <label for="confirm-password" class="form-label">Confirmar contraseña</label>
            <input type="password" id="confirm-password" name="password_confirmation"
                class="form-control borde-verde {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                placeholder="••••••••" required>
            @error('password_confirmation')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-primario w-100 mb-3">Registrarse</button>
        <p class="mt-3 text-umami">¿Ya tenés cuenta?
            <a href="{{ route('auth.showLogin') }}" class="text-umami fw-bold">Iniciá sesión</a>
        </p>
    </form>
</section>
@endsection