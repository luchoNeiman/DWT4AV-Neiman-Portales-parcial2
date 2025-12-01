<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto; 
use App\Models\Usuario; 
use App\Models\Pedido;
use Carbon\Carbon; //lo agregue para manejar fechas

class AdminDashboardController extends Controller
{
    /**
     * Muestra el panel principal de administración.
     */
    public function index()
    {
        // Productos Activos (Stock mayor a 0)
        $productosActivos = Producto::where('stock', '>', 0)->count();

        // Nuevos Usuarios (Registrados este mes)
        $nuevosUsuarios = Usuario::where('created_at', '>=', Carbon::now()->startOfMonth())->count();

        // Cálculo de porcentaje vs mes anterior (Simulado para usuarios)
        $usuariosMesAnterior = Usuario::whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->count();

        if ($usuariosMesAnterior > 0) {
            $porcentajeUsuarios = (($nuevosUsuarios - $usuariosMesAnterior) / $usuariosMesAnterior) * 100;
        } else {
            $porcentajeUsuarios = 100; // Si no hubo nadie el mes pasado, es un 100% de aumento
        }

        // Ventas Totales
        // $ventasTotales = Pedido::where('estado', 'completado')->sum('total');
        $ventasTotales = Pedido::where('estado', '!=', 'cancelado')->sum('total');

        return view('admin.dashboard', [
            'productosActivos' => $productosActivos,
            'nuevosUsuarios' => $nuevosUsuarios,
            'porcentajeUsuarios' => round($porcentajeUsuarios, 1),
            'ventasTotales' => $ventasTotales
        ]);
    }
}
