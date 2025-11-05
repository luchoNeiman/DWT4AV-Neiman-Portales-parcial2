@extends('layout.app')

@section('content')
<!-- Banner -->
<section class="banner-home text-light">
    <div class="container text-center">
        <h1 class="ver-menu-home"><a href="{{ route('catalogo') }}" class="btn-primario btn-lg mt-3 fs-4">Ver menú</a>
        </h1>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                            <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                            <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                            <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
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
                        <a href="{{ route('producto') }}" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection