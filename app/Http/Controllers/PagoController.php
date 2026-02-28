<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\CarritoItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Preference;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\Client\Payment\PaymentClient;
use Illuminate\Support\Facades\Log;

class PagoController extends Controller
{
    public function crearPreferencia($id)
    {
        // Configuración del Access Token desde el archivo de servicios
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));

        // Cargar el pedido con sus productos
        $pedido = Pedido::with('items.producto')->where('pedido_id', $id)->firstOrFail();

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

    public function recibirWebhook(Request $request)
    {
        $tipo_evento = $request->input('type');
        if ($tipo_evento === 'payment') {
            $id_pago = $request->input('data.id');
            try {
                \MercadoPago\MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));
                $clientePago = new PaymentClient();
                $pagoInfo = $clientePago->get($id_pago);
                $pedido_id = $pagoInfo->external_reference;
                if ($pedido_id) {
                    $pedido = \App\Models\Pedido::where('pedido_id', $pedido_id)->first();
                    if ($pedido) {
                        if ($pagoInfo->status === 'approved') {
                            $pedido->update([
                                'payment_id' => $pagoInfo->id,
                                'status'     => $pagoInfo->status,
                                'estado'     => 'completado'
                            ]);
                        } elseif ($pagoInfo->status === 'rejected') {
                            $pedido->update([
                                'status' => 'rejected',
                                'estado' => 'cancelado'
                            ]);
                        }
                    }
                }
            } catch (\Exception $e) {
                Log::error('Error procesando Webhook de Mercado Pago: ' . $e->getMessage());
            }
        }
        return response()->json(['status' => 'success'], 200);
    }
}
