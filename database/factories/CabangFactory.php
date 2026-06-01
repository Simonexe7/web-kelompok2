<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cabang;
use Faker\Factory as Faker;

class CabangFactory extends Factory
{
    protected $model = Cabang::class;

    public function definition(): array
    {
        $faker = Faker::create('id_ID');

        return [
            'nama_cabang' => 'Cabang ' . $faker->city(),

            'alamat' =>
                'Jl. ' . $faker->streetName() .
                ' No. ' . $faker->buildingNumber() .
                ', ' . $faker->city(),

            'telepon' =>
                '08' . $faker->numerify('##########')
        ];
    }
}