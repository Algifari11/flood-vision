<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. SEED DATA AKUN ADMIN
        User::create([
            'name' => 'admin',
            'email' => 'admin@floodvision.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), // Password akun admin
            'role' => 'admin',                       // Sesuaikan jika kolomnya bernama 'usertype'
        ]);
    }
}