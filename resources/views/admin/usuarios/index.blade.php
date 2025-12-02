@extends('admin.layout.admin')
@section('titulo', 'Gestión de Usuarios - Admin UMAMI')
@section('titulo-seccion', 'Gestión de Usuarios')

@section('content')
<section class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 text-umami mb-0">Listado de Usuarios</h2>
    </div>

    <div class="card shadow-sm p-3 bg-umami d-none d-lg-block">
        <div class="card-body p-0">
            <div class="table-responsive rounded">
                <table class="table table-hover table-striped align-middle m-0">
                    <thead class="bg-umami text-white">
                        <tr>
                            <th class="py-3 ps-4">ID</th>
                            <th class="py-3">Nombre</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">Rol</th>
                            <th class="py-3 text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">#{{ $usuario->id }}</td>
                            <td class="fw-bold text-umami">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2 border" style="width: 35px; height: 35px;">
                                        <i class="bi bi-person-fill text-muted"></i>
                                    </div>
                                    {{ $usuario->name }}
                                </div>
                            </td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                @if($usuario->rol === 'admin')
                                <span class="badge bg-umami border border-white">Admin</span>
                                @else
                                <span class="badge bg-light text-dark border">Usuario</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-umami badge-acciones-admin rounded"
                                        title="Ver Compras/Carrito"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalHistorial-{{ $usuario->id }}">
                                        <i class="bi bi-clock-history"></i>
                                    </button>

                                    <a href="{{ route('admin.usuarios.edit', $usuario) }}" class="btn btn-sm btn-outline-umami badge-acciones-admin rounded" title="Editar Rol">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <button class="btn btn-sm btn-danger rounded" title="Eliminar" data-bs-toggle="modal" data-bs-target="#modalEliminar-{{ $usuario->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-lg-none">
        <div class="row g-3">
            @foreach($usuarios as $usuario)
            <div class="col-12 col-md-6">
                <div class="card h-100 shadow-sm border-umami bg-white">

                    <div class="card-header bg-umami text-umami-cream d-flex justify-content-between align-items-center py-2 px-3">
                        <span class="badge bg-cream text-umami border border-umami">#{{ $usuario->id }}</span>

                        <div class="dropdown">
                            <button class="btn btn-sm text-umami-cream p-0" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical fs-5"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-umami">
                                <li>
                                    <button class="dropdown-item text-umami"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalHistorial-{{ $usuario->id }}">
                                        <i class="bi bi-clock-history me-2"></i> Ver Compras/Carrito
                                    </button>
                                </li>

                                <li>
                                    <a class="dropdown-item text-umami" href="{{ route('admin.usuarios.edit', $usuario) }}">
                                        <i class="bi bi-pencil me-2"></i> Editar Rol
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider bg-umami opacity-25">
                                </li>
                                <li>
                                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar-{{ $usuario->id }}">
                                        <i class="bi bi-trash me-2"></i> Eliminar
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body p-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3 border" style="width: 50px; height: 50px;">
                                <i class="bi bi-person-fill text-muted fs-3"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-umami fw-bold mb-0">{{ $usuario->name }}</h5>
                                <small class="text-muted">{{ $usuario->email }}</small>
                            </div>
                        </div>

                        <div class="border-top pt-2 mt-2">
                            <span class="small text-muted me-2">Rol:</span>
                            @if($usuario->rol === 'admin')
                            <span class="badge bg-umami">Admin</span>
                            @else
                            <span class="badge bg-light text-dark border">Usuario</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @if($usuarios->hasPages())
    <div class="mt-4 d-flex justify-content-center">
        {{ $usuarios->links() }}
    </div>
    @endif

</section>

@foreach($usuarios as $usuario)

<div class="modal fade" id="modalHistorial-{{ $usuario->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-cream border-0 shadow">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title text-umami fw-bold">
                    <i class="bi bi-clock-history me-2"></i>Historial: {{ $usuario->name }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-4">
                @if($usuario->pedidos->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-bag-x display-1 text-umami opacity-25 mb-3"></i>
                    <p class="text-muted fw-semibold">Este usuario aún no ha realizado compras.</p>
                </div>
                @else
                <div class="accordion" id="accordionPedidos-{{ $usuario->id }}">
                    @foreach($usuario->pedidos as $pedido)
                    <div class="accordion-item border-umami mb-3 rounded overflow-hidden">
                        <h2 class="accordion-header" id="heading-{{ $pedido->pedido_id }}">
                            <button class="accordion-button collapsed bg-white text-umami fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $pedido->pedido_id }}">
                                <span class="d-flex justify-content-between w-100 me-3 align-items-center flex-wrap">
                                    <span>
                                        <i class="bi bi-receipt me-2"></i>Pedido #{{ $pedido->pedido_id }}
                                        <br class="d-sm-none">
                                        <small class="text-muted ms-sm-2 fw-normal" style="font-size: 0.8rem;">
                                            {{ \Carbon\Carbon::parse($pedido->fecha)->format('d/m/Y H:i') }}
                                        </small>
                                    </span>
                                    <span class="mt-2 mt-sm-0">
                                        <span class="badge {{ $pedido->estado == 'entregado' || $pedido->estado == 'completado' ? 'bg-success' : 'bg-warning text-dark' }} me-2">
                                            {{ ucfirst($pedido->estado) }}
                                        </span>
                                        ${{ number_format($pedido->total, 0, ',', '.') }}
                                    </span>
                                </span>
                            </button>
                        </h2>
                        <div id="collapse-{{ $pedido->pedido_id }}" class="accordion-collapse collapse" data-bs-parent="#accordionPedidos-{{ $usuario->id }}">
                            <div class="accordion-body bg-light">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0">
                                        <thead class="text-muted small">
                                            <tr>
                                                <th>Producto</th>
                                                <th class="text-center">Cant.</th>
                                                <th class="text-end">Precio</th>
                                                <th class="text-end">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pedido->items as $item)
                                            <tr>
                                                <td class="text-umami fw-semibold">{{ $item->nombre_producto }}</td>
                                                <td class="text-center">{{ $item->cantidad }}</td>
                                                <td class="text-end text-muted">${{ number_format($item->precio_unitario, 0, ',', '.') }}</td>
                                                <td class="text-end fw-bold">${{ number_format($item->precio_unitario * $item->cantidad, 0, ',', '.') }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="modal-footer border-top-0 bg-umami">
                <button type="button" class="btn btn-secundario" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEliminar-{{ $usuario->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-cream border-0 shadow">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title text-umami fw-bold">Eliminar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="text-danger mb-3">
                    <i class="bi bi-exclamation-triangle-fill display-4"></i>
                </div>
                <p class="fs-5 mb-1">¿Eliminar al usuario <strong>"{{ $usuario->name }}"</strong>?</p>
                <p class="small text-muted">Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer border-top-0 justify-content-center pb-4">
                <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4 text-white">Sí, Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach
@endsection