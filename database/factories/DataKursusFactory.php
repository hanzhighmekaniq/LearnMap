<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataKursus>
 */
class DataKursusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kursus' => fake()->sentence(3), // contoh nama kursus
            'deskripsi' => fake()->paragraph,
            'paket' => fake()->randomElement(['Paket A', 'Paket B', 'Paket C']), // contoh opsi paket
            'metode' => fake()->randomElement(['Online', 'Offline', 'Hybrid']), // metode pembelajaran
            'fasilitas' => fake()->sentence(6), // contoh fasilitas
            'lokasi' => fake()->city,
            'latitude' => fake()->latitude,
            'longitude' => fake()->longitude,
            'popular' => 'Tidak',
        ];
    }
}
