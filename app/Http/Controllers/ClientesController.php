<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clients = Client::withCount('orders') // Count orders for each client
                         ->get();

        return view('clientes', compact('clients'));
    }
}
