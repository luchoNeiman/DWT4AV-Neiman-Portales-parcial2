@extends('layout.app')

@section('titulo', 'Mi Perfil - UMAMI')

@section('content')
<div class="container py-5 mt-4">
    <div class="row justify-content-center">

        <div class="col-lg-8">
            <div class="card shadow-sm mb-4 border-umami">
                <div class="card-header bg-umami text-umami-cream">
                    <h5 class="mb-0 card-title">Editar mis datos</h5>
                </div>
                    <!-- Mis Compras -->
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-8">
                            <div class="card shadow-sm border-umami mb-4">
                                <div class="card-header bg-umami text-umami-cream d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 card-title">Mis Compras</h5>
                                    <button class="btn btn-sm btn-outline-umami" type="button" data-bs-toggle="collapse" data-bs-target="#comprasCollapse" aria-expanded="true" aria-controls="comprasCollapse">
                                        <span class="collapse-icon text-umami-cream">
                                            <i class="bi bi-chevron-down" id="comprasCollapseIcon"></i>
                                        </span>
                                    </button>
                                </div>
                                <div class="collapse show" id="comprasCollapse">
                                    <div class="card-body p-4">
                                        @if($pedidos->isEmpty())
                                            <div class="text-center py-5">
                                                <i class="bi bi-bag-x display-1 text-umami opacity-25 mb-3"></i>
                                                <p class="text-muted fw-semibold">Aún no has realizado compras.</p>
                                            </div>
                                        @else
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped align-middle">
                                                    <thead class="bg-umami text-umami-cream">
                                                        <tr>
                                                            <th>ID Pedido</th>
                                                            <th>Fecha</th>
                                                            <th>Total</th>
                                                            <th>Estado Pago</th>
                                                            <th>Detalles</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($pedidos as $pedido)
                                                        <tr>
                                                            <td class="fw-bold">#{{ $pedido->pedido_id }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($pedido->fecha)->setTimezone(config('app.timezone'))->format('d/m/Y H:i') }}</td>
                                                            <td>${{ number_format($pedido->total, 0, ',', '.') }}</td>
                                                            <td>
                                                                @if($pedido->status)
                                                                    <span class="badge {{ $pedido->status == 'approved' ? 'bg-success' : ($pedido->status == 'pending' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                                                    {{ ucfirst($pedido->status) }}
                                                                </span>
                                                                @else
                                                                    <span class="badge bg-secondary">Sin estado</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-umami" type="button" data-bs-toggle="collapse" data-bs-target="#pedido-{{ $pedido->pedido_id }}" aria-expanded="false" aria-controls="pedido-{{ $pedido->pedido_id }}">
                                                                    Ver detalles
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr class="collapse" id="pedido-{{ $pedido->pedido_id }}">
                                                            <td colspan="5">
                                                                <div class="p-3">
                                                                    <strong>Items del pedido:</strong>
                                                                    <ul class="mb-2">
                                                                        @foreach($pedido->items as $item)
                                                                            <li>{{ $item->nombre_producto }} x{{ $item->cantidad }} - ${{ number_format($item->precio_unitario, 0, ',', '.') }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                    <strong>Estado del pedido:</strong> {{ ucfirst($pedido->estado) }}<br>
                                                                    <strong>ID de pago:</strong> {{ $pedido->payment_id ?? 'No disponible' }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card-body p-4">

                    <form action="{{ route('perfil.update') }}" method="POST">
                        @csrf

                        <h5 class="text-umami mb-3 pb-2 border-bottom">Información Personal</h5>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label fw-bold text-umami">Nombre completo</label>
                                <input type="text" id="nombre" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    value="{{ old('nombre', $usuario->nombre) }}">
                                @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold text-umami">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $usuario->email) }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="ubicacion" class="form-label fw-bold text-umami">Ubicación de envío</label>
                            <input type="text" id="ubicacion" name="ubicacion"
                                class="form-control @error('ubicacion') is-invalid @enderror"
                                value="{{ old('ubicacion', $usuario->ubicacion) }}"
                                placeholder="Ej: Calle Falsa 123, CABA">
                            @error('ubicacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <h5 class="text-umami mb-3 pb-2 border-bottom pt-3">Seguridad</h5>

                        <div class="mb-3">
                            <label for="current_password" class="form-label text-umami">Contraseña Actual</label>
                            <input type="password" id="current_password" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                placeholder="Ingresá tu clave actual para cambiarla">
                            @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label text-umami">Nueva Contraseña</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label text-umami">Confirmar Nueva</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primario px-4">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 bg-umami text-umami-cream">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="bg-cream text-umami rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; font-size: 2.5rem;">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <h4 class="fw-bold">{{ $usuario->nombre }}</h4>
                        <p class="small opacity-75">{{ $usuario->email }}</p>
                    </div>

                    <hr class="border-cream opacity-50">

                    <ul class="list-unstyled mb-0">
                        <li class="mb-2 d-flex justify-content-between">
                            <span>Miembro desde:</span>
                            <strong>{{ $usuario->created_at->format('d/m/Y') }}</strong>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Última compra:</span>
                            {{-- Si tuvieras la relación pedidos, podrías mostrar la fecha --}}
                            <strong>{{ $usuario->pedidos()->latest()->first()?->fecha ? \Carbon\Carbon::parse($usuario->pedidos()->latest()->first()->fecha)->format('d/m/Y') : 'Nunca' }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

<script>
    const comprasCollapse = document.getElementById('comprasCollapse');
    const comprasCollapseIcon = document.getElementById('comprasCollapseIcon');
    comprasCollapse.addEventListener('show.bs.collapse', function () {
        comprasCollapseIcon.classList.remove('bi-chevron-up');
        comprasCollapseIcon.classList.add('bi-chevron-down');
    });
    comprasCollapse.addEventListener('hide.bs.collapse', function () {
        comprasCollapseIcon.classList.remove('bi-chevron-down');
        comprasCollapseIcon.classList.add('bi-chevron-up');
    });
</script>