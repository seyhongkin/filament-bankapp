<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class WeeklyActivityChart extends ChartWidget
{
    protected static ?string $heading = 'Weekly Activity';

    protected function getData(): array
    {
        $transactions = DB::select('
            SELECT
                COUNT(*) AS transaction_count,
                SUM(amount) AS total_amount,
                CASE
                    WHEN amount < 0 THEN "Negative"
                    ELSE "Positive"
                END AS transaction_type,
                DATE_FORMAT(created_at, "%a") AS day
            FROM bankapp.transactions
            WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
            GROUP BY transaction_type, DATE_FORMAT(created_at, "%a")
            ORDER BY DATE_FORMAT(created_at, "%a");
        ');

        $positive = [];
        $negative = [];
        $labels   = []; // This will be populated with days

        foreach ($transactions as $transaction) {
            // Add the day to labels if not already added
            if (! in_array($transaction->day, $labels)) {
                $labels[] = $transaction->day;
            }

            // Distribute the data into positive and negative categories
            if ($transaction->transaction_type === 'Positive') {
                $positive[] = $transaction->total_amount;
            } else {
                $negative[] = abs($transaction->total_amount);
            }
        }

        return [
            'datasets' => [
                [
                    'label'           => 'Deposit',
                    'data'            => $positive,
                    'borderColor'     => '#b247ff',
                    'backgroundColor' => 'rgba(178, 71, 255, 0.5)',
                ],
                [
                    'label'           => 'Withdraw',
                    'data'            => $negative,
                    'borderColor'     => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                ],
            ],
            'labels'   => $labels, // Labels are now days (1, 2, 3, etc.)
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
