@extends('admin.layout.admin')

@section('titulo', 'Gestión de Categorías - Admin UMAMI')
@section('titulo-seccion', 'Gestión de Categorías')

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 text-umami">Listado de Categorías</h2>
        <button class="btn-primario" data-bs-toggle="modal" data-bs-target="#modalCrear">
            <i class="bi bi-plus-circle me-2"></i> Crear Categoría
        </button>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-admin table-hover align-middle m-0">
                    <thead class="bg-umami text-umami-cream">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->categoria_id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>
                                <button class="btn-icono-admin btn-editar" title="Editar" data-bs-toggle="modal"
                                    data-bs-target="#modalEditar-{{ $categoria->categoria_id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-icono-admin btn-eliminar" title="Eliminar" data-bs-toggle="modal"
                                    data-bs-target="#modalEliminar-{{ $categoria->categoria_id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCrear" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-cream">
            <div class="modal-header">
                <h5 class="modal-title text-umami">Crear Nueva Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categorias.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción (Opcional)</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-secundario me-2" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn-primario">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($categorias as $categoria)
<div class="modal fade" id="modalEditar-{{ $categoria->categoria_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-cream">
            <div class="modal-header">
                <h5 class="modal-title text-umami">Editar Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categorias.update', $categoria) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre-{{ $categoria->categoria_id }}" class="form-label">Nombre</label>
                        <input type="text" id="nombre-{{ $categoria->categoria_id }}" name="nombre" class="form-control" value="{{ $categoria->nombre }}">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion-{{ $categoria->categoria_id }}" class="form-label">Descripción (Opcional)</label>
                        <textarea id="descripcion-{{ $categoria->categoria_id }}" name="descripcion" class="form-control" rows="3">{{ $categoria->descripcion }}</textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-secundario me-2" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn-primario">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($categorias as $categoria)
<div class="modal fade" id="modalEliminar-{{ $categoria->categoria_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-cream">
            <div class="modal-header">
                <h5 class="modal-title text-umami">Eliminar Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar la categoría <strong>"{{ $categoria->nombre }}"</strong>? Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secundario" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-primario">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection