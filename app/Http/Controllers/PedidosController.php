<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    // Método para listar todos los pedidos
    public function index()
    {
        $orders = Order::all(); // Obtener todos los pedidos de la base de datos

        return view('pedidos', compact('orders'));
    }
}

