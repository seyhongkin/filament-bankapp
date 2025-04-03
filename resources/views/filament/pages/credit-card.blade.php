<x-filament-panels::page>
    <div class="flex overflow-x-auto">
        @foreach ($cards as $card)
            <div class="min-w-[400px]">
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
            </div>
        @endforeach
    </div>

    <div class="grid md:grid-cols-3 gap-4">
        <div class="col-span-1">
            @livewire(\App\Filament\Widgets\CardExpenseStatistics::class)
        </div>
        <div class="md:col-span-2">
            @livewire('card-list')
        </div>
    </div>
</x-filament-panels::page>
