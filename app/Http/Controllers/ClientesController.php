<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $clients = Client::where('user_id', $user->id)->withCount('orders')->get();

        return view('clientes', compact('clients'));
    }
}
