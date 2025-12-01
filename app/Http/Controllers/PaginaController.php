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
        // Excluir productos especiales que queremos mostrar en "postres" (IDs 7 y 8)
        $hamburguesas = Producto::where('categoria_id', 1)->whereNotIn('producto_id', [7, 8])->with('categoria')->get();
        $wraps = Producto::where('categoria_id', 2)->with('categoria')->get();
        
        // Acompañamientos (ID 3)
        $acompaniamientos = Producto::where('categoria_id', 3)->with('categoria')->get();
        
        // Condimentos (ID 4)
        $condimentos = Producto::where('categoria_id', 4)->with('categoria')->get();

        // Sección 2: Acompañamientos y condimentos
        $sec2Ids = [10, 11, 12, 9, 13]; // combo papas, papas rústicas, bastones, wrap, sal
        $acom_y_condimentos = Producto::whereIn('producto_id', $sec2Ids)
            ->orderByRaw('FIELD(producto_id, ' . implode(',', $sec2Ids) . ')')
            ->get();
        $bebidas = Producto::where('categoria_id', 5)->with('categoria')->get();
                // Incluir además los productos específicos (Andina, Tex Mex) en postres
                $postres = Producto::where(function ($q) {
                        $q->where('categoria_id', 6)
                            ->orWhereIn('producto_id', [7, 8]);
                })->with('categoria')->get();
        $combos = Producto::where('categoria_id', 7)->with('categoria')->get();

        return view('catalogo', [
            'hamburguesas' => $hamburguesas,
            'wraps' => $wraps,
            'acompaniamientos' => $acompaniamientos,
            'condimentos' => $condimentos,
            'acom_y_condimentos' => $acom_y_condimentos,
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
