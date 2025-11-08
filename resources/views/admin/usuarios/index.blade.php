@extends('admin.layout.admin')
@section('titulo', 'Gestión de Usuarios - Admin UMAMI')
@section('titulo-seccion', 'Gestión de Usuarios')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-admin table-hover align-middle m-0">
                    <thead class="bg-umami text-umami-cream">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                @if($usuario->rol === 'admin')
                                <span class="badge bg-umami">{{ $usuario->rol }}</span>
                                @else
                                <span class="badge bg-cream">{{ $usuario->rol }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.usuarios.edit', $usuario) }}" class="btn-icono-admin btn-editar" title="Editar Rol">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($usuarios->hasPages())
            <div class="card-footer bg-cream p-3">
                {{ $usuarios->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection