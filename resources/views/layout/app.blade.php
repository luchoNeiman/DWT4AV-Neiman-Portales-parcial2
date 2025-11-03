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

    <main>
        {{$slot ?? ''}} <!--significa que si hay un slot lo muestre, sino muestre vacio-->
        @yield('content') <!--significa que si no hay slot, busque en las vistas hijas la seccion content -->

    </main>

    @include('partials.footer')
</body>

</html>