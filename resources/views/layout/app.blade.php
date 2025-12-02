<!DOCTYPE html>
<html lang="es-Es">
@include('partials.head')

<body>
    <!-- Loader -->
    <div id="loader">
        <div class="hongo">
            <img src="{{asset('storage/UI/logo-umami.svg')}}" alt="Loader Hongo" class="w-100">
        </div>
    </div>
    <header>
        @include('partials.navbar')
    </header>

    <!-- Contenedor para mensajes flotantes -->
    <div id="floating-messages" class="position-fixed top-0 end-0 p-3" style="z-index: 2000"></div>

    <main>
        {{$slot ?? ''}}
        @yield('content')
    </main>

    @include('partials.footer')
    
    {{-- Pasar mensajes de sesión y flags a JS de forma segura usando JSON script tags para evitar que el editor/TS procese Blade directives dentro de JS --}}
    <script type="application/json" id="__flash-data">@json(['message' => session('feedback.message'), 'error' => session('feedback.error')])</script>
    <script type="application/json" id="__auth-data">@json(Auth::check())</script>
    <script type="application/json" id="__routes-data">@json(['carritoCount' => route('carrito.count')])</script>

    <script>
        // Pasomos datos de PHP  a JavaScript
        window.__auth = @json(Auth::check());
        
        window.__routes = {
            carritoCount: "{{ route('carrito.count') }}"
        };

        // Pasomos los mensajes flash de la sesión (si existen)
        window.__flash = @json(session('feedback')); 
    </script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>