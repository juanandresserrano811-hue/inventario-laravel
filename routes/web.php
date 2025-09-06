<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Productos
Route::resource('productos', ProductoController::class);

// Ventas
Route::resource('ventas', VentaController::class)->only(['index','create','store']);
