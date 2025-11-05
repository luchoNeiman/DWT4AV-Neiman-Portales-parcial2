@extends('layout.app')

@section('titulo', 'Inicio - Sabor Plant-Based - UMAMI')

@section('content')
<!-- Banner -->
<!-- <section class="banner-home text-light">
    <div class="container text-center">
        <h1 class="ver-menu-home"><a href="{{ route('catalogo') }}" class="btn-primario btn-lg mt-3 fs-4">Ver menú</a>
        </h1>
    </div>
</section> -->
<section class="banner-home text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-6">
                <h1 class="text-umami-cream">EL SABOR <span class="text-umami-cream">UMAMI</span>, <br> AHORA <span class="text-umami-cream">PLANT-BASED</span></h1>
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
            <!-- Hamburguesa Clásica -->

            <div class="grid-main">
                <article class="hover-card h-100">
                    <img src="assets/img/productos/hamburguesa-clasica-umami-destacados.webp"
                        alt="Hamburguesa de hongos clásica umami" class="img-fluid">
                    <div class="hover-info">
                        <h3>Hamburguesa Clásica</h3>
                        <p>Preparada con gírgolas frescas y pan artesanal. Saludable y deliciosa.</p>
                        <a href="{{ route('producto', 1) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>

            <!-- wrap de hongos -->
            <div class="grid-side1">
                <article class="hover-card h-100">
                    <img src="assets/img/productos/wrap-de-hongos-umami-productos.webp"
                        alt="Wrap vegetariano de hongos">
                    <div class="hover-info">
                        <h3>Wrap de Hongos</h3>
                        <p>Ligero, nutritivo y con el sabor umami que buscás.</p>
                        <a href="{{ route('producto', 2) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>

            <!-- Sal UMAMI -->
            <div class="grid-side2">
                <article class="hover-card h-100">
                    <img src="assets/img/productos/sal-umami-productos.webp" alt="Sal umami">
                    <div class="hover-info">
                        <h3>Sal umami</h3>
                        <p>Crocantes, veganos y listos para condimentar.</p>
                        <a href="{{ route('producto', 3) }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>
        </div>

        <!-- Carousel para mobile -->
        <div id="carouselDestacados" class="carousel slide d-sm-none" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Item 1 -->
                <div class="carousel-item active">
                    <article class="hover-card">
                        <img src="assets/img/productos/hamburguesa-clasica-umami-destacados.webp"
                            alt="Hamburguesa Clásica umami" class="d-block w-100">
                        <div class="hover-info">
                            <h3>Hamburguesa Clásica</h3>
                            <p>Preparada con gírgolas frescas y pan artesanal. Saludable y deliciosa.</p>
                            <a href="{{ route('producto', 4) }}" class="btn-secundario">Ver más</a>
                        </div>
                    </article>
                </div>

                <!-- Item 2 -->
                <div class="carousel-item">
                    <article class="hover-card">
                        <img src="assets/img/productos/wrap-de-hongos-umami-productos.webp" alt="Wrap de Hongos"
                            class="d-block w-100">
                        <div class="hover-info">
                            <h3>Wrap de Hongos</h3>
                            <p>Ligero, nutritivo y con el sabor umami que buscás.</p>
                            <a href="{{ route('producto', 5) }}" class="btn-secundario">Ver más</a>
                        </div>
                    </article>
                </div>

                <!-- Item 3 -->
                <div class="carousel-item">
                    <article class="hover-card">
                        <img src="assets/img/productos/sal-umami-productos.webp" alt="Sal umami"
                            class="d-block w-100">
                        <div class="hover-info">
                            <h3>Sal umami</h3>
                            <p>Crocantes, veganos y listos para condimentar.</p>
                            <a href="{{ route('producto', 6) }}" class="btn-secundario">Ver más</a>
                        </div>
                    </article>
                </div>
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

<section class="destacados py-5">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="titulo-seccion">Destacados de la Semana</h2>
                <p class="subtitulo-seccion">Nuestros productos estrella, elegidos por vos.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('catalogo') }}" class="btn-ver-mas">Ver todo el menú
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>

        <div class="destacados-grid">

            {{-- Bucle 1: Productos Destacados --}}
            @foreach($destacados as $producto)
            <article class="card-destacado">
                <a href="{{ route('producto', ['id' => $producto->producto_id]) }}">
                    <img src="{{ asset('img/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
                    <div class="card-destacado-body">
                        <h3>{{ $producto->nombre }}</h3>
                        <span class="btn-secundario-sm">Ver más</span>
                    </div>
                </a>
            </article>
            @endforeach

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

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 text-umami">Combos umami</h2>
        <div class="row g-4 container-combos-home">
            <!-- Combo Clásico -->
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

            <!-- Combo Mediterráneo -->
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

            <!-- Combo Fungi BBQ -->
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

            <!-- Combo Trufa & Shiitake -->
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

            <!-- Combo Spicy Gírgola -->
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

            <!-- Combo Wrap Saludable -->
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

            <!-- Combo Nuggets Fan -->
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

            <!-- Combo Dúo -->
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

            <!-- Combo sal y wrap (texto corregido) -->
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
</section>
@endsection