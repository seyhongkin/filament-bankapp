<?php
namespace Database\Seeders;

use App\Models\BalanceHistory;
use Illuminate\Database\Seeder;

class BalanceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BalanceHistory::factory()->count(50)->create();
    }
}
