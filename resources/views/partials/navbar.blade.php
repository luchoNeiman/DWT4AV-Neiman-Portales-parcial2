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
                <li class="nav-item"><a class="nav-link text-umami-cream {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link text-umami-cream {{ request()->routeIs('catalogo') ? 'active' : '' }}" href="{{ route('catalogo') }}">Menú</a></li>
                <li class="nav-item"><a class="nav-link text-umami-cream {{ request()->routeIs('nosotros') ? 'active' : '' }}" href="{{ route('nosotros') }}">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link text-umami-cream {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">Contacto</a></li>
                <li class="nav-item"><a class="nav-link text-umami-cream" href="admin/login.html">Admin</a></li>

                <!-- Mostrar "Iniciar sesión" si no está autenticado, sino dropdown con Perfil + Cerrar sesión -->
                @guest
                <li class="nav-item"><a class="nav-link btn-secundario rounded mx-2" href="{{ route('auth.showLogin') }}">Iniciar sesión</a></li>
                @endguest

                @auth
                <li class="nav-item dropdown ms-2">
                    <a class="nav-link dropdown-toggle text-umami-cream d-flex align-items-center" href="#" id="navbarPerfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-5 me-1"></i>
                        <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarPerfil">
                        <li><a class="dropdown-item" href="perfil.html">Mi perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth

                <!-- Separador -->
                <li class="vr mx-2 d-none d-lg-block"> </li>

                <!-- Carrito -->
                <li class="nav-item position-relative">

                    <!-- Perfil
                <li class="nav-item ms-2">
                    <a class="nav-link text-umami-cream" href="perfil.html" aria-label="Perfil">
                        <i class="bi bi-person-circle fs-5"></i>
                    </a> -->
                </li>
            </ul>
        </div>
    </div>
</nav>