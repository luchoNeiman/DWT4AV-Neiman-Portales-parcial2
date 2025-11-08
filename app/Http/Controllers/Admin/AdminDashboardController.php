<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Muestra el panel principal de administración.
     */
    public function index()
    {
        // Por ahora, solo muestra la vista.
        // Más adelante, aquí cargarías los datos para las métricas.
        return view('admin.dashboard');
    }
}
