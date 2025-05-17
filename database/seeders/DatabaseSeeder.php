<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Admin
    User::factory()->create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'role' => 'admin',
        'password' => Hash::make('admin'),
    ]);

    // Guru
    User::factory()->create([
        'name' => 'guru',
        'email' => 'guru@gmail.com',
        'role' => 'guru',
        'password' => Hash::make('guru'),
    ]);

    // Murid

    // Optional test user
    User::factory()->create([
        'name' => 'murid',
        'email' => 'murid@gmail.com',
        'role' => 'murid',
        'password' => Hash::make('murid'),
    ]);
}
}
