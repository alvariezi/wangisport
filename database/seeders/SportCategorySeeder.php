<?php

namespace Database\Seeders;

use App\Models\SportCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SportCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Futsal',
                'description' => 'Lapangan futsal indoor vinyl & rumput sintetis.',
                'icon' => 'futsal-icon.png',
            ],
            [
                'name' => 'Badminton',
                'description' => 'Lapangan bulutangkis karpet standar PBSI.',
                'icon' => 'badminton-icon.png',
            ],
            [
                'name' => 'Mini Soccer',
                'description' => 'Lapangan mini soccer outdoor rumput sintetis standar FIFA.',
                'icon' => 'minisoccer-icon.png',
            ],
            [
                'name' => 'Basket',
                'description' => 'Lapangan basket indoor lantai interlock & kayu parquet.',
                'icon' => 'basket-icon.png',
            ],
        ];

        foreach ($categories as $cat) {
            SportCategory::firstOrCreate(
                ['name' => $cat['name']],
                [
                    'slug' => Str::slug($cat['name']),
                    'description' => $cat['description'],
                    'icon' => $cat['icon'],
                ]
            );
        }
    }
}