@extends('layout.app')
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4 animate__animated animate__shakeX" style="max-width: 400px;">
        <div class="text-center">
            <i class="bi bi-x-circle-fill text-danger" style="font-size: 4rem;"></i>
            <h1 class="mt-3 text-danger">Pago fallido</h1>
            <p class="mt-2">Hubo un problema al procesar tu pago para el pedido <strong>#{{ $pedido->pedido_id }}</strong>.</p>
            <a href="/carrito" class="btn btn-warning mt-3">Volver al carrito</a>
        </div>
    </div>
</div>
@endsection
