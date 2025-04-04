<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ExpenseStatisticsChart extends ChartWidget
{
    protected static ?string $heading = 'Expense Statistics';

    protected function getData(): array
    {
        // Fetch the data from the database
        $transactions = DB::select('
            SELECT type, SUM(amount) AS total_amount
            FROM transactions
            WHERE amount < 0
            GROUP BY type
        ');

        // Initialize the data arrays
        $data   = [];
        $labels = [];

        // Loop through the result and populate the data and labels
        foreach ($transactions as $transaction) {
            $data[]   = abs($transaction->total_amount); // Add the summed amount for each type
            $labels[] = ucfirst($transaction->type);     // Add the type as a label (capitalized)
        }

        // Return the data in the structure needed by your chart
        return [
            'datasets' => [
                [
                    'data'            => $data, // This will be the amounts
                    'backgroundColor' => ['rgb(255, 99, 132)', 'rgb(235, 54, 166)', 'rgb(255, 205, 86)', 'rgb(86, 190, 255)'],
                ],
            ],
            'labels'   => $labels, // These will be the types as labels
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
