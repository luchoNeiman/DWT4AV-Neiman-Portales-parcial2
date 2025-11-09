<div class="offcanvas offcanvas-start bg-umami text-light" tabindex="-1" id="offcanvasSidebar">
    <div class="offcanvas-header">
        <a href="{{ route('index') }}" class="text-center mb-4">
            <img src="{{ asset('storage/UI/logo-umami.svg') }}" alt="Logo UMAMI" class="w-50">
        </a>
        <button class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-umami-cream {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-umami-cream {{ request()->routeIs('admin.productos.*') ? 'active' : '' }}"
                    href="{{ route('admin.productos.index') }}">
                    <i class="bi bi-box-seam me-2"></i> Productos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-umami-cream" href="#">
                    <i class="bi bi-tags me-2"></i> Categorías
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-umami-cream" href="#">
                    <i class="bi bi-people me-2"></i> Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-umami-cream" href="#">
                    <i class="bi bi-person-circle me-2"></i> Mi perfil
                </a>
            </li>
            <li class="nav-item mt-3">
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-secundario w-100">Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </div>
</div>