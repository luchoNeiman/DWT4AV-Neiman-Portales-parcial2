@extends('admin.layout.admin')
@section('titulo', 'Gestión de Productos - Admin UMAMI')
@section('titulo-seccion', 'Gestión de Productos')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 text-umami">Listado de Productos</h2>
        <a href="{{ route('admin.productos.create') }}" class="btn-primario">
            <i class="bi bi-plus-circle me-2"></i> Crear Producto
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-admin table-hover align-middle m-0">
                    <thead class="bg-umami text-umami-cream">
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->producto_id }}</td>
                            <td>
                                @if($producto->imagen)
                                <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-thumbnail-admin">
                                @else
                                <img src="{{ asset('storage/UI/logo-umami-green.svg') }}" alt="Sin imagen" class="img-thumbnail-admin p-2">
                                @endif
                            </td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->categoria->nombre }}</td>
                            <td>${{ number_format($producto->precio / 100, 2, ',', '.') }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                                <a href="{{ route('admin.productos.show', $producto) }}" class="btn-icono-admin btn-ver" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.productos.edit', $producto) }}" class="btn-icono-admin btn-editar" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn-icono-admin btn-eliminar" title="Eliminar" data-bs-toggle="modal" data-bs-target="#modalEliminar-{{ $producto->producto_id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($productos->hasPages())
            <div class="card-footer bg-cream p-3">
                {{ $productos->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

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