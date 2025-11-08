@extends('admin.layout.admin')
@section('titulo', 'Editar Usuario - Admin UMAMI')
@section('titulo-seccion', 'Editar Usuario: ' . $usuario->name)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('admin.usuarios.update', $usuario) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $usuario->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}">
                        </div>
                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <select id="rol" name="rol" class="form-select">
                                <option value="usuario" {{ old('rol', $usuario->rol) == 'usuario' ? 'selected' : '' }}>Usuario</option>
                                <option value="admin" {{ old('rol', $usuario->rol) == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <div class="text-end mt-4">
                            <a href="{{ route('admin.usuarios.index') }}" class="btn-secundario me-2">Cancelar</a>
                            <button type="submit" class="btn-primario">Actualizar Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection