<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil seeder utama secara berurutan
        $this->call([
            UserSeeder::class,
            SportCategorySeeder::class,
            FieldSeeder::class,
            BookingSeeder::class,
        ]);
    }
}