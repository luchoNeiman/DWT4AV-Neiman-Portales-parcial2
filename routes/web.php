<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductoController;
use App\Http\Controllers\Admin\AdminCategoriaController;
use App\Http\Controllers\Admin\AdminUsuarioController;
use App\Http\Controllers\Admin\AdminPerfilController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\AuthController;


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


// RUTAS DE ADMINISTRACIÓN (Protegidas)
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin']) // Protegidas por Login y Rol de Admin
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // CRUD de Productos (usa un controlador Resource)
        Route::resource('productos', AdminProductoController::class);

        // CRUD de Categorías (usa un controlador Resource)
        Route::resource('categorias', AdminCategoriaController::class)->except(['show']); // No necesitamos 'show'

        // CRUD de Usuarios (usa un controlador Resource)
        Route::resource('usuarios', AdminUsuarioController::class)->except(['create', 'store']); // El registro es público

        // Perfil de Admin
        Route::get('/perfil', [AdminPerfilController::class, 'index'])->name('perfil.index');
        Route::post('/perfil/actualizar', [AdminPerfilController::class, 'update'])->name('perfil.update');
    });
