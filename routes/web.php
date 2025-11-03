<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
// importar HomeController si lo uso también
// use App\Http\Controllers\HomeController;


// VISTAS PRINCIPALES
Route::get('/', [PaginaController::class, 'index'])->name('index');

Route::get('/catalogo', [PaginaController::class, 'catalogo'])->name('catalogo');

Route::get('/producto', [PaginaController::class, 'producto'])->name('producto');

Route::get('/nosotros', [PaginaController::class, 'nosotros'])->name('nosotros');

Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
