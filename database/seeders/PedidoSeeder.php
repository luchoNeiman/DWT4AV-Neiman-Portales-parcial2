<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\PedidoItem;

class PedidoSeeder extends Seeder
{
    public function run(): void
    {
        // Busco al usuario de prueba y al Admin
        $usuarios = Usuario::all();
        $productos = Producto::all();

        if($productos->isEmpty()) return;

        foreach ($usuarios as $usuario) {
            // Crear 2 pedidos para cada usuario
            for ($i = 1; $i <= 2; $i++) {
                $pedido = Pedido::create([
                    'id' => $usuario->id,
                    'fecha' => now()->subDays(rand(1, 30)), // Fecha aleatoria hace días
                    'total' => 0, // Lo calculamos despues
                    'estado' => rand(0, 1) ? 'entregado' : 'pendiente',
                ]);

                $totalPedido = 0;
                
                // Agregar 2 o 3 items al pedido
                foreach($productos->random(rand(2, 3)) as $prod) {
                    $cantidad = rand(1, 2);
                    $precio = $prod->precio;
                    
                    PedidoItem::create([
                        'pedido_id' => $pedido->pedido_id,
                        'producto_id' => $prod->producto_id,
                        'nombre_producto' => $prod->nombre,
                        'cantidad' => $cantidad,
                        'precio_unitario' => $precio,
                    ]);
                    
                    $totalPedido += ($precio * $cantidad);
                }

                // Actualizar total
                $pedido->total = $totalPedido;
                $pedido->save();
            }
        }
    }
}