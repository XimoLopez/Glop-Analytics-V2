<?php

use Illuminate\Support\Facades\Route;


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
    Route::get('/admin', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/admin/pedidos', function () {
        return view('pedidos');
    })->name('pedidos');
    Route::get('/admin/clientes', function () {
        return view('clientes');
    })->name('clientes');
});
