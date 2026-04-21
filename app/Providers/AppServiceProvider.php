<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Usar las vistas de paginación de Bootstrap 5 para que combinen con el estilo del sitio.
        Paginator::useBootstrapFive();

        // Forzar HTTPS en producción para evitar Mixed Content con ngrok
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
