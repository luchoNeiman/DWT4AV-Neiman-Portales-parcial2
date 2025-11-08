<header class="header-dashboard d-flex justify-content-between align-items-center p-3 shadow-sm bg-cream">
    <button class="btn-primario d-md-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">
        <i class="bi bi-list"></i>
    </button>
    <div class="d-none d-md-block">
        <h1 class="h4 text-umami m-0">@yield('titulo-seccion', 'Dashboard')</h1>
    </div>
    <div class="d-flex align-items-center">
        <span class="d-none d-md-block me-3 text-umami">Hola, <strong>{{ Auth::user()->name }}</strong></span>
        <a href="{{-- route('admin.perfil.index') --}}" class="text-umami">
            <img src="{{ asset('img/UI/logo-umami-green.svg') }}" alt="Avatar" class="avatar-admin">
        </a>
    </div>
</header>