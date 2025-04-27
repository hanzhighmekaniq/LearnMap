<?php

namespace Database\Factories;

use App\Models\DataKategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataKategoriFactory extends Factory
{
    protected $model = DataKategori::class;

    public function definition()
    {
        return [
            'nama_kategori' => $this->faker->word(), // Nama kategori random
        ];
    }
}
