<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $user = User::where('email', 'demo@glop.es')->first();

        for ($i = 0; $i < 4917; $i++) {
            DB::table('clients')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'registration' => $faker->dateTimeBetween('2023-01-01', '2024-07-14'),
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
