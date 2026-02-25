<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\CarritoItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;

class PagoController extends Controller
{
    public function crearPreferencia($id)
    {
        // Configuración del Access Token desde el archivo de servicios
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));

        // Cargar el pedido con sus productos
        $pedido = Pedido::with('items.producto')->findOrFail($id);

        $items_pago = [];
        foreach ($pedido->items as $item) {
            $items_pago[] = [
                "title" => $item->producto->nombre,      // Título del producto
                "quantity" => (int) $item->cantidad,    // Cantidad 
                "unit_price" => (float) $item->precio_unitario, // Precio real de BD 
            ];
        }

        try {
            $cliente = new PreferenceClient();
            $preferencia = $cliente->create([
                "items" => $items_pago,
                "back_urls" => [
                    "success" => route('pago.exitoso'),
                    "failure" => route('pago.fallido'),
                    "pending" => route('pago.pendiente'),
                ],
                "auto_return" => "approved",
                "external_reference" => (string) $pedido->pedido_id, // Usá 'pedido_id' para que findOrFail no falle
            ]);

            // Guardar el preference_id en la base de datos como pide el final
            $pedido->update(['preference_id' => $preferencia->id]);

            // Retornar la vista donde el usuario verá el botón de Mercado Pago
            return view('pago.checkout', [
                'preferencia' => $preferencia,
                'pedido' => $pedido
            ]);
        } catch (MPApiException $error) {
            dd($error->getApiResponse()->getContent()); // Debug
            return back()->with('error', 'Error al conectar con Mercado Pago: ' . $error->getMessage());
        }
    }

    public function exitoso(Request $solicitud)
    {
        // Mercado Pago envía datos por la URL al volver
        $pago_id = $solicitud->input('payment_id'); // ID de pago
        $estado = $solicitud->input('status');
        $referencia_externa = $solicitud->input('external_reference');

        // Busco el pedido para actualizarlo
        $pedido = Pedido::where('pedido_id', $referencia_externa)->firstOrFail();

        $pedido->update([
            'payment_id' => $solicitud->input('payment_id'),
            'status' => $solicitud->input('status'),
            'estado' => 'completado' // Mi estado interno del pedido
        ]);

        // vacío el carrito del usuario logueado 
        CarritoItem::where('usuario_id', Auth::id())->delete();

        return view('pago.exitoso', compact('pedido')); //compact es igual a ['pedido' => $pedido, 'pago_id' => $pago_id]
    }

    public function fallido(Request $solicitud)
    {
        $referencia_externa = $solicitud->input('external_reference');
        $pedido = Pedido::findOrFail($referencia_externa);

        $pedido->update([
            'status' => 'rejected',
            'estado' => 'cancelado'
        ]);

        // En caso de fallo, NO vacío el carrito para que el usuario pueda reintentar
        return view('pago.fallido', ['pedido' => $pedido]);
    }

    public function pendiente(Request $solicitud)
    {
        $referencia_externa = $solicitud->input('external_reference');
        $pedido = Pedido::findOrFail($referencia_externa);

        $pedido->update([
            'status' => 'pending',
            'payment_id' => $solicitud->input('payment_id')
        ]);

        // Vacío el carrito porque el pago ya entró en proceso
        CarritoItem::where('usuario_id', Auth::id())->delete();

        return view('pago.pendiente', ['pedido' => $pedido]);
    }
}
