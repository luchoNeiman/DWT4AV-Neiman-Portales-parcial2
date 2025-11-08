<!DOCTYPE html>
<html lang="es-Es">

@include('partials.head')

<body class="bg-cream">
    <main class="d-flex">

        {{-- Incluimos el Sidebar del Admin --}}
        @include('admin.layout.partials.sidebar')

        <div class="flex-grow-1">

            {{-- 3. Incluimos el Topbar del Admin --}}
            @include('admin.layout.partials.topbar')

            <section class="content-wrapper p-4">

                @if(session('feedback.message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('feedback.message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('feedback.error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('feedback.error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <p class="fw-bold">¡Ups! Ocurrieron algunos errores:</p>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- AQUÍ SE CARGA CADA PÁGINA (Dashboard, Productos, etc.) --}}
                @yield('content')

            </section>
        </div>
    </main>

    {{-- Incluimos el Sidebar Offcanvas (para mobile) --}}
    @include('admin.layout.partials.sidebar-mobile')

</body>

</html>