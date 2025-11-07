<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-umami fixed-top shadow">
    <div class="container">
        <a class="navbar-brand contenedor-logo-header" href="{{ route('index') }}">
            <img src="{{asset('img/UI/logo-umami.svg')}}" alt="Logo de UMAMI" class="me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Menú de navegación">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link text-umami-cream {{ request()->routeIs('index') ? 'active' : '' }} " href="{{ route('index') }}">Inicio</a>
                </li>
                <li class="nav-item"><a class="nav-link text-umami-cream {{ request()->routeIs('catalogo') ? 'active' : '' }}" href="{{ route('catalogo') }}">Menú</a></li>
                <li class="nav-item"><a class="nav-link text-umami-cream {{ request()->routeIs('nosotros') ? 'active' : '' }}" href="{{ route('nosotros') }}">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link text-umami-cream {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">Contacto</a></li>
                <li class="nav-item"><a class="nav-link text-umami-cream" href="admin/login.html">Admin</a></li>
                <li class="nav-item"><a class="nav-link btn-secundario rounded mx-2" href="login.html">Iniciar
                        sesión</a></li>


                <!-- Separador -->
                <li class="vr mx-2 d-none d-lg-block"> </li>

                <!-- Carrito -->
                <li class="nav-item position-relative">
                    <a class="nav-link text-umami-cream" href="carrito.html" aria-label="Carrito">
                        <i class="bi bi-cart fs-5"></i>
                        <!-- Contador del carrito -->
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-cream text-umami">
                            0
                        </span>
                    </a>
                </li>

                <!-- Perfil -->
                <li class="nav-item ms-2">
                    <a class="nav-link text-umami-cream" href="perfil.html" aria-label="Perfil">
                        <i class="bi bi-person-circle fs-5"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>