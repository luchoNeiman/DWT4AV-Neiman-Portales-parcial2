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
@if($hamburguesas->isNotEmpty())
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-umami">Hamburguesas</h2>
        <div class="catalogo-grid">
            @foreach($hamburguesas as $producto)
            <article class="hover-card {{ $producto->etiqueta ? 'destacado' : '' }}">
                @if($producto->imagen)
                    <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
                @else
                    <img src="{{ asset('storage/productos/placeholder.webp') }}" alt="{{ $producto->nombre }}">
                @endif
                <div class="hover-info">
                    <h3>{{ $producto->nombre }}</h3>
                    <p>{{ $producto->descripcion_corta }}</p>
                    <span class="price">${{ number_format($producto->precio / 100, 2, ',', '.') }}</span>
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
@endif

<!-- Acompañamientos y Condimentos -->
@if($acompañamientos->isNotEmpty() || $condimentos->isNotEmpty())
<section class="py-5 bg-umami">
    <div class="container">
        <h2 class="text-center mb-5">Acompañamientos y Condimentos</h2>
        <div class="catalogo-grid">
            <article class="hover-card">
                <img src="assets/img/productos/combo-papas-salsaUmami-umami-productos.webp"
                    alt="Combo Papas y Salsa Especial">
                <div class="hover-info">
                    <h3>Combo Papas + Salsa Especial</h3>
                    <p>Papas clásicas con salsa Umami de hongos y hierbas frescas.</p>
                    <span class="price">$4.200</span>
                    <a href="{{ route('producto', 7) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/sal-umami-productos.webp" alt="Sal Umami">
                <div class="hover-info">
                    <h3>Sal Umami</h3>
                    <p>Sal marina infusionada con hongos deshidratados, diseñada para potenciar el sabor natural
                        de cada plato con un toque único y sofisticado.</p>
                    <div class="d-flex align-items-center gap-2">
                        <span class="price text-decoration-line-through">$3.200</span>
                        <span class="price">$2.500</span>
                    </div>
                    <a href="{{ route('producto', 8) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card destacado">
                <img src="assets/img/productos/bastones-shiitake-crocantes-umami-productos.webp"
                    alt="Bastones de Shiitake Crocantes">
                <div class="hover-info">
                    <h3>Bastones de Shiitake Crocantes</h3>
                    <p>Bastones de hongos shiitake apanados con mix de semillas, acompañados con alioli de ajo
                        asado.</p>
                    <span class="price">$4.500</span>
                    <a href="{{ route('producto', 9) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/papas-rusticas-umami-productos.webp" alt="Papas Rústicas Umami">
                <div class="hover-info">
                    <h3>Papas Rústicas Umami</h3>
                    <p>Papas cortadas a mano, condimentadas con sal ahumada y romero.</p>
                    <span class="price">$3.500</span>
                    <a href="{{ route('producto', 10) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/wrap-de-hongos-umami-productos.webp" alt="Wrap de Hongos Umami">
                <div class="hover-info">
                    <h3>Wrap de Hongos Umami</h3>
                    <p>Gírgolas salteadas al wok, vegetales de estación y nuestra salsa especial de hongos que realza cada bocado.</p>
                    <div class="d-flex align-items-center gap-2">
                        <span class="price text-decoration-line-through">$7.800</span>
                        <span class="price">$6.500</span>
                    </div>
                    <a href="{{ route('producto', 11) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>
        </div>
    </div>
</section>
@endif

<!-- Bebidas -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-umami">Bebidas</h2>
        <div class="catalogo-grid">
            <article class="hover-card">
                <img src="assets/img/productos/agua-de-reishi-refrescante-umami-productos.webp"
                    alt="Agua Reishi">
                <div class="hover-info">
                    <h3>Agua Reishi</h3>
                    <p>Infusión refrescante de hongos reishi con toques cítricos, energizante y natural.</p>
                    <span class="price">$5.000</span>
                    <a href="{{ route('producto', 12) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/agua-de-maitake-umami-productos.webp" alt="Agua Maitake">
                <div class="hover-info">
                    <h3>Agua de Maitake</h3>
                    <p>Agua saborizada con extracto de maitake, con notas herbales y revitalizantes.</p>
                    <span class="price">$5.000</span>
                    <a href="{{ route('producto', 12) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/limonada-umami-umami-productos.webp" alt="Limonada Umami">
                <div class="hover-info">
                    <h3>Limonada Umami</h3>
                    <p>Limonada fresca con un toque de jengibre y albahaca.</p>
                    <span class="price">$4.800</span>
                    <a href="{{ route('producto', 13) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/cerveza-umami-artesanal-umami-productos.webp"
                    alt="Cerveza Artesanal Umami">
                <div class="hover-info">
                    <h3>Cerveza Artesanal Umami</h3>
                    <p>Golden ale infusionada con hongos portobello, suave y equilibrada.</p>
                    <span class="price">$6.800</span>
                    <a href="{{ route('producto', 14) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

        </div>
    </div>
</section>

<!-- Postres y opciones especiales -->
<section class="py-5 bg-umami">
    <div class="container">
        <h2 class="text-center mb-5">Postres y opciones especiales</h2>
        <div class="catalogo-grid">
            <article class="hover-card">
                <img src="assets/img/productos/cheesecake-reishi-umami-productos.webp" alt="Cheesecake Reishi">
                <div class="hover-info">
                    <h3>Cheesecake Reishi</h3>
                    <p>Cheesecake cremoso con base de galletas integrales y un toque de hongo reishi.</p>
                    <span class="price">$5.200</span>
                    <a href="{{ route('producto', 15) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/brownie-shiitake-umami-productos.webp" alt="Brownie Shiitake">
                <div class="hover-info">
                    <h3>Brownie Shiitake</h3>
                    <p>Brownie húmedo con extracto de shiitake, chocolate amargo 70% y nueces.</p>
                    <span class="price">$4.500</span>
                    <a href="{{ route('producto', 16) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/andina-gluten-free-umami-productos.webp"
                    alt="Andina Gluten Free">
                <div class="hover-info">
                    <h3>Andina Gluten Free</h3>
                    <p>Medallón de hongos y lentejas, pan de quinoa sin gluten, palta fresca y brotes.</p>
                    <span class="price">$8.500</span>
                    <a href="{{ route('producto', 17) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/tex-mex-veggie-umami-productos.webp" alt="Tex-Mex Veggie">
                <div class="hover-info">
                    <h3>Tex Mex Veggie</h3>
                    <p>Portobello especiado, guacamole, maíz asado, pico de gallo y nachos crocantes.</p>
                    <span class="price">$9.200</span>
                    <a href="{{ route('producto', 18) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>
        </div>
    </div>
</section>

@endsection