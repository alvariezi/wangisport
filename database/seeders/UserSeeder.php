<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Super Admin System
        User::firstOrCreate(
            ['email' => 'admin@wangisport.com'],
            [
                'name' => 'Admin Wangisport',
                'password' => Hash::make('password'),
                'phone' => '081234567890',
                'role' => 'admin',
            ]
        );

        // 2. Pemilik / Pengelola Venue
        User::firstOrCreate(
            ['email' => 'owner@wangisport.com'],
            [
                'name' => 'Manager Saiki Arena',
                'password' => Hash::make('password'),
                'phone' => '082198765432',
                'role' => 'owner',
            ]
        );

        // 3. User / Member Penyewa
        User::firstOrCreate(
            ['email' => 'player@wangisport.com'],
            [
                'name' => 'Budi Pratama',
                'password' => Hash::make('password'),
                'phone' => '085712345678',
                'role' => 'user',
            ]
        );
    }
}