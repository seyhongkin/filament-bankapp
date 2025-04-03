<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BalanceHistory>
 */
class BalanceHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::inRandomOrder()->first()->id;

        return [
            'user_id'    => $userId,
            'balance'    => fake()->randomFloat(2, 20, 1000),
            'created_at' => fake()->dateTimeBetween('-7 days', 'now'), // Random date from 7 days ago until now
            'updated_at' => now(),                                     // Or you can set updated_at to now() as well
        ];
    }
}
