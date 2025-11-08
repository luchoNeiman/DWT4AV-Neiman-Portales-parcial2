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

    {{-- Pasar mensajes de sesión a JS de forma segura --}}
    <script>
        window.__flash = {
            message: {!! json_encode(session('feedback.message')) !!},
            error: {!! json_encode(session('feedback.error')) !!}
        };
    </script>
</body>

</html>