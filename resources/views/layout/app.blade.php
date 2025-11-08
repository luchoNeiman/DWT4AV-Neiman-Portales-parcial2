<!DOCTYPE html>
<html lang="es-Es">
@include('partials.head')

<body>
    <!-- Loader -->
    <div id="loader">
        <div class="hongo">
            <img src="{{asset('img/UI/logo-umami.svg')}}" alt="Loader Hongo" class="w-100">
        </div>
    </div>
    <header>
        @include('partials.navbar')
    </header>

    <!-- Contenedor para mensajes flotantes -->
    <div id="floating-messages" style="position: fixed; top: 20px; right: 20px; z-index: 1050;"></div>

    <main>
        {{$slot ?? ''}}
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Pasar mensajes de sesión y flags a JS de forma segura usando JSON script tags para evitar que el editor/TS procese Blade directives dentro de JS --}}
    <script type="application/json" id="__flash-data">@json(['message' => session('feedback.message'), 'error' => session('feedback.error')])</script>
    <script type="application/json" id="__auth-data">@json(Auth::check())</script>
    <script type="application/json" id="__routes-data">@json(['carritoCount' => route('carrito.count')])</script>
</body>

</html>