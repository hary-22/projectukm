<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_barang' => ucfirst(fake()->word()),
            'stok' => fake()->numberBetween(1, 100),
            'harga' => fake()->randomFloat(2, 5000, 1000000),
            'kategori_id' => Kategori::factory(),
            'gambar' => null,
        ];
    }
}
