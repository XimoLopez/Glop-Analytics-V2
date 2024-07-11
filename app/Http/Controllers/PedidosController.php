<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {
        $orders = Order::all(); // Fetch all orders from the database

        return view('pedidos', compact('orders'));
    }
}

