@extends('layouts.app')
@section('content')
<div class="container text-center mt-5">
    <h1>Pago pendiente</h1>
    <p>Tu pago para el pedido #{{ $pedido->pedido_id }} está pendiente de confirmación.</p>
    <a href="/" class="btn btn-secondary mt-3">Volver al inicio</a>
</div>
@endsection
