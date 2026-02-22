<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\CarritoItem;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    /**
     * Muestra el carrito del usuario autenticado.
     */
    public function index()
    {
        $items = CarritoItem::with('producto.categoria')
            ->where('usuario_id', Auth::id())
            ->get();

        // Calcular el total
        $total = $items->sum(function ($item) {
            return $item->subtotal;
        });

        return view('carrito.index', compact('items', 'total'));
    }

    /**
     * Agregar un producto al carrito.
     */
    public function agregar(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,producto_id',
            'cantidad' => 'nullable|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);
        $cantidad = $request->cantidad ?? 1;

        // Verificar stock disponible
        if ($producto->stock < $cantidad) {
            return back()->with('feedback.error', 'No hay suficiente stock disponible.');
        }

        // Verificar si el producto ya está en el carrito
        $carritoItem = CarritoItem::where('usuario_id', Auth::id())
            ->where('producto_id', $producto->producto_id)
            ->first();

        if ($carritoItem) {
            // Si ya existe, actualizar cantidad
            $nuevaCantidad = $carritoItem->cantidad + $cantidad;

            if ($producto->stock < $nuevaCantidad) {
                return back()->with('feedback.error', 'No hay suficiente stock para agregar más unidades.');
            }

            $carritoItem->cantidad = $nuevaCantidad;
            $carritoItem->save();
        } else {
            // Si no existe, crear nuevo item
            CarritoItem::create([
                'usuario_id' => Auth::id(),
                'producto_id' => $producto->producto_id,
                'cantidad' => $cantidad,
                'precio_unitario' => $producto->precio,
            ]);
        }

        return back()->with('feedback.message', '¡Producto agregado al carrito!');
    }

    /**
     * Actualizar la cantidad de un producto en el carrito.
     */
    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $carritoItem = CarritoItem::where('carrito_item_id', $id)
            ->where('usuario_id', Auth::id())
            ->firstOrFail();

        $producto = $carritoItem->producto;

        // Verificar stock
        if ($producto->stock < $request->cantidad) {
            return back()->with('feedback.error', 'No hay suficiente stock disponible.');
        }

        $carritoItem->cantidad = $request->cantidad;
        $carritoItem->save();

        return back()->with('feedback.message', 'Cantidad actualizada.');
    }

    /**
     * Eliminar un producto del carrito.
     */
    public function eliminar($id)
    {
        $carritoItem = CarritoItem::where('carrito_item_id', $id)
            ->where('usuario_id', Auth::id())
            ->firstOrFail();

        $carritoItem->delete();

        return back()->with('feedback.message', 'Producto eliminado del carrito.');
    }

    public function finalizarCompra()
    {
        // Traigo los productos que tengo en el carrito
        $items_carrito = CarritoItem::with('producto')->where('usuario_id', Auth::id())->get();

        if ($items_carrito->isEmpty()) {
            return redirect()->route('carrito.index')
                ->with('feedback.error', 'Tu carrito está vacío.');
        }

        // Verifico el stock antes de seguir
        foreach ($items_carrito as $item) {
            if ($item->producto->stock < $item->cantidad) {
                return redirect()->route('carrito.index')
                    ->with('feedback.error', "No hay suficiente stock de {$item->producto->nombre}.");
            }
        }

        try {
            // Uso una transacción para asegurarme de que se cree el pedido y sus items correctamente
            $id_pedido = DB::transaction(function () use ($items_carrito) {
                // Calculo el total para guardarlo en la base de datos
                $total_pedido = $items_carrito->sum(function ($item) {
                    return $item->producto->precio * $item->cantidad;
                });

                // Creo el registro del Pedido. 
                // Lo guardo con estado 'pendiente' porque todavía no se pagó.
                $pedido = Pedido::create([
                    'id' => Auth::id(),
                    'fecha' => now(),
                    'total' => $total_pedido,
                    'estado' => 'pendiente', // Cambié 'completado' por 'pendiente' como pide la consigna 
                ]);

                foreach ($items_carrito as $item) {
                    // Registro cada producto en la tabla de items del pedido
                    PedidoItem::create([
                        'pedido_id' => $pedido->pedido_id,
                        'producto_id' => $item->producto_id,
                        'nombre_producto' => $item->producto->nombre,
                        'cantidad' => $item->cantidad,
                        'precio_unitario' => $item->producto->precio,
                    ]);
                }

                return $pedido->pedido_id;
            });

            // En lugar de redirigir al index, mando al usuario a generar la preferencia de Mercado Pago
            // Paso el ID del pedido que acabo de crear
            return redirect()->route('pago.procesar', ['id' => $id_pedido]);
        } catch (\Exception $e) {
            // dd("Error en el controlador: " . $e->getMessage());
            return redirect()->route('carrito.index')
                ->with('feedback.error', 'Ocurrió un error al registrar el pedido. Inténtalo nuevamente.' . $e->getMessage());
            // return dd($e->getMessage());
        }
    }


    /**
     * Obtener el conteo de items en el carrito (para el navbar).
     */
    public function getCount()
    {
        if (!Auth::check()) {
            return response()->json(['count' => 0]);
        }

        $count = CarritoItem::where('usuario_id', Auth::id())->sum('cantidad');

        return response()->json(['count' => $count]);
    }
}
