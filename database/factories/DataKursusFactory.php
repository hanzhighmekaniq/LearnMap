<?php

namespace Database\Factories;

use App\Models\DataKursus;
use App\Models\DataKategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataKursusFactory extends Factory
{
    protected $model = DataKursus::class;

    public function definition()
    {
        return [
            'kategori_id' => DataKategori::factory(), // Relasi dengan kategori
            'nama_kursus' => $this->faker->sentence(3), // Nama kursus random
            'deskripsi' => $this->faker->paragraph(), // Deskripsi kursus random
            'paket' => $this->faker->word(), // Paket kursus random
            'metode' => $this->faker->randomElement(['Online', 'Offline', 'Hybrid']), // Metode random
            'lokasi' => $this->faker->address(), // Lokasi random
            'latitude' => $this->faker->latitude(-90, 90), // Latitude random
            'longitude' => $this->faker->longitude(-180, 180), // Longitude random
        ];
    }
}
