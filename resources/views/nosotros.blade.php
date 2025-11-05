@extends('layout.app')

@section('titulo', 'Nosotros - UMAMI')


@section('content')
<!-- Banner -->
<section class="banner-nosotros text-light">
    <div class="container-titulo-menu text-center">
        <h1 class="display-4 fw-bold text-umami-cream">Nosotros</h1>
    </div>
</section>

<!-- Intro -->
<section class="py-5 text-center">
    <div class="container intro-nosotros">
        <h2 class="mb-4 text-umami">Nuestra esencia</h2>
        <p class="text-umami">En <strong>UMAMI</strong> creemos que la comida es más que un plato: es una
            experiencia
            que une
            personas, respeta la naturaleza y potencia el sabor real de los ingredientes.</p>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <img src="assets/img/UI/remera-cocinero-umami.webp" alt="Hongos umami"
                class="img-fluid rounded-5 shadow mt-4">
            <img src="assets/img/UI/recibos-umami.webp" alt="Recibos umami"
                class="img-fluid rounded-5 shadow mt-4">
        </div>
    </div>
</section>

<!-- Tres pilares -->
<section class="py-5 bg-umami">
    <div class="container">
        <h2 class="text-center mb-5">Los tres pilares de UMAMI</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="pilar-box">
                    <h3>Sabor Auténtico</h3>
                    <p>Trabajamos con hongos frescos, vegetales de estación y panes artesanales para que cada
                        bocado sea
                        inolvidable.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pilar-box">
                    <h3>Sustentabilidad</h3>
                    <p>Nuestro menú está pensado para cuidar el planeta: producción responsable y opciones 100%
                        vegetarianas.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pilar-box">
                    <h3>Innovación</h3>
                    <p>Experimentamos con recetas únicas que combinan tradición, creatividad y técnicas modernas
                        para reinventar
                        la comida rápida.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Extra info -->
<section class="py-5 extra-info">
    <div class="container text-umami">
        <div class="row g-5 align-items-center">
            <div class="col-md-6">
                <img src="assets/img/UI/comedor-umami.webp" alt="Comedor umami"
                    class="img-fluid rounded-5 shadow">
            </div>
            <div class="col-md-6 text-center">
                <h2>¿Quiénes somos?</h2>
                <p>Somos un equipo de apasionados por la gastronomía que cree en el poder del
                    <strong>umami</strong>, el quinto
                    sabor. Queremos demostrar que la comida rápida puede ser <strong>saludable, sostenible y
                        deliciosa</strong>.
                </p>
                <p>En nuestro local vas a encontrar un espacio cálido, moderno y pensado para disfrutar tanto en
                    compañía como
                    en un momento personal. Nuestro compromiso es simple: <strong>servir platos
                        honestos</strong> que hablen por
                    sí mismos.</p>
            </div>
        </div>
    </div>
</section>
@endsection