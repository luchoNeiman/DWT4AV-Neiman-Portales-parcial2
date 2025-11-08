<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario está logueado Y si su rol es 'admin'
        if (Auth::check() && Auth::user()->rol === 'admin') {
            // Si es admin, déjalo pasar a la ruta que quería ver
            return $next($request);
        }

        // Si no es admin (es 'usuario' o visitante), lo redirigimos al inicio con un mensaje de error.
        return redirect()->route('index')
            ->with('feedback.error', 'No tenés permisos para acceder a esa sección.');
    }
}
