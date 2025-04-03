<x-filament-panels::page>
    <div class="grid md:grid-cols-3">
        @foreach ($cards as $card)
            @livewire(
                'credit-card',
                [
                    'isDefault' => $card->is_default ?? false,
                    'balance' => $card->balance,
                    'cardHolder' => $card->card_holder,
                    'validThru' => $card->valid_thru,
                    'cardNumber' => $card->card_number,
                ],
                $card->cardNumber
            )
        @endforeach

        @livewire(\App\Filament\Widgets\MyExpenseChart::class)
    </div>

    @livewire(\App\Filament\Widgets\RecentTransactionTable::class)
</x-filament-panels::page>
