<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        // Recupera los clientes con el conteo de sus pedidos y ordena por el conteo en orden descendente
        $clients = Client::withCount('orders') // Contar pedidos para cada cliente
                         ->orderBy('orders_count', 'desc') // Ordenar por el conteo de pedidos en orden descendente
                         ->get();

        // Retorna la vista con los datos de los clientes
        return view('clientes', compact('clients'));
    }
}
