@extends('layout.app')

@section('title', 'Catálogo de Productos - UMAMI')

@section('content')
<!-- Banner -->
<section class="banner-catalogo text-light">
    <div class="container-titulo-menu text-center">
        <h1 class="display-4 fw-bold text-umami-cream">Menú UMAMI</h1>
    </div>
</section>

<!-- Hamburguesas -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-umami">Hamburguesas</h2>
        <div class="catalogo-grid">
            @foreach($hamburguesas as $hamburguesa)
            {{-- Mantener el look de la maqueta: marcar como destacado el primer y tercer item, o cuando tenga etiqueta --}}
            <article class="hover-card {{ ($loop->first || $loop->iteration == 3 || $hamburguesa->etiqueta) ? 'destacado' : '' }}">
                <img src="{{ asset('storage/productos/' . $hamburguesa->imagen) }}" alt="{{ $hamburguesa->nombre }}">
                <div class="hover-info">
                    <h3>{{ $hamburguesa->nombre }}</h3>
                    <p>{{ $hamburguesa->descripcion_corta }}</p>
                    @if(isset($hamburguesa->precio_anterior) && $hamburguesa->precio_anterior)
                    <div class="d-flex align-items-center gap-2">
                        <span class="price text-decoration-line-through">${{ number_format($hamburguesa->precio_anterior, 0, ',', '.') }}</span>
                        <span class="price">${{ number_format($hamburguesa->precio, 0, ',', '.') }}</span>
                    </div>
                    @else
                    <span class="price">${{ number_format($hamburguesa->precio, 0, ',', '.') }}</span>
                    @endif
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('producto', $hamburguesa->producto_id) }}" class="btn-secundario">Ver más</a>
                        @auth
                            @if($hamburguesa->stock > 0)
                            <form action="{{ route('carrito.agregar') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $hamburguesa->producto_id }}">
                                <button type="submit" class="btn-primario">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Acompañamientos y Condimentos (sección 2 según maqueta) -->
<section class="py-5 bg-umami">
    <div class="container">
        <h2 class="text-center mb-5">Acompañamientos y condimentos</h2>
        <div class="catalogo-grid">
            @foreach($acom_y_condimentos as $producto)
            <article class="hover-card {{ $producto->etiqueta === 'destacado' ? 'destacado' : '' }}">
                <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
                <div class="hover-info">
                    <h3>{{ $producto->nombre }}</h3>
                    <p>{{ $producto->descripcion_corta }}</p>
                    @if(isset($producto->precio_anterior) && $producto->precio_anterior)
                    <div class="d-flex align-items-center gap-2">
                        <span class="price text-decoration-line-through">${{ number_format($producto->precio_anterior, 0, ',', '.') }}</span>
                        <span class="price">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                    </div>
                    @else
                    <span class="price">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                    @endif
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('producto', $producto->producto_id) }}" class="btn-secundario">Ver más</a>
                        @auth
                            @if($producto->stock > 0)
                            <form action="{{ route('carrito.agregar') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $producto->producto_id }}">
                                <button type="submit" class="btn-primario">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Bebidas -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-umami">Bebidas</h2>
        <div class="catalogo-grid">
            @foreach($bebidas as $bebida)
            <article class="hover-card {{ $bebida->etiqueta === 'destacado' ? 'destacado' : '' }}">
                <img src="{{ asset('storage/productos/' . $bebida->imagen) }}"
                    alt="{{ $bebida->nombre }}">
                <div class="hover-info">
                    <h3>{{ $bebida->nombre }}</h3>
                    <p>{{ $bebida->descripcion_corta }}</p>
                    <span class="price">${{ number_format($bebida->precio, 0, ',', '.') }}</span>
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('producto', $bebida->producto_id) }}" class="btn-secundario">Ver más</a>
                        @auth
                            @if($bebida->stock > 0)
                            <form action="{{ route('carrito.agregar') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $bebida->producto_id }}">
                                <button type="submit" class="btn-primario">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Postres y opciones especiales -->
<section class="py-5 bg-umami">
    <div class="container">
        <h2 class="text-center mb-5">Postres y opciones especiales</h2>
        <div class="catalogo-grid">
            @foreach($postres as $postre)
            <article class="hover-card {{ $postre->etiqueta === 'destacado' ? 'destacado' : '' }}">
                <img src="{{ asset('storage/productos/' . $postre->imagen) }}"
                    alt="{{ $postre->nombre }}">
                <div class="hover-info">
                    <h3>{{ $postre->nombre }}</h3>
                    <p>{{ $postre->descripcion_corta }}</p>
                    <span class="price">${{ number_format($postre->precio, 0, ',', '.') }}</span>
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('producto', $postre->producto_id) }}" class="btn-secundario">Ver más</a>
                        @auth
                            @if($postre->stock > 0)
                            <form action="{{ route('carrito.agregar') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $postre->producto_id }}">
                                <button type="submit" class="btn-primario">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endsection