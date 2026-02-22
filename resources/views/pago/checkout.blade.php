@extends('layout.app')

@section('title', 'Finalizar Compra - Umami')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Resumen de tu Pedido</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedido->items as $item)
                            <tr>
                                <td>{{ $item->nombre_producto }}</td>
                                <td>{{ $item->cantidad }}</td>
                                <td>${{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
                                <td>${{ number_format($item->precio_unitario * $item->cantidad, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-primary">
                <div class="card-body text-center">
                    <h2 class="h4 mb-3">Total a Pagar</h2>
                    <p class="display-6 fw-bold text-primary mb-4">
                        ${{ number_format($pedido->total, 2, ',', '.') }}
                    </p>

                    {{-- Contenedor donde Mercado Pago renderizará el botón --}}
                    <div id="wallet_container"></div>

                    <a href="{{ route('carrito.index') }}" class="btn btn-link mt-3 text-muted">
                        Volver al carrito
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SDK de Mercado Pago v2 --}}
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    // Inicializo Mercado Pago con mi Public Key del .env
    const mp = new MercadoPago("{{ config('services.mercadopago.key') }}");
    const bricksBuilder = mp.bricks();

    // Renderizo el Wallet Brick (el botón azul oficial)
    bricksBuilder.create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "{{ $pedido->preference_id }}",
            redirectMode: "self" // Abre el checkout en la misma pestaña
        },
        customization: {
            texts: {
                valueProp: 'smart_option', // Texto personalizado para mostrar el monto a pagar en el botón
                action: 'pay', // Texto personalizado para el call to action del botón
            },
        },
    });
</script>
@endsection