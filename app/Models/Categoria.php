<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Indica el nombre de la tabla
    protected $primaryKey = 'categoria_id'; // Indica la clave primaria

    /**
     * Una categoría tiene muchos productos.
     */
    public function productos()
    {
        // El primer argumento es el Modelo relacionado
        // El segundo es la clave foránea en la tabla productos
        // El tercero es la clave primaria en esta tabla (categorias)
        return $this->hasMany(Producto::class, 'categoria_id', 'categoria_id');
    }
}
