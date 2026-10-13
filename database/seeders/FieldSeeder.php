<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\SportCategory;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    public function run(): void
    {
        $futsalCategory = SportCategory::where('name', 'Futsal')->first();
        $badmintonCategory = SportCategory::where('name', 'Badminton')->first();
        $soccerCategory = SportCategory::where('name', 'Mini Soccer')->first();

        $fields = [
            [
                'sport_category_id' => $futsalCategory?->id,
                'name' => 'Lapangan Futsal 1 (Vinyl Pro)',
                'description' => 'Lantai vinyl tebal standar nasional, bebas licin, dilengkapi penerangan LED 400W.',
                'price_per_hour' => 100000,
                'image' => 'fields/futsal-1.jpg',
                'is_active' => true,
            ],
            [
                'sport_category_id' => $badmintonCategory?->id,
                'name' => 'Court Badminton A (Karpet Mat)',
                'description' => 'Karpet badminton standar PBSI, termasuk net resmi & tribun penonton.',
                'price_per_hour' => 60000,
                'image' => 'fields/badminton-a.jpg',
                'is_active' => true,
            ],
            [
                'sport_category_id' => $soccerCategory?->id,
                'name' => 'Mini Soccer Arena Turf',
                'description' => 'Rumput sintetis outdoor 7v7, sistem drainase ramah hujan & lampu sorot malam.',
                'price_per_hour' => 250000,
                'image' => 'fields/minisoccer-turf.jpg',
                'is_active' => true,
            ],
        ];

        foreach ($fields as $field) {
            if ($field['sport_category_id']) {
                Field::firstOrCreate(
                    ['name' => $field['name']],
                    $field
                );
            }
        }
    }
}