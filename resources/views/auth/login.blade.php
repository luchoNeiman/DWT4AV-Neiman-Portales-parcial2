@extends('layout.app')

@section('titulo', 'Iniciar Sesión - UMAMI')

@section('content')
<section class="bg-umami d-flex align-items-center justify-content-center vh-100">
    <form action="{{ route('auth.doLogin') }}" method="POST" class="login-container bg-cream p-5 rounded-5 shadow-lg text-center">
        @csrf

        <img src="{{ asset('img/UI/logo-umami-green.svg') }}" alt="Logo UMAMI" class="mb-4 w-50 mx-auto">
        <h1 class="h3 mb-4">Iniciar sesión</h1>

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
            <label for="email" class="form-label">Correo electrónico</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control borde-verde {{ $errors->has('email') ? 'is-invalid' : '' }}"
                placeholder="tuemail@ejemplo.com"
                value="{{ old('email') }}"
                required
            >
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 text-start">
            <label for="password" class="form-label">Contraseña</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control borde-verde {{ $errors->has('password') ? 'is-invalid' : '' }}"
                placeholder="••••••••"
                required
            >
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-primario w-100 mb-3">Ingresar</button>

        <p class="mt-3">¿No tenés cuenta?
            <a href="{{ route('auth.showRegistro') }}" class="text-umami fw-bold">Registrate acá</a>
        </p>
        <p><a href="#" class="small">¿Olvidaste tu contraseña?</a></p>
    </form>
</section>
@endsection