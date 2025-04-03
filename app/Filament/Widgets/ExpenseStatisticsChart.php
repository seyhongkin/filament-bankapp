<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ExpenseStatisticsChart extends ChartWidget
{
    protected static ?string $heading = 'Expense Statistics';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'data'            => [180, 200, 150, 300],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(235, 54, 166)',
                        'rgb(255, 205, 86)',
                        'rgb(86, 190, 255)',
                    ],
                ],
            ],
            'labels'   => ['Investment', 'Other', 'Bill Expense', 'Entertainment'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
