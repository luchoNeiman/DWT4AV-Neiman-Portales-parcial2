@extends('layout.app')

@section('titulo', 'Inicio - Sabor Plant-Based - UMAMI')

@section('content')
<!-- Banner -->
<section class="banner-home text-light align-items-center">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <!-- oculto en mobile: texto y botón -->
            <div class="col-md-7 col-lg-6 d-none d-md-block banner-content">
                <h1 class="text-umami-cream">EL SABOR <span class="text-umami-cream">UMAMI</span>, AHORA <span class="text-umami-cream">PLANT-BASED</span></h1>
                <p class="lead my-4 text-umami-cream">Redefinimos la comida rápida. Ingredientes frescos, recetas únicas y un compromiso con la sostenibilidad. <span class="d-none d-md-inline">Descubre el quinto sabor en cada bocado.</span></p>
                <a href="{{ route('catalogo') }}" class="btn-primario btn-lg">Ver Menú</a>
            </div>
        </div>
    </div>
</section>

<!-- Productos destacados -->
<section class="py-4">
    <div class="container">
        <h2 class="text-center text-umami mb-4">Destacados</h2>

        <!-- Grid normal para tablet y desktop -->
        <div class="grid-destacados mx-2 d-none d-sm-grid">
            @foreach($destacados as $index => $producto)
            <div class="{{ $index === 0 ? 'grid-main' : ($index === 1 ? 'grid-side1' : 'grid-side2') }}">
                <article class="hover-card h-100">
                    <img src="{{ asset('img/productos/' . $producto->imagen) }}"
                        alt="{{ $producto->nombre }}" class="img-fluid">
                    <div class="hover-info">
                        <h3>{{ $producto->nombre }}</h3>
                        <p>{{ $producto->descripcion_corta ?: \Illuminate\Support\Str::limit($producto->descripcion, 120) }}</p>
                        <a href="{{ route('producto', $producto->producto_id) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        <!-- Carousel para mobile -->
        <div id="carouselDestacados" class="carousel slide d-sm-none" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($destacados as $index => $producto)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <article class="hover-card">
                        <img src="{{ asset('img/productos/' . $producto->imagen) }}"
                            alt="{{ $producto->nombre }}" class="d-block w-100">
                        <div class="hover-info">
                            <h3>{{ $producto->nombre }}</h3>
                            <p>{{ $producto->descripcion_corta ?: \Illuminate\Support\Str::limit($producto->descripcion, 120) }}</p>
                            <a href="{{ route('producto', $producto->producto_id) }}" class="btn-secundario">Ver más</a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>

            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestacados"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselDestacados"
                data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

<!-- Sección Nosotros / Home -->
<section class="py-5 bg-umami text-umami-cream text-center">
    <div class="container">
        <h2 class="mb-4">Sobre UMAMI</h2>
        <p>
            En <strong>UMAMI</strong> creemos que la comida rápida también puede ser <strong>saludable</strong>,
            <strong>sustentable</strong> y llena de sabor. Nuestras hamburguesas, wraps y acompañamientos
            están elaborados a base de hongos frescos y pan artesanal, logrando una experiencia gastronómica
            única.
        </p>
        <p>
            Apostamos a un modelo de cocina que combina <strong>innovación</strong> y <strong>conciencia
                ambiental</strong>.
            Cada bocado es el resultado de ingredientes seleccionados y un proceso pensado para
            que disfrutes sin culpa, cuidando tu salud y la del planeta.
        </p>
        <a href="{{ route('nosotros') }}" class="btn-secundario">Conocé más</a>
    </div>
</section>

