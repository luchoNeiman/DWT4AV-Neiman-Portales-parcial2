<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;

class PagoControlador extends Controller
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
                "title" => $item->producto->nombre,      // Título del producto [cite: 33]
                "quantity" => (int) $item->cantidad,    // Cantidad [cite: 36]
                "unit_price" => (float) $item->precio_unitario, // Precio real de BD [cite: 37]
            ];
        }

        try {
            $cliente = new PreferenceClient();
            $preferencia = $cliente->create([
                "items" => $items_pago,
                // URLs de retorno obligatorias según la consigna [cite: 38]
                "back_urls" => [
                    "success" => route('pago.exitoso'),
                    "failure" => route('pago.fallido'),
                    "pending" => route('pago.pendiente'),
                ],
                "auto_return" => "approved",
                "external_reference" => (string) $pedido->id, // ID interno para vincular el pago
            ]);

            // Guardar el preference_id en la base de datos como pide el final [cite: 44, 56]
            $pedido->update(['preference_id' => $preferencia->id]);

            // Retornar la vista donde el usuario verá el botón de Mercado Pago
            return view('pago.checkout', [
                'preferencia' => $preferencia,
                'pedido' => $pedido
            ]);
        } catch (MPApiException $error) {
            return back()->with('error', 'Error al conectar con Mercado Pago: ' . $error->getMessage());
        }
    }
}
