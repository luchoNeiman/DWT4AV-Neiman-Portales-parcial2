@extends('layout.app')
@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-success animate__animated animate__fadeInDown">
                <div class="card-header bg-umami text-umami-cream text-center">
                    <i class="bi bi-check-circle display-3 mb-2 text-success animate__animated animate__bounceIn"></i>
                    <h2 class="mb-0">¡Pago realizado con éxito!</h2>
                </div>
                <div class="card-body text-center">
                    <p class="lead">Tu pedido <span class="fw-bold text-umami">#{{ $pedido->pedido_id }}</span> fue procesado correctamente.</p>
                    <hr>
                    <p class="mb-2">Estado del pago: <span class="badge bg-success">Aprobado</span></p>
                    <p class="mb-2">Total pagado: <span class="fw-bold text-success">${{ number_format($pedido->total, 0, ',', '.') }}</span></p>
                    <a href="/catalogo" class="btn btn-primario mt-3 animate__animated animate__pulse animate__infinite">Seguir comprando</a>
                    <a href="/perfil" class="btn btn-outline-umami mt-3 ms-2">Ver mis compras</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Animaciones Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection
