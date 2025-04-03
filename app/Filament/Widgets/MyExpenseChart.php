<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class MyExpenseChart extends ChartWidget
{
    protected static ?string $heading = 'My Expense';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label'           => 'Expenses',
                    'data'            => [180, 200, 150, 300],
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
            'labels'   => ['2025-01', '2025-02', '2025-03', '2025-04'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
