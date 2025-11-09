@extends('layout.app')
@section('titulo', 'Mi Perfil - UMAMI')

@section('content')
<div class="container py-5 mt-4">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-umami text-umami-cream">
                    Mis datos
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('perfil.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $usuario->name) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ubicacion" class="form-label">Ubicación</label>
                                <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="{{ old('ubicacion', $usuario->ubicacion) }}">
                            </div>
                            <div class="col-md-6 mb-3 d-flex align-items-end">
                                <button type="submit" class="btn-primario w-100">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-umami text-umami-cream">
                    Cambiar contraseña
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('perfil.password') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Nueva contraseña</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn-primario">Actualizar contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body p-4 text-umami">
                    <h5 class="mb-3">Resumen</h5>
                    <ul class="list-unstyled">
                        <li><strong>Nombre:</strong> {{ $usuario->name }}</li>
                        <li><strong>Email:</strong> {{ $usuario->email }}</li>
                        <li><strong>Ubicación:</strong> {{ $usuario->ubicacion ?? '—' }}</li>
                        <li><strong>Se unió:</strong> {{ $usuario->created_at?->format('d/m/Y') }}</li>
                        <li><strong>Última conexión:</strong> {{ $usuario->last_login_at?->format('d/m/Y H:i') ?? '—' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
