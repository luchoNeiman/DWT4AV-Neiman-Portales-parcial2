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
            <article class="hover-card destacado">
                <img src="assets/img/productos/hamburguesa-clasica-umami-productos.webp"
                    alt="Hamburguesa clásica Umami">
                <div class="hover-info">
                    <h3>Clásica Umami</h3>
                    <p>Medallón de gírgolas frescas, queso cheddar vegano, lechuga, tomate, cebolla morada y
                        salsa especial Umami, en pan artesanal de papa.</p>
                    <div class="d-flex align-items-center gap-2">
                        <span class="price text-decoration-line-through">$8.200</span>
                        <span class="price">$7.000</span>
                    </div>
                    <a href="{{ route('producto', 1 ) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/mediterranea-umami-productos.webp"
                    alt="Hamburguesa Mediterránea">
                <div class="hover-info">
                    <h3>Mediterránea</h3>
                    <p>Hongos de estación con tomates secos, espinaca fresca y aderezo de ajo confitado.</p>
                    <span class="price">$9.200</span>
                    <a href="{{ route('producto', 2) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card destacado">
                <img src="assets/img/productos/fungi-BBQ-umami-productos.webp" alt="Hamburguesa Fungi BBQ">
                <div class="hover-info">
                    <h3>Fungi BBQ</h3>
                    <p>Hamburguesa de portobellos grillados con salsa barbacoa casera, cebolla caramelizada y
                        rúcula fresca.</p>
                    <span class="price">$9.000</span>
                    <a href="{{ route('producto', 3) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card ">
                <img src="assets/img/productos/spicy-girgola-umami-productos.webp"
                    alt="Hamburguesa Spicy Gírgola">
                <div class="hover-info">
                    <h3>Spicy Gírgola</h3>
                    <p>Gírgolas crocantes con salsa picante de chipotle, jalapeños en rodajas y cebolla crispy.
                    </p>
                    <span class="price">$9.500</span>
                    <a href="{{ route('producto', 4) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/hamburguesa-trufa-shiitake-umami-productos.webp"
                    alt="Hamburguesa Trufa & Shiitake">
                <div class="hover-info">
                    <h3>Trufa & Shiitake</h3>
                    <p>Medallón de shiitake y gírgolas con crema suave de trufa, rúcula fresca y queso vegano
                        fundido.</p>
                    <span class="price">$9.800</span>
                    <a href="{{ route('producto', 5) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>

            <article class="hover-card">
                <img src="assets/img/productos/hamburguesa-umami-oriental-umami-productos.webp"
                    alt="Umami Oriental">
                <div class="hover-info">
                    <h3>Umami Oriental</h3>
                    <p>Hongos shiitake y portobellos, acompañada de pepino encurtido, salsa de
                        soja dulce, jengibre fresco y mayonesa de wasabi suave en pan artesanal de sésamo.</p>
                    <span class="price">$9.800</span>
                    <a href="{{ route('producto', 6) }}" class="btn-secundario">Ver más</a>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Papas Fritas -->
<section class="py-5 bg-umami">
    <div class="container">
        <h2 class="text-center mb-5">Papas Fritas y condimentos</h2>
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