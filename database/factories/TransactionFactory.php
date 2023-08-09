<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaction;
use App\Models\Item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'return_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'transaction_type' => $this->faker->randomElement([Transaction::RETURN, Transaction::BORROWED]),
            'item_id' => Item::factory(),
            'note' => $this->faker->text,
            'email' => $this->faker->email,
            'name' => $this->faker->name,
        ];
    }
}
