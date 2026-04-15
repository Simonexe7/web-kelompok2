<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cabang;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cabang::create([
            'nama_cabang' => 'Cianjur',
            'alamat' => 'Jl. Joglo',
            'telepon' => '081234567890'
        ]);

        Cabang::create([
            'nama_cabang' => 'Cabang Bandung',
            'alamat' => 'Jl. Kopo',
            'telepon' => '082233445566'
        ]);

        Cabang::create([
            'nama_cabang' => 'Cabang Jakarta',
            'alamat' => 'Jl. Sudirman No. 20',
            'telepon' => '083344556677'
        ]);

        Cabang::factory(7)->create();
    }
}