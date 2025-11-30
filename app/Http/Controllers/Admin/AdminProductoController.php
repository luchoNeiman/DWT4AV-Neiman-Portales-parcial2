<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductoController extends Controller
{
    /**
     * Muestra el listado de productos.
     */
    public function index()
    {
        $productos = Producto::with('categoria')->paginate(10); // Carga productos con su categoría
        return view('admin.productos.index', ['productos' => $productos]);
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        $categorias = Categoria::all(); // Obtenemos todas las categorías
        return view('admin.productos.crear', ['categorias' => $categorias]);
    }

    /**
     * Guarda el nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar
        $request->validate([
            'nombre'            => 'required|min:3|max:100',
            'categoria_id'      => 'required|exists:categorias,categoria_id',
            'precio'            => 'required|numeric|min:0',
            'stock'             => 'required|integer|min:0',
            'descripcion_corta' => 'required|max:255',
            'descripcion'       => 'required',
            'imagen'            => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'etiqueta'          => 'nullable|string|max:50',
        ]);

        // Preparar datos
        $data = $request->except(['_token']);

        // Subir Imagen (si existe)
        if ($request->hasFile('imagen')) {
            // Guarda en storage/app/public/productos
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        // Crear
        Producto::create($data);

        // Redirigir
        return redirect()
            ->route('admin.productos.index')
            ->with('feedback.message', '¡Producto creado con éxito!');
    }

    /**
     * Muestra el detalle de un producto específico.
     */
    public function show(string $id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return view('admin.productos.ver', ['producto' => $producto]);
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.productos.editar', [
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }

    /**
     * Actualiza el producto en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);

        // Validar
        $request->validate([
            'nombre'            => 'required|min:3|max:100',
            'categoria_id'      => 'required|exists:categorias,categoria_id',
            'precio'            => 'required|numeric|min:0',
            'stock'             => 'required|integer|min:0',
            'descripcion_corta' => 'required|max:255',
            'descripcion'       => 'required',
            'imagen'            => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'etiqueta'          => 'nullable|string|max:50',
        ]);

        $data = $request->except(['_token', '_method']);

        // Manejo de Imagen
        if ($request->hasFile('imagen')) {
            // Borrar imagen anterior si existe
            if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
                Storage::disk('public')->delete($producto->imagen);
            }
            // Subir nueva
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        // Actualizar
        $producto->update($data);

        return redirect()
            ->route('admin.productos.index')
            ->with('feedback.message', '¡Producto actualizado correctamente!');
    }

    /**
     * Elimina el producto de la base de datos.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);

        // Borrar imagen asociada
        if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
            Storage::disk('public')->delete($producto->imagen);
        }

        // Borrar registro
        $producto->delete();

        return redirect()
            ->route('admin.productos.index')
            ->with('feedback.message', 'Producto eliminado.');
    }
}
