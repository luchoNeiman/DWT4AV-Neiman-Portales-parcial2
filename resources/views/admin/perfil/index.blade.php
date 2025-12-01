@extends('admin.layout.admin')
@section('titulo', 'Mi Perfil - Admin UMAMI')
@section('titulo-seccion', 'Mi Perfil')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            
            <div class="card shadow-sm mb-4 border-umami">
                <div class="card-body p-4">
                    <div class="row text-center">
                        <div class="col-4">
                            <h3 class="h2 text-umami fw-bold">{{ $metricas['productos'] }}</h3>
                            <p class="text-muted small">Productos</p>
                        </div>
                        <div class="col-4 border-start border-end">
                            <h3 class="h2 text-umami fw-bold">{{ $metricas['categorias'] }}</h3>
                            <p class="text-muted small">Categorías</p>
                        </div>
                        <div class="col-4">
                            <h3 class="h2 text-umami fw-bold">{{ $metricas['usuarios'] }}</h3>
                            <p class="text-muted small">Usuarios</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4 border-umami">
                <div class="card-header bg-umami text-umami-cream">
                    Editar Información
                </div>
                <div class="card-body p-4">
                    {{-- Unificamos todo en una sola ruta de actualización --}}
                    <form action="{{ route('admin.perfil.update') }}" method="POST">
                        @csrf
                        
                        <h5 class="text-umami mb-3 pb-2 border-bottom">Datos Personales</h5>
                        
                        <div class="row mb-3 text-umami">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-bold">Nombre completo</label>
                                <input type="text" id="name" name="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name', $usuario->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold">Email</label>
                                {{-- INPUT DESHABILITADO (No se envía en el request) --}}
                                <input type="email" id="email" class="form-control bg-light" 
                                       value="{{ $usuario->email }}" disabled readonly>
                                <div class="form-text">El correo electrónico no se puede modificar.</div>
                            </div>
                        </div>

                        <div class="mb-4 text-umami">
                            <label for="ubicacion" class="form-label fw-bold">Ubicación</label>
                            <input type="text" id="ubicacion" name="ubicacion" 
                                   class="form-control @error('ubicacion') is-invalid @enderror" 
                                   value="{{ old('ubicacion', $usuario->ubicacion) }}"
                                   placeholder="Ej: Buenos Aires, Argentina">
                            @error('ubicacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <h5 class="text-umami mb-3 pb-2 border-bottom pt-3">Cambiar Contraseña</h5>
                        
                        <div class="mb-3 text-umami">
                            <label for="current_password" class="form-label">Contraseña Actual</label>
                            <input type="password" id="current_password" name="current_password" 
                                   class="form-control @error('current_password') is-invalid @enderror"
                                   placeholder="Ingresá tu contraseña actual para confirmar cambios">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row text-umami">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Nueva Contraseña</label>
                                <input type="password" id="password" name="password" 
                                       class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primario px-4">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection