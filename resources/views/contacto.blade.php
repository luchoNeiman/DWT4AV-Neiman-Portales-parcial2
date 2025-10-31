@extends('layout.app')
@section('content')
<!-- Banner -->
<section class="banner-contacto text-light">
    <div class="container-titulo-menu text-center">
        <h1 class="display-4 fw-bold text-umami-cream">Contacto</h1>
    </div>
</section>

<!-- Formulario de contacto -->
<section class="py-5">
    <div class="container">
        <div class="row g-5 bg-umami rounded-4 p-4 mt-2">
            <!-- Formulario -->
            <div class="col-lg-6">
                <h2 class="mb-4">Escribinos</h2>
                <div>
                    <p>Completá la encuesta y recibí nuestros mejores descuentos. Ademas, para más
                        información, preguntas y recomendaciones de platos, les dejamos un casillero de mensaje
                        del cuál estaremos
                        leyendo sus respuestas.</p>
                </div>
                <form action="#" class="contact-form" method="get" id="form-contacto">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" class="form-control borde-cream" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" id="email" name="email" class="form-control borde-cream" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" class="form-control borde-cream"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="5"
                            class="form-control borde-cream"></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" id="terminos" class="form-check-input">
                        <label for="terminos" class="form-check-label">Acepta los terminos</label>
                    </div>
                    <button type="submit" class="btn btn-secundario">Enviar</button>
                </form>
            </div>

            <!-- Info -->
            <div class="col-lg-6">
                <h2 class="mb-4">Información</h2>
                <p><strong>Dirección:</strong> Av. Siempreviva 742, Buenos Aires</p>
                <p><strong>Teléfono:</strong> +54 11 4567 8901</p>
                <p><strong>Email:</strong> contacto@umami.com</p>
                <p><strong>Horario:</strong> Lun-Dom · 12:00 - 23:00 hs</p>
                <div class="mapa mt-4">
                    <iframe class="w-100 rounded shadow mt-5"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26272.695617469362!2d-58.428620800000004!3d-34.6019627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1756535632544!5m2!1ses!2sar"
                        width="100" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal de formulario enviado con éxito -->
<div class="modal fade" id="modalformContacto" tabindex="-1" aria-labelledby="modalformContactoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center bg-cream">
            <div class="modal-header border-0">
                <h5 class="modal-title w-100" id="modalformContactoLabel">¡Formulario enviado con éxito!</h5>
                <button type="button" class="btn-close text-umami" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 2.5rem;"></i>
                <p class="mt-3 mb-0">Gracias por contactarte con UMAMI. Te responderemos pronto.</p>
            </div>
        </div>
    </div>
</div>

@endsection