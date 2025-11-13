@extends('layout.app')

@section('titulo', $producto->nombre . ' - UMAMI')

@section('content')

<!-- Detalle del producto -->
<section class="detalle-producto py-5">
    <div class="container mt-5 pt-2">
        <div class="row g-5 align-items-center">
            <!-- Imagen -->
            <figure class="col-md-5">
                @if($producto->imagen)
                    <img src="{{ asset('storage/productos/' . $producto->imagen) }}"
                        alt="{{ $producto->nombre }}" class="img-fluid rounded-4">
                @else
                    <img src="{{ asset('storage/productos/placeholder.webp') }}"
                        alt="{{ $producto->nombre }}" class="img-fluid rounded-4">
                @endif
            </figure>

            <!-- Información -->
            <div class="col-md-7">
                <h1 class="mb-3">{{ $producto->nombre }}</h1>
                <p class="text-umami">{{ $producto->descripcion }}</p>
                
                <div class="d-flex align-items-center gap-3 mb-3">
                    <p class="h4 text-umami fw-bold mb-0">${{ number_format($producto->precio / 100, 2, '.', ',') }}</p>
                    @if($producto->stock > 0)
                        <span class="badge bg-success">Disponible ({{ $producto->stock }} unidades)</span>
                    @else
                        <span class="badge bg-danger">Sin stock</span>
                    @endif
                </div>

                @auth
                    @if($producto->stock > 0)
                        <form action="{{ route('carrito.agregar') }}" method="POST" class="mb-4">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->producto_id }}">
                            <div class="d-flex align-items-center gap-3">
                                <div class="input-group" style="width: 150px;">
                                    <button type="button" class="btn btn-outline-secondary" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" name="cantidad" class="form-control text-center" value="1" min="1" max="{{ $producto->stock }}">
                                    <button type="button" class="btn btn-outline-secondary" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <button type="submit" class="btn-primario btn-lg">
                                    <i class="bi bi-cart-plus me-2"></i>Añadir al carrito
                                </button>
                            </div>
                        </form>
                    @else
                        <button class="btn-primario btn-lg mb-4" disabled>Sin stock</button>
                    @endif
                @else
                    <a href="{{ route('auth.showLogin') }}" class="btn-primario btn-lg mb-4">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Inicia sesión para comprar
                    </a>
                @endauth

                <h4 class="text-umami">Descripción</h4>
                <p class="text-umami">{{ $producto->descripcion_corta }}</p>

                <!-- categoría y etiquetas -->
                <div class="meta-producto mt-4 text-umami">
                    <p><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>
                    @if($producto->etiqueta)
                        <p><strong>Etiqueta:</strong> 
                            <span class="badge bg-umami">{{ $producto->etiqueta }}</span>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Productos de interés -->
@if($relacionados->isNotEmpty())
<section class="productos-interes py-5 bg-umami">
    <div class="container">
        <h2 class="text-center mb-4 text-umami-cream">También te puede interesar</h2>
        <div class="row g-4">
            @foreach($relacionados as $relacionado)
            <div class="col-md-4">
                <article class="hover-card">
                    @if($relacionado->imagen)
                        <img src="{{ asset('storage/productos/' . $relacionado->imagen) }}" alt="{{ $relacionado->nombre }}">
                    @else
                        <img src="{{ asset('storage/productos/placeholder.webp') }}" alt="{{ $relacionado->nombre }}">
                    @endif
                    <div class="hover-info">
                        <h3>{{ $relacionado->nombre }}</h3>
                        <p>{{ $relacionado->descripcion_corta }}</p>
                        <span class="price">${{ number_format($relacionado->precio / 100, 2, '.', ',') }}</span>
                        <a href="{{ route('producto', $relacionado->producto_id) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection