<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'pedido_id';

    protected $fillable = ['id', 'fecha', 'total', 'estado'];

    // Un pedido pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id', 'id');
    }

    // Un pedido tiene muchos items
    public function items()
    {
        return $this->hasMany(PedidoItem::class, 'pedido_id', 'pedido_id');
    }
}
