@extends('admin.layout.admin')
@section('titulo', 'Dashboard - Admin UMAMI')
@section('titulo-seccion', 'Dashboard')

@section('content')
<div class="container-fluid flex-grow-1 contenedor-contenido-dashboard">

    <section class="row mb-4 g-3">

        <div class="col-12 col-md-4">
            <div class="card-metricas card text-center shadow-sm h-100 border-0 shadow-md hover:shadow-lg transition-all duration-300 ">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title text-umami uppercase font-bold"><i class="bi bi-journal-text me-2"></i> Ventas Totales</h5>
                    <p class="card-text display-5 text-umami fw-bold">${{ number_format($ventasTotales, 0, ',', '.') }}</p>
                    <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> 100% vs mes anterior</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card-metricas card text-center shadow-sm h-100 border-0 shadow-md hover:shadow-lg transition-all duration-300">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title text-umami uppercase font-bold"><i class="bi bi-people me-2"></i> Nuevos Usuarios</h5>
                    <p class="card-text display-5 text-umami fw-bold">{{ $nuevosUsuarios }}</p>

                    @if($porcentajeUsuarios >= 0)
                    <span class="text-success small fw-semibold">
                        <i class="bi bi-arrow-up"></i> {{ $porcentajeUsuarios }}% vs mes anterior
                    </span>
                    @else
                    <span class="text-danger small fw-semibold">
                        <i class="bi bi-arrow-down"></i> {{ abs($porcentajeUsuarios) }}% vs mes anterior
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card-metricas card text-center shadow-sm h-100 border-0 shadow-md hover:shadow-lg transition-all duration-300">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title text-umami uppercase font-bold"><i class="bi bi-box-seam me-2"></i> Productos Activos</h5>
                    <p class="card-text display-5 text-umami fw-bold">{{ $productosActivos }}</p>
                    <span class="text-muted small fw-semibold"><i class="bi bi-check-circle"></i> En stock</span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="mb-4 text-umami h4 font-bold uppercase">Gestión rápida</h2>
        <div class="row g-3">
            <div class="col-12 col-md-4 card-acceso-responsive">
                <a href="{{ route('admin.categorias.index') }}" class="card p-4 h-100 text-center shadow-sm bg-cream border border-umami text-decoration-none transform hover:-translate-y-1 hover:shadow-xl transition-all duration-300 group">
                    <i class="bi bi-tags display-5 mb-3 text-umami group-hover:scale-110 transition-transform duration-300 inline-block"></i>
                    <h3 class="h3 text-umami font-bold">Categorías</h3>
                    <p class="small text-muted mb-0 group-hover:text-umami transition-colors">Gestiona las categorías de los productos</p>
                </a>
            </div>
            <div class="col-12 col-md-4 card-acceso-responsive">
                <a href="{{ route('admin.productos.index') }}" class="card p-4 h-100 text-center shadow-sm bg-cream border border-umami text-decoration-none transform hover:-translate-y-1 hover:shadow-xl transition-all duration-300 group">
                    <i class="bi bi-box-seam display-5 mb-3 text-umami group-hover:scale-110 transition-transform duration-300 inline-block"></i>
                    <h3 class="h3 text-umami font-bold">Productos</h3>
                    <p class="small text-muted mb-0 group-hover:text-umami transition-colors">Administra el menú y los precios</p>
                </a>
            </div>
            <div class="col-12 col-md-4 card-acceso-responsive">
                <a href="{{ route('admin.usuarios.index') }}" class="card p-4 h-100 text-center shadow-sm bg-cream border border-umami text-decoration-none transform hover:-translate-y-1 hover:shadow-xl transition-all duration-300 group">
                    <i class="bi bi-people display-5 mb-3 text-umami group-hover:scale-110 transition-transform duration-300 inline-block"></i>
                    <h3 class="h3 text-umami font-bold">Usuarios</h3>
                    <p class="small text-muted mb-0 group-hover:text-umami transition-colors">Controla clientes y roles</p>
                </a>
            </div>
        </div>
    </section>
</div>
@endsection