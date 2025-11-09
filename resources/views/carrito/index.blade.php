@extends('layout.app')

@section('title', 'Mi Carrito - UMAMI')

@section('content')

<!-- Banner -->
<section class="banner-catalogo text-light">
    <div class="container-titulo-menu text-center">
        <h1 class="display-4 fw-bold text-umami-cream">Mi Carrito</h1>
    </div>
</section>

<!-- Carrito -->
<section class="py-5">
    <div class="container">
        @if ($items->isEmpty())
            <!-- Carrito Vacío -->
            <div class="text-center py-5">
                <i class="bi bi-cart-x display-1 text-muted"></i>
                <h2 class="mt-4 text-umami">Tu carrito está vacío</h2>
                <p class="text-muted">¡Explora nuestro menú y agrega tus productos favoritos!</p>
                <a href="{{ route('catalogo') }}" class="btn btn-umami mt-3">
                    <i class="bi bi-arrow-left me-2"></i>Ver Menú
                </a>
            </div>
        @else
            <!-- Tabla de productos -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-umami text-white">
                            <h4 class="mb-0">Productos en tu carrito</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light text-umami">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($item->producto->imagen)
                                                            <img src="{{ asset('storage/productos/' . $item->producto->imagen) }}" 
                                                                 alt="{{ $item->producto->nombre }}" 
                                                                 class="rounded me-3"
                                                                 style="width: 60px; height: 60px; object-fit: cover;">
                                                        @endif
                                                        <div>
                                                            <h6 class="mb-0 text-umami">{{ $item->producto->nombre }}</h6>
                                                            <small class="text-muted">{{ $item->producto->categoria->nombre }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    ${{ number_format($item->precio_unitario / 100, 2, ',', '.') }}
                                                </td>
                                                <td class="align-middle">
                                                    <form action="{{ route('carrito.actualizar', $item->carrito_item_id) }}" 
                                                          method="POST" 
                                                          class="d-inline-block">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="input-group" style="width: 120px;">
                                                            <button type="button" 
                                                                    class="btn btn-outline-secondary btn-sm btn-cantidad" 
                                                                    data-action="decrease"
                                                                    data-item-id="{{ $item->carrito_item_id }}">
                                                                <i class="bi bi-dash"></i>
                                                            </button>
                                                            <input type="number" 
                                                                   name="cantidad" 
                                                                   class="form-control form-control-sm text-center cantidad-input" 
                                                                   value="{{ $item->cantidad }}" 
                                                                   min="1" 
                                                                   max="{{ $item->producto->stock }}"
                                                                   data-item-id="{{ $item->carrito_item_id }}">
                                                            <button type="button" 
                                                                    class="btn btn-outline-secondary btn-sm btn-cantidad" 
                                                                    data-action="increase"
                                                                    data-item-id="{{ $item->carrito_item_id }}"
                                                                    data-max-stock="{{ $item->producto->stock }}">
                                                                <i class="bi bi-plus"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                    <small class="text-muted d-block mt-1">
                                                        Stock: {{ $item->producto->stock }}
                                                    </small>
                                                </td>
                                                <td class="align-middle fw-bold">
                                                    ${{ number_format($item->subtotal / 100, 2, ',', '.') }}
                                                </td>
                                                <td class="align-middle">
                                                    <form action="{{ route('carrito.eliminar', $item->carrito_item_id) }}" 
                                                          method="POST" 
                                                          class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-outline-danger btn-sm"
                                                                onclick="return confirm('¿Eliminar este producto del carrito?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('catalogo') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Seguir comprando
                    </a>
                </div>

                <!-- Resumen del pedido -->
                <div class="col-lg-4">
                    <div class="card shadow-sm sticky-top" style="top: 100px;">
                        <div class="card-header bg-umami text-white">
                            <h5 class="mb-0">Resumen del pedido</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Subtotal:</span>
                                <span class="fw-bold">${{ number_format($total / 100, 2, ',', '.') }}</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="h5 mb-0">Total:</span>
                                <span class="h5 mb-0 text-umami fw-bold">${{ number_format($total / 100, 2, ',', '.') }}</span>
                            </div>
                            
                            <form action="{{ route('carrito.finalizar') }}" method="POST">
                                @csrf
                                <button type="submit" 
                                        class="btn btn-umami w-100 mb-3"
                                        onclick="return confirm('¿Confirmar compra?')">
                                    <i class="bi bi-check-circle me-2"></i>Finalizar Compra
                                </button>
                            </form>
                            
                            <div class="alert alert-info small mb-0">
                                <i class="bi bi-info-circle me-2"></i>
                                Los productos se reservarán al finalizar la compra.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<script>
    // Script para manejar los botones +/-
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.btn-cantidad');
        
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const action = this.dataset.action;
                const itemId = this.dataset.itemId;
                const input = document.querySelector(`input[data-item-id="${itemId}"]`);
                const currentValue = parseInt(input.value);
                const maxStock = parseInt(this.dataset.maxStock) || 999;
                
                if (action === 'increase' && currentValue < maxStock) {
                    input.value = currentValue + 1;
                    submitQuantityUpdate(itemId);
                } else if (action === 'decrease' && currentValue > 1) {
                    input.value = currentValue - 1;
                    submitQuantityUpdate(itemId);
                }
            });
        });
        
        // También permitir actualización al cambiar manualmente
        const inputs = document.querySelectorAll('.cantidad-input');
        inputs.forEach(input => {
            input.addEventListener('change', function() {
                const itemId = this.dataset.itemId;
                submitQuantityUpdate(itemId);
            });
        });
        
        function submitQuantityUpdate(itemId) {
            const form = document.querySelector(`input[data-item-id="${itemId}"]`).closest('form');
            form.submit();
        }
    });
</script>

@endsection
