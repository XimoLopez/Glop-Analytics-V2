<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $currentYear = Carbon::now()->year;
        $previousYear = $currentYear - 1;

        $totalOrdersCurrentYear = Order::whereYear('date', $currentYear)->count();
        $totalOrdersPreviousYear = Order::whereYear('date', $previousYear)->count();
        $totalClients = Client::count();
        $totalEarningsCurrentYear = Order::whereYear('date', $currentYear)->sum('value');
        $totalEarningsPreviousYear = Order::whereYear('date', $previousYear)->sum('value');

        $monthlyOrdersCurrentYear = Order::whereYear('date', $currentYear)
            ->selectRaw('MONTH(date) as month, COUNT(*) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->all();

        $monthlyOrdersPreviousYear = Order::whereYear('date', $previousYear)
            ->selectRaw('MONTH(date) as month, COUNT(*) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->all();

        $monthlyEarningsCurrentYear = Order::whereYear('date', $currentYear)
            ->selectRaw('MONTH(date) as month, SUM(value) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->all();

        $monthlyEarningsPreviousYear = Order::whereYear('date', $previousYear)
            ->selectRaw('MONTH(date) as month, SUM(value) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->all();

        return view('dashboard', compact('totalOrdersCurrentYear', 'totalOrdersPreviousYear', 'totalClients', 'totalEarningsCurrentYear', 'totalEarningsPreviousYear', 'monthlyOrdersCurrentYear', 'monthlyOrdersPreviousYear', 'monthlyEarningsCurrentYear', 'monthlyEarningsPreviousYear', 'currentYear', 'previousYear'));
    }
}
