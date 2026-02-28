@extends('layout.app')
@section('content')
<div class="container text-center mt-5">
    <h1>Pago fallido</h1>
    <p>Hubo un problema al procesar tu pago para el pedido #{{ $pedido->pedido_id }}.</p>
    <a href="/carrito" class="btn btn-warning mt-3">Volver al carrito</a>
</div>
@endsection
