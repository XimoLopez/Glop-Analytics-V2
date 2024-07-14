<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Client;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $user = User::where('email', 'demo@glop.es')->first();

        $clientIds = Client::pluck('id')->toArray();

        $orders = [];

        $createOrder = function ($clientId) use ($faker, $user) {
            return [
                'client_id' => $clientId,
                'date' => $faker->dateTimeBetween('2023-01-01', '2024-07-14'),
                'items' => $faker->numberBetween(1, 10),
                'value' => $faker->randomFloat(2, 10, 300),
                'status' => $faker->randomElement(
                    array_merge(
                        array_fill(0, 85, 'entregado'),
                        array_fill(0, 5, 'procesando'),
                        array_fill(0, 5, 'cancelado'),
                        array_fill(0, 5, 'reembolsado')
                    )
                ),
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        foreach ($clientIds as $clientId) {
            $orders[] = $createOrder($clientId);
        }

        $totalOrdersToGenerate = 7822 - count($clientIds);
        for ($i = 0; $i < $totalOrdersToGenerate; $i++) {
            $orders[] = $createOrder($faker->randomElement($clientIds));
        }

        usort($orders, function($a, $b) {
            return $a['date']->getTimestamp() - $b['date']->getTimestamp();
        });

        DB::table('orders')->insert($orders);
    }
}
