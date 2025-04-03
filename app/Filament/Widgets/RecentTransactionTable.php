<?php
namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentTransactionTable extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(Transaction::query()->where('created_at', '>=', now()->subDays(7))) // Filter transactions from the last 7 days
            ->columns([
                TextColumn::make('description')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('transaction_id')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('type')
                    ->label('Type')                                    // Optional: Change the label if needed
                    ->formatStateUsing(fn($state) => ucwords($state)), // Make type uppercase

                TextColumn::make('card_number')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Date') // Rename to 'Date'
                    ->sortable()
                    ->date(), // Format the date

                TextColumn::make('amount')
                    ->sortable()
                    ->searchable()
                    ->color(fn($state) => $state < 0 ? 'danger' : 'success') // Apply color based on the amount
                    ->formatStateUsing(fn($state) => ($state < 0 ? '-$' : '$') . number_format(abs($state), 2)),
            ]);
    }
}
