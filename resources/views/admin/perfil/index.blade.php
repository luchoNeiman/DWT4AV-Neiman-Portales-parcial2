@extends('admin.layout.admin')

@section('titulo', 'Mi Perfil - Admin UMAMI')
@section('titulo-seccion', 'Mi Perfil')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-umami text-umami-cream">
                    Información del Perfil
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.perfil.update') }}" method="POST">
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
                        <div class="text-end mt-3">
                            <button type="submit" class="btn-primario">Actualizar Perfil</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-umami text-umami-cream">
                    Cambiar Contraseña
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST"> {{-- (Ruta de cambio de pass) --}}
                        @csrf
                        <div class="mb-3">
                            <label for="password_actual" class="form-label">Contraseña actual</label>
                            <input type="password" id="password_actual" name="password_actual" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva contraseña</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn-primario">Cambiar Contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection