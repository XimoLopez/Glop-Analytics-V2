<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $clients = Client::where('user_id', $user->id)->get();
        $orders = Order::where('user_id', $user->id)->where('status', 'entregado')->get();

        $monthlyData = [];

        foreach ($orders as $order) {

            $orderDate = Carbon::parse($order->date);
            $orderYear = $orderDate->year;
            $orderMonth = $orderDate->month;

            if (!isset($monthlyData[$orderYear])) {
                $monthlyData[$orderYear] = [];
            }

            if (!isset($monthlyData[$orderYear][$orderMonth])) {
                $monthlyData[$orderYear][$orderMonth] = [
                    'totalOrders' => 0,
                    'totalEarnings' => 0,
                ];
            }

            $monthlyData[$orderYear][$orderMonth]['totalOrders']++;
            $monthlyData[$orderYear][$orderMonth]['totalEarnings'] += $order->value;

        }


        $currentYear = Carbon::now()->year;
        $previousYear = $currentYear - 1;

        $totalOrders = $orders->count();
        $totalEarnings = $orders->sum('value');
        $totalOrdersCurrentYear = 0;
        $totalEarningsCurrentYear = 0;
        $totalOrdersPreviousYear = 0;
        $totalEarningsPreviousYear = 0;


        if (isset($monthlyData[$currentYear])) {
            foreach ($monthlyData[$currentYear] as $monthData) {
                $totalOrdersCurrentYear += $monthData['totalOrders'];
                $totalEarningsCurrentYear += $monthData['totalEarnings'];
            }
        }

        if (isset($monthlyData[$previousYear])) {
            foreach ($monthlyData[$previousYear] as $monthData) {
                $totalOrdersPreviousYear += $monthData['totalOrders'];
                $totalEarningsPreviousYear += $monthData['totalEarnings'];
            }
        }

        $totalOrdersMilestoneCompletion = $totalOrdersPreviousYear ? ($totalOrdersCurrentYear * 100 / $totalOrdersPreviousYear) : 0;
        $totalEarningsMilestoneCompletion = $totalEarningsPreviousYear ? ($totalEarningsCurrentYear * 100 / $totalEarningsPreviousYear) : 0;


        $totalClients = $clients->count();
        $totalClientsCurrentYear = $clients->filter(function ($client) use ($currentYear) {
            return Carbon::parse($client->registration)->year == $currentYear;
        })->count();
        $totalClientsPreviousYear = $clients->filter(function ($client) use ($previousYear) {
            return Carbon::parse($client->registration)->year == $previousYear;
        })->count();

        $totalClientsMilestoneCompletion = $totalClientsPreviousYear ? ($totalClientsCurrentYear * 100 / $totalClientsPreviousYear) : 0;


        $clientsRecurrenciesRaw = $orders->groupBy('client_id')->map->count();

        $clientsRecurrencies = $clientsRecurrenciesRaw->reduce(function ($counts, $count) {
            if ($count == 1) {
                $counts['once']++;
            } elseif ($count == 2) {
                $counts['twice']++;
            } elseif ($count >= 3) {
                $counts['thriceOrMore']++;
            }
            return $counts;
        }, ['once' => 0, 'twice' => 0, 'thriceOrMore' => 0]);

        $clientsRecurrenciesNone = $totalClients - array_sum($clientsRecurrencies);

        $clientsRecurrenciesReal = array_sum($clientsRecurrencies) ? (($clientsRecurrencies['twice'] + $clientsRecurrencies['thriceOrMore']) * 100 / array_sum($clientsRecurrencies) ) : 0;


        return view('dashboard', compact(
            'totalOrders',
            'totalEarnings',
            'totalOrdersCurrentYear',
            'totalEarningsCurrentYear',
            'totalOrdersPreviousYear',
            'totalEarningsPreviousYear',
            'totalOrdersMilestoneCompletion',
            'totalEarningsMilestoneCompletion',
            'totalClients',
            'totalClientsCurrentYear',
            'totalClientsPreviousYear',
            'totalClientsMilestoneCompletion',
            'currentYear',
            'previousYear',
            'clientsRecurrenciesNone',
            'clientsRecurrencies',
            'clientsRecurrenciesReal',
            'monthlyData'));
    }
}
