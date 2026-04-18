<?php
// api/index.php
declare(strict_types=1);

// 1. Forzamos a Laravel a usar la carpeta /tmp (que es la única con permisos de escritura en Vercel)
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_EVENTS_CACHE=/tmp/events.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('VIEW_COMPILED_PATH=/tmp');

$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public/index.php';
$_SERVER['DOCUMENT_ROOT'] = __DIR__ . '/../public';

// 2. Envolvemos el arranque en un Try-Catch para atrapar al culpable
try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    // Si algo explota, lo mostramos en texto plano
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo "🚨 ERROR FATAL DETECTADO ANTES DE ARRANCAR LARAVEL 🚨\n\n";
    echo "Mensaje: " . $e->getMessage() . "\n\n";
    echo "Archivo: " . $e->getFile() . " (Línea " . $e->getLine() . ")\n\n";
    echo "Stack Trace:\n" . $e->getTraceAsString();
}
