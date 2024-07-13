<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    // Establece la clase de seeder que se ejecutará al iniciar la aplicación
    public function run(): void
    {
        // Crea un usuario demo
        User::factory()->create([
            'name' => 'Demo',
            'email' => 'demo@glop.es',
            'password' => Hash::make('demo'), // Establece la contraseña aquí
        ]);
        
        // Llama al seeder de la tabla de clientes
        $this->call(ClientsTableSeeder::class);
        
        // Llama al seeder de la tabla de órdenes
        $this->call(OrdersTableSeeder::class);
    }
}
