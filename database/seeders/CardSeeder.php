<?php
namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = DB::table('users')->inRandomOrder()->value('id'); // Get a random user id

        $bankNames = ['ABA Bank', 'Vatanak Bank', 'Wing Bank', 'Canadia Bank']; // List of banks

        Card::create([
            'card_number' => fake()->unique()->randomNumber(9, true) . fake()->randomNumber(7, true), // 16-digit number
            'card_holder' => fake()->name(),
            'valid_thru'  => fake()->date('m/y'),
            'bank_name'   => $bankNames[array_rand($bankNames)], // Randomly pick a bank name
            'is_default'  => fake()->boolean(),                  // Randomly assign true/false
            'balance'     => fake()->randomFloat(2, 0, 1000),    // Random balance between $0 - $1000
            'user_id'     => $userId ?? 1,                       // Use random user ID or default to 1
        ]);
    }
}
