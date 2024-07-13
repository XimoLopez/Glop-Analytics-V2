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
        // Obtener la ID del usuario con el correo 'demo@glop.es'
        $user = User::where('email', 'demo@glop.es')->first();

        // Obtener todas las IDs de clientes
        $clientIds = Client::pluck('id')->toArray();

        // Generar 7822 pedidos para 2024
        for ($i = 0; $i < 7822; $i++) {
            $order = [
                'client_id' => $faker->randomElement($clientIds), 
                'date' => $faker->dateTimeBetween('2023-01-01', '2024-07-14'), 
                'items' => $faker->numberBetween(1, 10), 
                'value' => $faker->randomFloat(2, 10, 300),
                'status' => $faker->randomElement(['procesando', 'entregado', 'cancelado', 'reembolsado']),
                'user_id' => $user->id, 
                'created_at' => now(), 
                'updated_at' => now(),
            ];

            DB::table('orders')->insert($order); // Insertar el pedido en la tabla 'orders'
        }
    }
}
