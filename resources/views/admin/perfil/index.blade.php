@extends('admin.layout.admin')
@section('titulo', 'Mi Perfil - Admin UMAMI')
@section('titulo-seccion', 'Mi Perfil')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-umami text-umami-cream">
                    Mi Perfil
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h5 class="text-umami mb-3">Datos personales</h5>
                            <ul class="list-unstyled text-umami">
                                <li><strong>Nombre completo:</strong> {{ $usuario->name }}</li>
                                <li><strong>Email:</strong> {{ $usuario->email }}</li>
                                <li><strong>Ubicación:</strong> {{ $usuario->ubicacion ?? '—' }}</li>
                                <li><strong>Se unió:</strong> {{ $usuario->created_at?->format('d/m/Y H:i') }}</li>
                                <li><strong>Última conexión:</strong> {{ $usuario->last_login_at?->format('d/m/Y H:i') ?? '—' }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-umami mb-3">Actividad (sistema)</h5>
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="p-3 bg-cream rounded-3 text-center">
                                        <div class="h4 m-0">{{ $metricas['productos'] }}</div>
                                        <small class="text-muted">Productos</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 bg-cream rounded-3 text-center">
                                        <div class="h4 m-0">{{ $metricas['categorias'] }}</div>
                                        <small class="text-muted">Categorías</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 bg-cream rounded-3 text-center">
                                        <div class="h4 m-0">{{ $metricas['usuarios'] }}</div>
                                        <small class="text-muted">Usuarios</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 bg-cream rounded-3 text-center">
                                        <div class="h4 m-0">{{ $metricas['pedidos'] }}</div>
                                        <small class="text-muted">Pedidos</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-umami text-umami-cream">
                    Editar Perfil
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.perfil.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $usuario->name) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="ubicacion" class="form-label">Ubicación</label>
                                <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="{{ old('ubicacion', $usuario->ubicacion) }}">
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn-primario">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-umami text-umami-cream">
                    Cambiar contraseña
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.perfil.update') }}" method="POST">
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
    </div>
</div>
@endsection
