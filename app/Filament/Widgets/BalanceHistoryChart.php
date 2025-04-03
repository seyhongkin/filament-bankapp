<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BalanceHistoryChart extends ChartWidget
{
    protected static ?string $heading = 'Balance History';

    /**
     * Get the data for the chart.
     *
     * @return array
     */
    protected function getData(): array
    {
        // Execute the raw SQL query to group by `created_at` and sum the `balance`
        $balanceHistoryData = DB::table('balance_histories')
            ->selectRaw('DATE(created_at) as date, SUM(balance) as total_balance')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy(DB::raw('DATE(created_at)'))
            ->get();

        // Prepare the labels (dates) and data for the chart
        $labels   = $balanceHistoryData->pluck('date')->toArray();
        $balances = $balanceHistoryData->pluck('total_balance')->toArray();

        // Return the chart data in the expected format
        return [
            'labels'   => $labels,
            'datasets' => [
                [
                    'label'           => 'Balance History',
                    'data'            => $balances,
                    'backgroundColor' => 'rgb(75, 192, 192)',
                    'fill'            => false,
                    'tension'         => 0.1,
                ],
            ],
        ];
    }

    /**
     * Get the chart type.
     *
     * @return string
     */
    protected function getType(): string
    {
        return 'line'; // You can change this to 'bar' or another chart type if needed
    }
}
