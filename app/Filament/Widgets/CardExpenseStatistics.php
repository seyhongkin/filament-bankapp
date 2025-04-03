<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class CardExpenseStatistics extends ChartWidget
{
    protected static ?string $heading = 'Card Expense Statistics';

    protected function getData(): array
    {
        // Query the database
        $transactions = DB::table('bankapp.transactions as t')
            ->join('cards as c', 'c.card_number', '=', 't.card_number')
            ->where('t.amount', '<', 0)
            ->select(DB::raw('sum(t.amount) as total_amount, c.bank_name'))
            ->groupBy('c.bank_name')
            ->get();

                                                                   // Format data for chart
        $labels = $transactions->pluck('bank_name')->toArray();    // Get bank names
        $data   = $transactions->pluck('total_amount')->toArray(); // Get total amounts for each bank

        // Return the chart data structure
        return [
            'datasets' => [
                [
                    'data'            => $data, // The sum of amounts for each bank
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(235, 54, 166)',
                        'rgb(255, 205, 86)',
                        'rgb(86, 190, 255)',
                    ],
                ],
            ],
            'labels'   => $labels, // Bank names as the labels
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
