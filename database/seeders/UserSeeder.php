<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin default
        User::create([
            'name' => 'Admin Sistem',
            'email' => 'admin@inventory.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Beberapa user biasa
        User::factory(3)->create();
    }
}
