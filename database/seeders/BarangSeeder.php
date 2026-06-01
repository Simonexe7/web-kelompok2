<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'nama' => 'Indomie',
            'harga' => 3000,
            'stok' => 100
        ]);

        Barang::create([
            'nama' => 'Aqua',
            'harga' => 4000,
            'stok' => 50
        ]);

    }
}
