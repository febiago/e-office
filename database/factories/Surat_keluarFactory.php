<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat_keluar>
 */
class Surat_keluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_surat' => $this->faker->unique()->randomNumber(8),
            'perihal' => $this->faker->sentence,
            'tgl_surat' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'tgl_dikirim' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'ditujukan' => $this->faker->name,
            'kategori' => $this->faker->randomElement(['urgent', 'biasa']),
            'keterangan' => $this->faker->sentence,
            'image' => 'image.jpg',
            ];
    }
}
