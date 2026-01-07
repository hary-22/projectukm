<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada kategori
        $kategori = Kategori::firstOrCreate(['nama_kategori' => 'Elektronik']);
        $user = User::where('role', 'admin')->first();

        // Tambahkan contoh barang
        Barang::create([
            'nama_barang' => 'Laptop Asus ROG',
            'stok' => 10,
            'harga' => 25000000,
            'kategori_id' => $kategori->id,
            'user_id' => $user->id,
            'gambar' => null,
        ]);

        Barang::create([
            'nama_barang' => 'Mouse Logitech',
            'stok' => 50,
            'harga' => 250000,
            'kategori_id' => $kategori->id,
            'user_id' => $user->id,
            'gambar' => null,
        ]);
    }
}
