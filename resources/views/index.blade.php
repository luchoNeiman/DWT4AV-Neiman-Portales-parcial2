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