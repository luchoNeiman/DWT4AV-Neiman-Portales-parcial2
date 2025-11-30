@extends('admin.layout.admin')
@section('titulo', 'Gestión de Categorías - Admin UMAMI')
@section('titulo-seccion', 'Gestión de Categorías')

@section('content')
<section class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 text-umami mb-0">Listado de Categorías</h2>
        <button class="btn-primario shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCrear">
            <i class="bi bi-plus-circle me-2"></i> <span class="d-none d-sm-inline">Crear categoría</span>
        </button>
    </div>

    <div class="card shadow-sm p-3 bg-umami d-none d-lg-block">
        <div class="card-body p-0">
            <div class="table-responsive rounded">
                <table class="table table-admin table-hover table-striped align-middle m-0">
                    <thead class="bg-umami text-umami-cream">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">#{{ $categoria->categoria_id }}</td>
                            <td class="fw-bold text-umami">{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->descripcion ?? 'Sin descripción' }}</td>
                            <td class="text-end pe-4">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-light badge-acciones-admin rounded" title="Editar" data-bs-toggle="modal" data-bs-target="#modalEditar-{{ $categoria->categoria_id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger rounded" title="Eliminar" data-bs-toggle="modal" data-bs-target="#modalEliminar-{{ $categoria->categoria_id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-lg-none">
        <div class="row g-3">
            @foreach($categorias as $categoria)
            <div class="col-12 col-md-6"> 
                <div class="card h-100 shadow-sm border-umami bg-white">
                    
                    <div class="card-header bg-umami text-umami-cream d-flex justify-content-between align-items-center py-2 px-3">
                        <span class="badge bg-cream text-umami border border-umami">#{{ $categoria->categoria_id }}</span>
                        
                        <div class="dropdown">
                            <button class="btn btn-sm text-umami-cream p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical fs-5"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-umami">
                                <li>
                                    <button class="dropdown-item text-umami" data-bs-toggle="modal" data-bs-target="#modalEditar-{{ $categoria->categoria_id }}">
                                        <i class="bi bi-pencil me-2"></i> Editar
                                    </button>
                                </li>
                                <li><hr class="dropdown-divider bg-umami opacity-25"></li>
                                <li>
                                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar-{{ $categoria->categoria_id }}">
                                        <i class="bi bi-trash me-2"></i> Eliminar
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column p-3">
                        <h5 class="card-title text-umami fw-bold mb-2">
                            <i class="bi bi-tag-fill me-2 opacity-50"></i>{{ $categoria->nombre }}
                        </h5>
                        <p class="card-text text-muted small mb-0 flex-grow-1">
                            {{ $categoria->descripcion ?? 'Sin descripción disponible.' }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Paginación (si existe) --}}
    {{-- @if($categorias instanceof \Illuminate\Pagination\LengthAwarePaginator && $categorias->hasPages())
    <div class="mt-4 d-flex justify-content-center">
        {{ $categorias->links() }}
    </div>
    @endif --}}

</section>

<div class="modal fade" id="modalCrear" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-cream border-0 shadow">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title text-umami fw-bold">Crear Nueva Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categorias.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold text-umami">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control border-umami" placeholder="Ej: Entradas">
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-semibold text-umami">Descripción (Opcional)</label>
                        <textarea id="descripcion" name="descripcion" class="form-control border-umami" rows="3" placeholder="Breve descripción de la categoría"></textarea>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-light border text-muted" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primario px-4">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($categorias as $categoria)
    <div class="modal fade" id="modalEditar-{{ $categoria->categoria_id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-cream border-0 shadow">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title text-umami fw-bold">Editar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.categorias.update', $categoria) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nombre-{{ $categoria->categoria_id }}" class="form-label fw-semibold text-umami">Nombre</label>
                            <input type="text" id="nombre-{{ $categoria->categoria_id }}" name="nombre" class="form-control border-umami" value="{{ $categoria->nombre }}">
                        </div>
                        <div class="mb-4">
                            <label for="descripcion-{{ $categoria->categoria_id }}" class="form-label fw-semibold text-umami">Descripción (Opcional)</label>
                            <textarea id="descripcion-{{ $categoria->categoria_id }}" name="descripcion" class="form-control border-umami" rows="3">{{ $categoria->descripcion }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light border text-muted" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primario px-4">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminar-{{ $categoria->categoria_id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-cream border-0 shadow">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title text-umami fw-bold">Eliminar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <div class="text-danger mb-3">
                        <i class="bi bi-exclamation-triangle-fill display-4"></i>
                    </div>
                    <p class="fs-5 mb-1">¿Eliminar la categoría <strong>"{{ $categoria->nombre }}"</strong>?</p>
                    <p class="small text-muted">Si tiene productos asociados, esto podría fallar.</p>
                </div>
                <div class="modal-footer border-top-0 justify-content-center pb-4">
                    <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-4 text-white">Sí, Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection