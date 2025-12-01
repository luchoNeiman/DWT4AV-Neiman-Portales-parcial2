<aside class="aside-dashboard bg-umami d-none d-md-flex flex-column p-3 min-vh-100">
    
    <a href="{{ route('index') }}" class="text-center mb-4">
        <img src="{{ asset('storage/UI/logo-umami.svg') }}" alt="Logo UMAMI" class="w-50">
    </a>

    <nav class="flex-grow-1 d-flex flex-column">
        
        <ul class="nav flex-column flex-grow-1">
            
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
                <a class="nav-link text-umami-cream {{ request()->routeIs('admin.categorias.*') ? 'active' : '' }}"
                    href="{{ route('admin.categorias.index') }}">
                    <i class="bi bi-tags me-2"></i> Categorías
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-umami-cream {{ request()->routeIs('admin.usuarios.*') ? 'active' : '' }}"
                    href="{{ route('admin.usuarios.index') }}">
                    <i class="bi bi-people me-2"></i> Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-umami-cream {{ request()->routeIs('admin.perfil.index') ? 'active' : '' }}"
                    href="{{ route('admin.perfil.index') }}">
                    <i class="bi bi-person-circle me-2"></i> Mi perfil
                </a>
            </li>

            <li class="nav-item mt-auto pt-3">
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-secundario w-100"><i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión</button>
                </form>
            </li>
            
        </ul>
    </nav>
</aside>