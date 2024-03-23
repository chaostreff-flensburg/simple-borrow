<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'included' => $this->faker->text,
            'manual_link' => $this->faker->url,
            'require_training' => $this->faker->boolean,
            'approved' => $this->faker->boolean,
            'price' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
