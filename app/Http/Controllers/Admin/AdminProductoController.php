<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;  // Importamos Producto
use App\Models\Categoria; // Importamos Categoria
use Illuminate\Http\Request;

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
        // Lógica de validación y guardado (Clase 05 y 10)
        // Lo haremos en el siguiente paso
    }

    /**
     * Muestra el detalle de un producto específico.
     */
    public function show(string $id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return view('admin.productos.show', ['producto' => $producto]);
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
        // Lógica de validación y actualización (Clase 06 y 10)
    }

    /**
     * Elimina el producto de la base de datos.
     */
    public function destroy(string $id)
    {
        // Lógica de eliminación (Clase 06)
    }
}
