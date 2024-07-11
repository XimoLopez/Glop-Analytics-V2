<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ClientesController;



Route::get('/', function () {
    return view('home');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/servicios', function () {
    return view('servicios');
});

Route::get('/sobrega', function () {
    return view('sobrega');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/pedidos', [PedidosController::class, 'index'])->name('clientes');
    Route::get('/admin/clientes', [ClientesController::class, 'index'])->name('pedidos');
});
