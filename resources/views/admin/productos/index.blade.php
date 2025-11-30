@extends('admin.layout.admin')
@section('titulo', 'Gestión de Productos - Admin UMAMI')
@section('titulo-seccion', 'Gestión de Productos')

@section('content')
<section class="container-fluid productosAdmin-main">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 text-umami mb-0">Listado de Productos</h2>
        <a href="{{ route('admin.productos.create') }}" class="btn-primario shadow-sm">
            <i class="bi bi-plus-circle me-2"></i> <span class="d-none d-sm-inline">Crear Producto</span>
        </a>
    </div>

    <div class="card shadow-sm p-3 bg-umami d-none d-lg-block">
        <div class="card-body p-0">
            <div class="table-responsive rounded">
                <table class="table table-admin table-hover table-striped align-middle m-0">
                    <thead class="bg-umami text-umami-cream">
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Etiqueta</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->producto_id }}</td>
                            <td class="img-adminProducto" style="width: 80px;">
                                @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-thumbnail-admin rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                <img src="{{ asset('storage/UI/logo-umami-green.svg') }}" alt="Sin imagen" class="img-thumbnail-admin p-2 rounded" style="width: 60px; height: 60px; object-fit: contain;">
                                @endif
                            </td>
                            <td class="fw-bold text-umami">{{ $producto->nombre }}</td>
                            <td>{{ $producto->categoria->nombre}}</td>
                            <td>
                                @if($producto->etiqueta)
                                <span class="badge bg-umami-green text-umami border border-umami">{{ ucfirst($producto->etiqueta) }}</span>
                                @else
                                <span class="text-muted small">N/A</span>
                                @endif
                            </td>
                            <td class="fw-bold">${{ number_format($producto->precio, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $producto->stock > 10 ? 'bg-umami' : ($producto->stock > 0 ? 'bg-warning text-dark' : 'bg-danger') }}">
                                    {{ $producto->stock }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.productos.show', $producto) }}" class="btn btn-sm btn-outline-umami badge-acciones-admin rounded" title="Ver">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.productos.edit', $producto) }}" class="btn btn-sm badge-acciones-admin rounded" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger rounded" title="Eliminar" data-bs-toggle="modal" data-bs-target="#modalEliminar-{{ $producto->producto_id }}">
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
            @foreach($productos as $producto)
            <div class="col-12 col-md-6">
                <div class="card h-100 shadow-sm card-producto-admin border-umami bg-white">
                    <div class="card-header bg-umami text-umami-cream d-flex justify-content-between align-items-center py-2">
                        <span class="badge bg-cream text-umami border border-umami">#{{ $producto->producto_id }}</span>
                        <div class="dropdown">
                            <button class="btn btn-sm text-umami-cream p-0" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical fs-5"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li><a class="dropdown-item" href="{{ route('admin.productos.show', $producto) }}"><i class="bi bi-eye me-2"></i> Ver detalle</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.productos.edit', $producto) }}"><i class="bi bi-pencil me-2"></i> Editar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar-{{ $producto->producto_id }}">
                                        <i class="bi bi-trash me-2"></i> Eliminar
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-start mb-3">
                            <div class="me-3 flex-shrink-0">
                                @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="rounded border border-umami" style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center border border-umami" style="width: 80px; height: 80px;">
                                    <i class="bi bi-image text-muted fs-2"></i>
                                </div>
                                @endif
                            </div>
                            <div>
                                <h5 class="card-title text-umami fw-bold mb-1">{{ $producto->nombre }}</h5>
                                <p class="card-subtitle text-muted small mb-2">{{ $producto->categoria->nombre }}</p>
                                <h6 class="text-umami fw-bold mb-0">${{ number_format($producto->precio, 0, ',', '.') }}</h6>
                            </div>
                        </div>

                        <div class="mt-auto d-flex justify-content-between align-items-center pt-2 border-top border-umami-light">
                            <div>
                                @if($producto->etiqueta)
                                <span class="badge bg-light text-dark border">{{ ucfirst($producto->etiqueta) }}</span>
                                @endif
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block">Stock</small>
                                <span class="badge {{ $producto->stock > 10 ? 'bg-success' : 'bg-danger' }} rounded-pill">
                                    {{ $producto->stock }} u.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @if($productos->hasPages())
    <div class="card-footer bg-cream text-umami-cream p-3">
        {{ $productos->links() }}
    </div>
    @endif
</section>

@foreach($productos as $producto)
<div class="modal fade" id="modalEliminar-{{ $producto->producto_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-cream">
            <div class="modal-header">
                <h5 class="modal-title text-umami">Eliminar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar el producto <strong>"{{ $producto->nombre }}"</strong>? Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secundario" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST">
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