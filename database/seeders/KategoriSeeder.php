<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Elektronik', 'deskripsi' => 'Peralatan dan perangkat elektronik'],
            ['nama_kategori' => 'Alat Tulis', 'deskripsi' => 'Perlengkapan kantor dan sekolah'],
            ['nama_kategori' => 'Furniture', 'deskripsi' => 'Perabotan rumah dan kantor'],
        ];

        foreach ($kategori as $item) {
            Kategori::create($item);
        }
    }
}
