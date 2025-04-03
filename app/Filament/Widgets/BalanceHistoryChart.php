<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BalanceHistoryChart extends ChartWidget
{
    protected static ?string $heading = 'Balance History';

    protected function getData(): array
    {
        return [
            'labels'   => ['2024-01', '2024-02', '2024-03', '2024-04'],
            'datasets' => [
                [
                    'label'           => 'Deposit',
                    'data'            => [180, 200, 150, 300], // Example Data
                    'backgroundColor' => 'rgb(75, 192, 192)',
                    'fill'            => false,
                    'tension'         => 0.1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
