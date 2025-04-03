<?php
namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        // Get a random card_number from existing cards
        $cardNumber = Card::inRandomOrder()->first()->card_number;

        $transactionId = fake()->unique()->numerify('###############');
        $transactionId = str_pad($transactionId, 16, '0');

        return [
            'transaction_id' => (int) $transactionId, // Unique 16-digit random transaction ID
            'description'    => fake()->sentence(),
            'type'           => fake()->randomElement(['shopping', 'service', 'transfer']), // Random type
            'card_number'    => $cardNumber,                                                // Assign a random card_number from existing cards
            'amount'         => fake()->randomFloat(2, -1000, 1000),
            'created_at'     => fake()->dateTimeBetween('-7 days', 'now'), // Random date from 7 days ago until now
            'updated_at'     => now(),
        ];
    }
}
