<?php

namespace Database\Seeders;

use App\Models\FoodType;
use Illuminate\Database\Seeder;

class FoodTypeSeeder extends Seeder
{
    /**
     * データベースシードを実行します。
     */
    public function run(): void
    {
        $seedConfig = config('models.seeding.food-types');
        $foodTypes = $seedConfig['default_list'];

        foreach($foodTypes as $foodType) {
            FoodType::updateOrCreate(
                [
                    'name' => $foodType['name'],
                    'description' => $foodType['description'],
                ],
            );
        }
    }
}