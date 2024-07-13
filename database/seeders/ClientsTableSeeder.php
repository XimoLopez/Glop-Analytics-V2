<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Generar 4917 clientes
        for ($i = 0; $i < 4917; $i++) {
            DB::table('clients')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'registration' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'), // Generar una fecha aleatoria
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
