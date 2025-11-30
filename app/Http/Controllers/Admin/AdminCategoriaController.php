<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class AdminCategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias,nombre',
            'descripcion' => 'nullable|string',
        ]);

        Categoria::create($request->only(['nombre', 'descripcion']));

        return redirect()
            ->route('admin.categorias.index')
            ->with('feedback.message', 'Categoría creada con éxito.');
    }

    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias,nombre,' . $id . ',categoria_id',
            'descripcion' => 'nullable|string',
        ]);

        $categoria->update($request->only(['nombre', 'descripcion']));

        return redirect()
            ->route('admin.categorias.index')
            ->with('feedback.message', 'Categoría actualizada.');
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        // Opcional: Verificar si tiene productos antes de borrar
        if ($categoria->productos()->exists()) {
            return redirect()
                ->route('admin.categorias.index')
                ->with('feedback.error', 'No se puede eliminar la categoría porque tiene productos asociados.');
        }

        $categoria->delete();

        return redirect()
            ->route('admin.categorias.index')
            ->with('feedback.message', 'Categoría eliminada.');
    }
}
