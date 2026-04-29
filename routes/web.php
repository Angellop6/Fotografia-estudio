<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

Route::get('/', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/nuevo', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::patch('/pedidos/{pedido}/alternar', [PedidoController::class, 'alternarEstado'])->name('pedidos.alternar');
Route::patch('/pedidos/{pedido}/entregar', [PedidoController::class, 'entregar'])->name('pedidos.entregar');
Route::patch('/pedidos/{pedido}/revertir', [PedidoController::class, 'revertir'])->name('pedidos.revertir');
Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');