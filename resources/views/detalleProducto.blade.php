@extends('layout.app')

@section('content')

<!-- Detalle del producto -->
<section class="detalle-producto py-5">
    <div class="container mt-5 pt-2">
        <div class="row g-5 align-items-center">
            <!-- Imagen -->
            <figure class="col-md-5">
                <img src="assets/img/productos/hamburguesa-clasica-umami-destacados.webp"
                    alt="Hamburguesa Clásica UMAMI" class="img-fluid rounded-4">
            </figure>

            <!-- Información -->
            <div class="col-md-7">
                <h1 class="mb-3">Hamburguesa Clásica</h1>
                <p class="text-umami">Preparada con gírgolas frescas, pan artesanal y vegetales orgánicos.
                    Una opción <strong>saludable</strong> y <strong>llena de sabor</strong> que redefine la
                    comida rápida.</p>
                <p class="h4 text-umami fw-bold mb-3">$7.000</p>
                <button class="btn-primario btn-lg mb-4">Añadir al carrito</button>

                <h4 class="text-umami">Características</h4>
                <ul class="text-umami list-unstyled">
                    <li> Medallón de gírgolas frescas</li>
                    <li> Vegetales orgánicos</li>
                    <li> Pan artesanal de masa madre</li>
                    <li> 100% vegetariano</li>
                </ul>

                <!-- categoría y etiquetas -->
                <div class="meta-producto mt-4 text-umami">
                    <p><strong>Categoría:</strong> Hamburguesas</p>
                    <p><strong>Etiquetas:</strong> <span class="badge bg-umami me-1">vegano</span>
                        <span class="badge bg-umami me-1">artesanal</span>
                        <span class="badge bg-umami me-1">clásico</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Productos de interés -->
<section class="productos-interes py-5 bg-umami">
    <div class="container">
        <h2 class="text-center mb-4 text-umami-cream">También te puede interesar</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/mediterranea-umami-productos.webp"
                        alt="Hamburguesa Mediterránea">
                    <div class="hover-info">
                        <h3>Mediterránea</h3>
                        <a href="detalle.html" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>
            <div class="col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/fungi-BBQ-umami-productos.webp" alt="Fungi BBQ">
                    <div class="hover-info">
                        <h3>Fungi BBQ</h3>
                        <a href="detalle.html" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>
            <div class="col-md-4">
                <article class="hover-card">
                    <img src="assets/img/productos/combo-clasico-umami-productos.webp" alt="Combo Clásico">
                    <div class="hover-info">
                        <h3>Combo Clásico</h3>
                        <a href="detalle.html" class="btn-secundario">Ver más</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

@endsection