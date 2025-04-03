<x-filament-panels::page>
    <div class="grid md:grid-cols-3">
        @livewire('credit-card', ['isDefault' => true])

        @livewire('credit-card')

        @livewire('credit-card')
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
