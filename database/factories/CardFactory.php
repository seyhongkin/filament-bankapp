<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::inRandomOrder()->first()->id;
        $bankNames = ['ABA Bank', 'Vatanak Bank', 'Wing Bank', 'Canadia Bank'];

        return [
            'card_number' => fake()->unique()->randomNumber(9, true) . fake()->randomNumber(7, true),
            'card_holder' => fake()->name(),
            'valid_thru'  => now()->addYears(3)->format('m/y'), // 3 years from now
            'bank_name'   => fake()->randomElement($bankNames),
            'is_default'  => fake()->boolean(),
            'balance'     => fake()->randomFloat(2, 0, 1000),
            'user_id'     => $userId, // Creates a user if none exists
        ];
    }
}
