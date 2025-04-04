<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MyExpenseChart extends ChartWidget
{
    protected static ?string $heading = 'My Expense';

    public function getData(): array
    {
        // Execute the query to get the sum of negative amounts, grouped by month/year
        $transactions = DB::table('transactions')
            ->select(DB::raw('ABS(SUM(amount)) as total_amount, DATE_FORMAT(created_at, "%Y-%m") as month'))
            ->where('amount', '<', 0)
            ->groupBy('created_at')
            ->take(4)
            ->get();

        // Prepare the data for the chart
        $data = [
            'datasets' => [
                [
                    'label'           => 'Expenses',
                    'data'            => $transactions->pluck('total_amount')->toArray(), // Get the sum of amounts for each month
                    'borderColor'     => [
                        'rgb(255, 99, 132)',
                        'rgb(235, 54, 166)',
                        'rgb(255, 205, 86)',
                        'rgb(86, 190, 255)',
                    ],
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(235, 54, 166, 0.4)',
                        'rgba(255, 205, 86, 0.4)',
                        'rgba(86, 190, 255, 0.4)',
                    ],
                ],
            ],
            'labels'   => $transactions->pluck('month')->toArray(),
        ];

        return $data;
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
