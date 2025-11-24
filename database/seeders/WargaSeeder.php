<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
    'name' => 'Caca Warga',
    'email' => 'caca@example.com',
    'password' => bcrypt('warga123'),
    'address' => 'Jl. Kenanga No. 10',
    'phone' => '081234567890',
]);

        User::create([
            'name' => 'Ivan Warga',
            'email' => 'ivan@example.com',
            'password' => Hash::make('654321'),
            'address' => 'Jl. Melati No. 8',
            'phone' => '081245678901',
        ]);

        User::create([
    'name' => 'Admin RT',
    'email' => 'admin@rt.com',
    'password' => bcrypt('admin123'),
    'role' => 'admin',
]);

    }

}
