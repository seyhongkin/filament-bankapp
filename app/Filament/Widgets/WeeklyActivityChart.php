<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class WeeklyActivityChart extends ChartWidget
{
    protected static ?string $heading = 'Weekly Activity';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label'           => 'Deposit',
                    'data'            => [180, 200, 150, 300, 250, 400, 350], // Example Data
                    'borderColor'     => '#b247ff',
                    'backgroundColor' => 'rgba(178, 71, 255, 0.5)',
                ],
                [
                    'label'           => 'Withdraw',
                    'data'            => [180, 200, 150, 300, 250, 400, 350], // Example Data
                    'borderColor'     => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                ],
            ],
            'labels'   => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
