@extends('layout.app')

@section('titulo', 'Mi Perfil - UMAMI')

@section('content')
<div class="container py-5 mt-4">
    <div class="row justify-content-center">

        <div class="col-lg-8">
            <div class="card shadow-sm mb-4 border-umami">
                <div class="card-header bg-umami text-umami-cream">
                    <h5 class="mb-0 card-title">Editar mis datos</h5>
                </div>
                <div class="card-body p-4">

                    <form action="{{ route('perfil.update') }}" method="POST">
                        @csrf

                        <h5 class="text-umami mb-3 pb-2 border-bottom">Información Personal</h5>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-bold text-umami">Nombre completo</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $usuario->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold text-umami">Email</label>
                                {{-- INPUT DESHABILITADO --}}
                                <input type="email" id="email" class="form-control bg-light"
                                    value="{{ $usuario->email }}" disabled readonly>
                                <div class="form-text">El email no se puede modificar.</div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="ubicacion" class="form-label fw-bold text-umami">Ubicación de envío</label>
                            <input type="text" id="ubicacion" name="ubicacion"
                                class="form-control @error('ubicacion') is-invalid @enderror"
                                value="{{ old('ubicacion', $usuario->ubicacion) }}"
                                placeholder="Ej: Calle Falsa 123, CABA">
                            @error('ubicacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <h5 class="text-umami mb-3 pb-2 border-bottom pt-3">Seguridad</h5>

                        <div class="mb-3">
                            <label for="current_password" class="form-label text-umami">Contraseña Actual</label>
                            <input type="password" id="current_password" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                placeholder="Ingresá tu clave actual para cambiarla">
                            @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label text-umami">Nueva Contraseña</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label text-umami">Confirmar Nueva</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primario px-4">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 bg-umami text-umami-cream">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="bg-cream text-umami rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; font-size: 2.5rem;">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <h4 class="fw-bold">{{ $usuario->name }}</h4>
                        <p class="small opacity-75">{{ $usuario->email }}</p>
                    </div>

                    <hr class="border-cream opacity-50">

                    <ul class="list-unstyled mb-0">
                        <li class="mb-2 d-flex justify-content-between">
                            <span>Miembro desde:</span>
                            <strong>{{ $usuario->created_at->format('d/m/Y') }}</strong>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Última compra:</span>
                            {{-- Si tuvieras la relación pedidos, podrías mostrar la fecha --}}
                            <strong>{{ $usuario->pedidos()->latest()->first()?->fecha ? \Carbon\Carbon::parse($usuario->pedidos()->latest()->first()->fecha)->format('d/m/Y') : 'Nunca' }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection