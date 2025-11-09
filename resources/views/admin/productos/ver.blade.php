@extends('admin.layout.admin')
@section('titulo', 'Ver Producto - Admin UMAMI')
@section('titulo-seccion', 'Detalle del Producto')

@section('content')
<div class="container-fluid">
    <a href="{{ route('admin.productos.index') }}" class="btn-secundario mb-3">
        <i class="bi bi-arrow-left me-2"></i> Volver al listado
    </a>
    <div class="card shadow-sm">
        <div class="row g-0">
            <div class="col-md-5">
                @if($producto->imagen)
                <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid rounded-start w-100" style="object-fit: cover; height: 100%;">
                @else
                <img src="{{ asset('storage/UI/logo-umami-green.svg') }}" alt="Sin imagen" class="img-fluid rounded-start w-100 p-5">
                @endif
            </div>
            <div class="col-md-7">
                <div class="card-body p-4">
                    <span class="badge bg-umami mb-2">{{ $producto->categoria->nombre }}</span>
                    @if($producto->etiqueta)
                    <span class="badge bg-cream mb-2">{{ $producto->etiqueta }}</span>
                    @endif
                    <h2 class="card-title text-umami mb-3">{{ $producto->nombre }}</h2>
                    <div class="mb-3">
                        <h5 class="fw-bold text-umami">Descripción Corta</h5>
                        <p>{{ $producto->descripcion_corta }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-bold text-umami">Descripción Larga</h5>
                        <p>{{ $producto->descripcion }}</p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="fw-bold text-umami">Precio</h5>
                            <p class="h4 text-umami-dark fw-bold">${{ number_format($producto->precio / 100, 2, ',', '.') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-bold text-umami">Stock</h5>
                            <p class="h4 text-umami-dark fw-bold">{{ $producto->stock }} unidades</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('admin.productos.edit', $producto) }}" class="btn-primario">
                            <i class="bi bi-pencil me-2"></i> Editar
                        </a>
                        <button class="btn-primario" data-bs-toggle="modal" data-bs-target="#modalEliminar-{{ $producto->producto_id }}">
                            <i class="bi bi-trash me-2"></i> Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
@endsection