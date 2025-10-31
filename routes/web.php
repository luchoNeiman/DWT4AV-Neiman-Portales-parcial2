<?php

use Illuminate\Support\Facades\Route;


// VISTAS PRINCIPALES
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/catalogo', function () {
    return view('catalogo') ;
}) ->name('catalogo');

Route::get('/producto', function () {
    return view('detalleProducto');
})->name('producto');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');
