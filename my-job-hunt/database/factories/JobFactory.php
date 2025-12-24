<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Job; // 👈 모델 위치(namespace) 꼭 확인!

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    return [
        // 변경 전: 'title' => fake()->jobTitle(),
        
        // 🛠️ 변경 후: 직업 이름 뒤에 랜덤 숫자를 붙여서 절대 안 겹치게 만듭니다.
        'title' => fake()->jobTitle() . ' ' . fake()->unique()->numberBetween(1, 10000),
        
        'company' => fake()->company(),
        'description' => fake()->paragraphs(3, true),
        'location' => fake()->city(),
        'type' => fake()->randomElement(['Full-time', 'Part-time', 'Freelance']),
        'salary' => fake()->numberBetween(50000, 150000),
        'application_deadline' => fake()->dateTimeBetween('now', '+3 months'),
    ];
}
}