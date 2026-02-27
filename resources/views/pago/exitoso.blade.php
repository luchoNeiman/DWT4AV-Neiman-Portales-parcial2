@extends('layouts.app')
@section('content')
<div class="container text-center mt-5">
    <h1>¡Pago realizado con éxito!</h1>
    <p>Tu pedido #{{ $pedido->pedido_id }} fue procesado correctamente.</p>
    <a href="/" class="btn btn-primary mt-3">Volver al inicio</a>
</div>
@endsection
