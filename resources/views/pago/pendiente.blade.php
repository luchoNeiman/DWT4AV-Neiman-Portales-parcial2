@extends('layout.app')
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4 animate__animated animate__pulse" style="max-width: 400px;">
        <div class="text-center">
            <i class="bi bi-hourglass-split text-warning" style="font-size: 4rem;"></i>
            <h1 class="mt-3 text-warning">Pago pendiente</h1>
            <p class="mt-2">Tu pago para el pedido <strong>#{{ $pedido->pedido_id }}</strong> está pendiente de confirmación.</p>
            <a href="/" class="btn btn-secondary mt-3">Volver al inicio</a>
        </div>
    </div>
</div>
@endsection
