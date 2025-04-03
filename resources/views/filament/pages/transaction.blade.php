<x-filament-panels::page>
    <div class="grid md:grid-cols-3">
        @livewire('credit-card', ['isDefault' => true])

        @livewire('credit-card')

        @livewire(\App\Filament\Widgets\MyExpenseChart::class)
    </div>

    {{-- @livewire(\App\Filament\Widgets\RecentTransactionTable::class) --}}
</x-filament-panels::page>
