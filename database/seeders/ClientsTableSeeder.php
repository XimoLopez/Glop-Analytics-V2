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

        // Generate 4917 clients
        for ($i = 0; $i < 4917; $i++) {
            DB::table('clients')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'registration' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'), // Generate a random date
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
