<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mobil>
 */
class MobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'plat_nomor'=> $faker->regexify('[A-Z]{1,3} [1-9]\d{0,3} [A-Z]{2}'),
            'merk' => $faker->randomElement(['avanza', 'innova', 'hiace', 'pajero sport', 'raize', 'rush', 'ertiga']),
            'tipe_mobil'=> $faker->randomElement(['matic', 'manual']),
            'status' => $faker->randomElement(['sedang disewa','ada']),
        ];
    }
}