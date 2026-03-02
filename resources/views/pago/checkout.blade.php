@extends('layout.app')

@section('titulo', 'Finalizar Compra - UMAMI')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-umami text-white text-center py-3">
                    <h4 class="mb-0">Resumen de tu Pedido #{{ $pedido->id }}</h4>
                </div>
                <div class="card-body p-4">
                    <ul class="list-group list-group-flush mb-4">
                        @foreach ($pedido->items as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div>
                                <h5 class="mb-0">{{ $item->nombre_producto }}</h5>
                                <small class="text-muted">Cantidad: {{ $item->cantidad }}</small>
                            </div>
                            <span class="fw-bold">${{ number_format($item->precio_unitario * $item->cantidad, 0, ',', '.') }}</span>
                        </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light mt-2 p-2">
                            <span class="h5 mb-0 text-umami">Total a pagar:</span>
                            <span class="h5 mb-0 text-umami fw-bold">${{ number_format($pedido->total, 0, ',', '.') }}</span>
                        </li>
                    </ul>

                    <div id="wallet_container" class="mt-4"></div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('carrito.index') }}" class="text-muted small">Volver al carrito</a>
            </div>
        </div>
    </div>
</div>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
        locale: 'es-AR'
    });
    const bricksBuilder = mp.bricks();

    bricksBuilder.create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "{{ $preferencia->id }}",
            redirectMode: "self" // Abre el pago en la misma pestaña
        },
        customization: {
            texts: {
                action: "pay",
                valueProp: "security_safety",
            }
        }
    });
</script>
@endsection