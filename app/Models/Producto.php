<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Indica el nombre de la tabla
    protected $primaryKey = 'producto_id'; // Indica la clave primaria

    /**
     * Los atributos que se pueden asignar masivamente (para el CRUD admin).
     * (Clase 05)
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categoria_id',
        'imagen',
        'etiqueta',
    ];

    /**
     * Un producto pertenece a una categoría.
     */
    public function categoria()
    {
        // El primer argumento es el Modelo relacionado
        // El segundo es la clave foránea en esta tabla (productos)
        // El tercero es la clave primaria en la tabla categorias
        return $this->belongsTo(Categoria::class, 'categoria_id', 'categoria_id');
    }
}