<!-- <section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-umami">Combos umami</h2>
        <div class="row g-4 container-combos-home">
            Combo Clásico
            <div class="col-12 col-sm-6 col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/combo-clasico-umami-productos.webp"
                        alt="Combo Clásico umami">
                    <div class="hover-info">
                        <h3>Combo Clásico</h3>
                        <p>Hamburguesa Clásica + Papas Rústicas + Limonada Umami.</p>
                        <span class="price">$11.500</span>
                        <a href="{{ route('producto', 6) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>

            Combo Mediterráneo
            <div class="col-12 col-sm-6 col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/combo-mediterraneo-umami-productos.webp"
                        alt="Combo Mediterráneo umami">
                    <div class="hover-info">
                        <h3>Combo Mediterráneo</h3>
                        <p>Hamburguesa Mediterránea + Papas especiadas + Agua Reishi.</p>
                        <span class="price">$12.800</span>
                        <a href="{{ route('producto', 7) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>

            Combo Fungi BBQ
            <div class="col-12 col-sm-6 col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/combo-fungi-bbq-umami-productos.webp" alt="Combo Fungi BBQ">
                    <div class="hover-info">
                        <h3>Combo Fungi BBQ</h3>
                        <p>Hamburguesa Fungi BBQ + Papas & Salsas + Bebida línea Coca-Cola.</p>
                        <span class="price">$12.600</span>
                        <a href="{{ route('producto', 8) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>

            Combo Trufa & Shiitake
            <div class="col-12 col-sm-6 col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/combo-trufa-shiitake-umami-productos.webp"
                        alt="Combo Trufa & Shiitake">
                    <div class="hover-info">
                        <h3>Combo Trufa & Shiitake</h3>
                        <p>Hamburguesa Trufa & Shiitake + Bastones de shiitake crocantes + Agua Maitake.</p>
                        <span class="price">$13.900</span>
                        <a href="{{ route('producto', 9) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>

            Combo Spicy Gírgola
            <div class="col-12 col-sm-6 col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/combo-spicy-gírgola-umami-productos.webp"
                        alt="Combo Spicy Gírgola">
                    <div class="hover-info">
                        <h3>Combo Spicy Gírgola</h3>
                        <p>Hamburguesa Spicy Gírgola + Bastones de shiitake crocantes + Limonada umami.</p>
                        <span class="price">$12.300</span>
                        <a href="{{ route('producto', 10) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>

            Combo Wrap Saludable
            <div class="col-12 col-sm-6 col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/combo-wrap-saludable-umami-productos.webp"
                        alt="Combo Wrap Saludable">
                    <div class="hover-info">
                        <h3>Combo Wrap Saludable</h3>
                        <p>Wrap de Hongos + Papas Rústicas + Agua Mineral.</p>
                        <span class="price">$10.900</span>
                        <a href="{{ route('producto', 11) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>

            Combo Nuggets Fan
            <div class="col-12 col-sm-6 col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/combo-nuggets-fan-umami-productos.webp"
                        alt="Combo Nuggets Fan">
                    <div class="hover-info">
                        <h3>Combo Nuggets Fan</h3>
                        <p>Nuggets de Hongos + Papas & Salsas + Limonada umami.</p>
                        <span class="price">$9.800</span>
                        <a href="{{ route('producto', 12) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>

            Combo Dúo
            <div class="col-12 col-sm-6 col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/combo-duo-umami-productos.webp" alt="Combo Dúo">
                    <div class="hover-info">
                        <h3>Combo Dúo</h3>
                        <p>2 Hamburguesas a elección + Papas XL con dips + 2 Bebidas.</p>
                        <span class="price">$22.500</span>
                        <a href="{{ route('producto', 13) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>

            Combo sal y wrap (texto corregido)
            <div class="col-12 col-sm-6 col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/combo-sobres-cerveza-postre-umami-productos.webp"
                        alt="Combo wrap y sal">
                    <div class="hover-info">
                        <h3>Combo wrap y sal</h3>
                        <p>Wrap de hongos deliciosos, condimentados con sal umami y una cerveza para acompañar.
                            Luego de eso un tiramisú umami de postre.</p>
                        <span class="price">$13.500</span>
                        <a href="{{ route('producto', 14) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section> -->

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-umami">Combos umami</h2>
        <div class="row g-4 container-combos-home">
            @foreach($combos as $combo)
            <div class="col-12 col-sm-6 col-md-4">
                <article class="hover-card">
                    @php
                        $imgName = $combo->imagen ?? 'placeholder.webp';
                        $imgPath = public_path('img/productos/' . $imgName);
                        $imgUrl = file_exists($imgPath)
                            ? asset('img/productos/' . $imgName)
                            : asset('img/productos/placeholder.webp');
                    @endphp

                    <img src="{{ $imgUrl }}" alt="{{ $combo->nombre }}">
                    <div class="hover-info">
                        <h3>{{ $combo->nombre }}</h3>
                        <p>{{ trim($combo->descripcion_corta) !== '' ? $combo->descripcion_corta : \Illuminate\Support\Str::limit($combo->descripcion, 120) }}</p>
                        <span class="price">${{ number_format($combo->precio, 0, ',', '.') }}</span>
                        <a href="{{ route('producto', $combo->producto_id) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection