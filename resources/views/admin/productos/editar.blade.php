@extends('admin.layout.admin')
@section('titulo', 'Editar Producto - Admin UMAMI')
@section('titulo-seccion', 'Editar Producto')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-xl-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('admin.productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombre del Producto</label>
                                <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $producto->nombre) }}">
                                @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="categoria_id" class="form-label">Categoría</label>
                                <select id="categoria_id" name="categoria_id" class="form-select @error('categoria_id') is-invalid @enderror">
                                    <option value="" disabled>Elegir categoría...</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->categoria_id }}" {{ old('categoria_id', $producto->categoria_id) == $categoria->categoria_id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('categoria_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion_corta" class="form-label">Descripción Corta (Card)</label>
                            <input type="text" id="descripcion_corta" name="descripcion_corta" class="form-control @error('descripcion_corta') is-invalid @enderror" value="{{ old('descripcion_corta', $producto->descripcion_corta) }}">
                            @error('descripcion_corta') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción Larga (Detalle)</label>
                            <textarea id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="4">{{ old('descripcion', $producto->descripcion) }}</textarea>
                            @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" id="precio" name="precio" class="form-control @error('precio') is-invalid @enderror" step="1" value="{{ old('precio', $producto->precio) }}">
                                </div>
                                @error('precio') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $producto->stock) }}">
                                @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen Actual</label>
                            <div>
                                @if($producto->imagen)
                                <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-thumbnail-admin">
                                @else
                                <p class="text-muted">No hay imagen cargada.</p>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Reemplazar Imagen (Opcional)</label>
                            <input type="file" id="imagen" name="imagen" class="form-control @error('imagen') is-invalid @enderror">
                            @error('imagen') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="etiqueta" class="form-label">Etiqueta (Opcional)</label>
                            <input type="text" id="etiqueta" name="etiqueta" class="form-control @error('etiqueta') is-invalid @enderror" value="{{ old('etiqueta', $producto->etiqueta) }}">
                            @error('etiqueta') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="text-end mt-4">
                            <a href="{{ route('admin.productos.index') }}" class="btn-secundario me-2">Cancelar</a>
                            <button type="submit" class="btn-primario">Actualizar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection