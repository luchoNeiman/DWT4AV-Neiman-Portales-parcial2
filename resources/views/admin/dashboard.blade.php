@extends('admin.layout.admin') {{-- <-- 1. Hereda del NUEVO layout de admin --}}

{{-- 2. Define el título para el <title> --}}
@section('titulo', 'Dashboard - Admin UMAMI')

{{-- 3. Define el título para el H1 del Topbar --}}
@section('titulo-seccion', 'Dashboard')

{{-- 4. Este es tu contenido --}}
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
                    <p class="card-text display-4 text-umami fw-bold">34</p>
                    <span class="text-muted"><i class="bi bi-arrow-right"></i> Sin cambios</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection