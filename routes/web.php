<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductoController;
use App\Http\Controllers\Admin\AdminCategoriaController;
use App\Http\Controllers\Admin\AdminUsuarioController;
use App\Http\Controllers\Admin\AdminPerfilController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PerfilController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\AuthController;

Route::get('/health', function () {
    return response()->json([
        'ok' => true,
        'app_env' => app()->environment(),
    ]);
});



// VISTAS PRINCIPALES
Route::get('/', [PaginaController::class, 'index'])->name('index');

Route::get('/catalogo', [PaginaController::class, 'catalogo'])->name('catalogo');

Route::get('/producto/{id}', [PaginaController::class, 'producto'])
    ->name('producto');

Route::get('/nosotros', [PaginaController::class, 'nosotros'])->name('nosotros');

Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');


// RUTAS DE AUTENTICACIÓN (Cualquiera puede verlas)
Route::get('/iniciar-sesion', [AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::post('/iniciar-sesion', [AuthController::class, 'doLogin'])->name('auth.doLogin');
Route::get('/registro', [AuthController::class, 'showRegistro'])->name('auth.showRegistro');
Route::post('/registro', [AuthController::class, 'doRegistro'])->name('auth.doRegistro');
Route::post('/cerrar-sesion', [AuthController::class, 'logout'])->name('auth.logout');


// RUTAS DEL CARRITO y PERFIL (Protegidas - Solo usuarios autenticados)

Route::middleware(['auth'])->group(function () {
    // Carrito
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::put('/carrito/actualizar/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/finalizar', [CarritoController::class, 'finalizarCompra'])->name('carrito.finalizar');
    Route::get('/carrito/count', [CarritoController::class, 'getCount'])->name('carrito.count');
    // Perfil de usuario
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::post('/perfil/actualizar', [PerfilController::class, 'update'])->name('perfil.update');
    Route::post('/perfil/password', [PerfilController::class, 'updatePassword'])->name('perfil.password');
});

// Rutas de Mercado Pago (públicas, para que Mercado Pago pueda acceder)
Route::get('/pago/procesar/{id}', [PagoController::class, 'crearPreferencia'])->name('pago.procesar');
Route::get('/pago/exitoso', [PagoController::class, 'exitoso'])->name('pago.exitoso');
Route::get('/pago/fallido', [PagoController::class, 'fallido'])->name('pago.fallido');
Route::get('/pago/pendiente', [PagoController::class, 'pendiente'])->name('pago.pendiente');


// RUTAS DE ADMINISTRACIÓN (Protegidas)
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin']) // Protegidas por Login y Rol de Admin
    ->group(function () {
        
    // Dashboard ( /admin/dashboard )
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD de Productos ( /admin/productos )
    Route::resource('productos', AdminProductoController::class);

    // CRUD de Categorías ( /admin/categorias )
    // 'except' significa que no crea la ruta 'show' (no la necesitamos)
    Route::resource('categorias', AdminCategoriaController::class)->except(['show']); 

    // CRUD de Usuarios ( /admin/usuarios )
    // 'except' quita 'create' y 'store' (porque el registro es público)
    Route::resource('usuarios', AdminUsuarioController::class)->except(['create', 'store']); 

    // Perfil de Admin ( /admin/perfil )
    Route::get('/perfil', [AdminPerfilController::class, 'index'])->name('perfil.index');
    Route::post('/perfil/actualizar', [AdminPerfilController::class, 'update'])->name('perfil.update');
    
});

// Ruta oficial para Webhooks de Mercado Pago
Route::post('/webhook/mercadopago', [PagoController::class, 'recibirWebhook'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class])
    ->name('webhook.mercadopago');

