@extends('layout.app')

@section('title', 'Finalizar Compra - Umami')

@section('content')
<!-- Banner -->
<section class="banner-catalogo text-light">
    <div class="container-titulo-menu text-center">
        <h1 class="display-4 fw-bold text-umami-cream">Finalizar Compra</h1>
        <p class="lead text-umami-cream">Revisa tu pedido y completa el pago</p>
    </div>
</section>

<!-- Checkout -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Resumen del Pedido -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-umami text-umami-cream">
                        <h4 class="mb-0"><i class="bi bi-receipt me-2"></i>Resumen de tu Pedido</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr class="text-umami">
                                        <th>Producto</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-end">Precio</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedido->items as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if ($item->producto && $item->producto->imagen)
                                                <img src="{{ asset('storage/' . $item->producto->imagen) }}"
                                                    alt="{{ $item->nombre_producto }}"
                                                    class="rounded me-3"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                @endif
                                                <div>
                                                    <h6 class="mb-0 text-umami">{{ $item->nombre_producto }}</h6>
                                                    @if ($item->producto && $item->producto->categoria)
                                                    <small class="text-muted">{{ $item->producto->categoria->nombre }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="badge bg-umami text-umami-cream fs-6">{{ $item->cantidad }}</span>
                                        </td>
                                        <td class="text-end align-middle text-umami fw-semibold">
                                            ${{ number_format($item->precio_unitario, 2, ',', '.') }}
                                        </td>
                                        <td class="text-end align-middle text-umami fw-bold">
                                            ${{ number_format($item->precio_unitario * $item->cantidad, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="border-top">
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold text-umami">Total:</td>
                                        <td class="text-end fw-bold text-umami fs-5">
                                            ${{ number_format($pedido->total, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Información adicional -->
                <div class="card shadow-sm border-0 mt-4">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <i class="bi bi-truck text-umami fs-1 mb-2"></i>
                                <h6 class="text-umami">Envío Gratis</h6>
                                <small class="text-muted">En pedidos superiores a $50.000</small>
                            </div>
                            <div class="col-md-4">
                                <i class="bi bi-shield-check text-umami fs-1 mb-2"></i>
                                <h6 class="text-umami">Pago Seguro</h6>
                                <small class="text-muted">Protegido por Mercado Pago</small>
                            </div>
                            <div class="col-md-4">
                                <i class="bi bi-clock text-umami fs-1 mb-2"></i>
                                <h6 class="text-umami">Entrega Rápida</h6>
                                <small class="text-muted">30-45 minutos</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel de Pago -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 sticky-top" style="top: 2rem;">
                    <div class="card-header bg-umami text-umami-cream text-center">
                        <h5 class="mb-0"><i class="bi bi-credit-card me-2"></i>Pago Seguro</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <h2 class="text-umami fw-bold mb-3">Total a Pagar</h2>
                            <div class="display-4 fw-bold text-umami mb-4 border border-umami rounded p-3 bg-cream">
                                ${{ number_format($pedido->total, 2, ',', '.') }}
                            </div>
                        </div>

                        {{-- Contenedor donde Mercado Pago renderizará el botón --}}
                        <div id="wallet_container" class="mb-3"></div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('carrito.index') }}" class="btn btn-secundario">
                                <i class="bi bi-arrow-left me-2"></i>Volver al Carrito
                            </a>
                        </div>

                        <div class="mt-4 pt-3 border-top">
                            <small class="text-muted">
                                <i class="bi bi-info-circle me-1"></i>
                                Al completar el pago, recibirás un correo de confirmación con los detalles de tu pedido.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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