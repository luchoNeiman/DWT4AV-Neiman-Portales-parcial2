<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class PaginaController extends Controller
{
    public function index()
    {
        // Destacados (ajusta IDs según mi seed/BD)
        $destacadoIds = [1, 9, 13];
        $destacados = Producto::whereIn('producto_id', $destacadoIds)
            ->orderByRaw('FIELD(producto_id,' . implode(',', $destacadoIds) . ')')
            ->get();

        // Obtener combos por categoría (7), manteniendo orden por nombre o id si necesitás
        $combos = Producto::where('categoria_id', 7)->orderBy('producto_id')->get();

        return view('index', [
            'destacados' => $destacados,
            'combos' => $combos
        ]);
    }

    public function catalogo()
    {
        // Obtener productos por categoría
        // with('categoria') carga la relación para evitar N+1 queries (Clase 08)
        $hamburguesas = Producto::where('categoria_id', 1)->with('categoria')->get();
        $wraps = Producto::where('categoria_id', 2)->with('categoria')->get();
        $acompaniamientos = Producto::where('categoria_id', 3)->with('categoria')->get();
        $condimentos = Producto::where('categoria_id', 4)->with('categoria')->get();
        $bebidas = Producto::where('categoria_id', 5)->with('categoria')->get();
        $postres = Producto::where('categoria_id', 6)->with('categoria')->get();
        $combos = Producto::where('categoria_id', 7)->with('categoria')->get();

        return view('catalogo', [
            'hamburguesas' => $hamburguesas,
            'wraps' => $wraps,
            'acompañamientos' => $acompaniamientos,
            'condimentos' => $condimentos,
            'bebidas' => $bebidas,
            'postres' => $postres,
            'combos' => $combos
        ]);
    }

    public function nosotros()
    {
        return view('nosotros');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function producto(int $id)
    {
        // Busca el producto por ID o falla con 404
        $producto = Producto::with('categoria')->findOrFail($id);

        // Buscar productos relacionados (ej: de la misma categoría, excluyendo el actual)
        $relacionados = Producto::where('categoria_id', $producto->categoria_id)
            ->where('producto_id', '!=', $id)
            ->limit(3)
            ->get();

        return view('productos.producto', [
            'producto' => $producto,
            'relacionados' => $relacionados
        ]);
    }
}
