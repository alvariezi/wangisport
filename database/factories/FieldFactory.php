<?php

namespace Database\Factories;

use App\Models\Field;
use App\Models\SportCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FieldFactory extends Factory
{
    protected $model = Field::class;

    public function definition(): array
    {
        return [
            'sport_category_id' => SportCategory::factory(),
            'name' => $this->faker->words(2, true),
            'status' => 'active',
        ];
    }
}