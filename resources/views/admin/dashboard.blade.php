@extends('admin.layout.admin')
@section('titulo', 'Dashboard - Admin UMAMI')
@section('titulo-seccion', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card-metricas card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-umami"><i class="bi bi-journal-text me-2"></i> Ventas Totales</h5>
                    <p class="card-text display-4 text-umami fw-bold">$1,250,000</p>
                    <span class="text-success"><i class="bi bi-arrow-up"></i> 5.2% vs mes anterior</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-metricas card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-umami"><i class="bi bi-people me-2"></i> Nuevos Usuarios</h5>
                    <p class="card-text display-4 text-umami fw-bold">82</p>
                    <span class="text-danger"><i class="bi bi-arrow-down"></i> 1.5% vs mes anterior</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-metricas card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-umami"><i class="bi bi-box-seam me-2"></i> Productos Activos</h5>
                    <p class="card-text display-4 text-umami fw-bold">14</p>
                    <span class="text-muted"><i class="bi bi-arrow-right"></i> Sin cambios</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow-sm mb-4 h-100">
                <div class="card-header bg-umami text-umami-cream">
                    Últimos Pedidos
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover m-0">
                            <tbody>
                                <tr>
                                    <td>#1001</td>
                                    <td>Luciano Neiman</td>
                                    <td>$17,500</td>
                                    <td><span class="badge bg-umami">Entregado</span></td>
                                </tr>
                                <tr>
                                    <td>#1002</td>
                                    <td>Cliente 2</td>
                                    <td>$12,300</td>
                                    <td><span class="badge bg-cream">Pendiente</span></td>
                                </tr>
                                <tr>
                                    <td>#1003</td>
                                    <td>Cliente 3</td>
                                    <td>$8,900</td>
                                    <td><span class="badge bg-umami">Entregado</span></td>
                                </tr>
                                <tr>
                                    <td>#1004</td>
                                    <td>Cliente 4</td>
                                    <td>$22,100</td>
                                    <td><span class="badge bg-danger text-light">Cancelado</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="accesos">
        <h2 class="mb-4 text-umami h4">Gestión rápida</h2>
        <div class="row g-3">
            <div class="col-md-4 card-acceso-responsive">
                <a href="{{ route('admin.categorias.index') }}" class="card p-4 h-100 text-center shadow-sm bg-cream border-umami text-decoration-none">
                    <i class="bi bi-tags display-5 mb-3 text-umami"></i>
                    <h3 class="h3 text-umami">Categorías</h3>
                    <p class="small text-muted">Gestiona las categorías de los productos</p>
                </a>
            </div>
            <div class="col-md-4 card-acceso-responsive">
                <a href="{{ route('admin.productos.index') }}" class="card p-4 h-100 text-center shadow-sm bg-cream border-umami text-decoration-none">
                    <i class="bi bi-box-seam display-5 mb-3 text-umami"></i>
                    <h3 class="h3 text-umami">Productos</h3>
                    <p class="small text-muted">Administra el menú y los precios</p>
                </a>
            </div>
            <div class="col-md-4 card-acceso-responsive">
                <a href="{{ route('admin.usuarios.index') }}" class="card p-4 h-100 text-center shadow-sm bg-cream border-umami text-decoration-none">
                    <i class="bi bi-people display-5 mb-3 text-umami"></i>
                    <h3 class="h3 text-umami">Usuarios</h3>
                    <p class="small text-muted">Controla clientes y roles</p>
                </a>
            </div>
        </div>
    </section>

</div>
@endsection