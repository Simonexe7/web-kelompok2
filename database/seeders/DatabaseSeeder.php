<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Jayusman',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'owner',
        ]);

        // MANAGER
        User::create([
            'name' => 'Rina Putri',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'manager',
        ]);

        // SUPERVISOR
        User::create([
            'name' => 'Andi Saputra',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'supervisor',
        ]);

        // KASIR
        User::create([
            'name' => 'Dewi Lestari',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'kasir',
        ]);

        // GUDANG
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'gudang@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'gudang',
        ]);

        $this->call([
            CabangSeeder::class,
            BarangSeeder::class,
        ]);

    }
}
