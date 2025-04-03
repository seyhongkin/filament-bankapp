<x-filament-panels::page>
    <div class="grid md:grid-cols-3">
        @livewire('credit-card', ['isDefault' => true])

        @livewire('credit-card')

        @livewire('recent-transaction')
    </div>

    <div class="grid md:grid-cols-3 grid-cols-1 gap-2">
        <div class="md:col-span-2 col-span-1">
            @livewire(\App\Filament\Widgets\WeeklyActivityChart::class)
        </div>
        
        <div class="col-span-1">
            @livewire(\App\Filament\Widgets\ExpenseStatisticsChart::class)
        </div>
    </div>

    <div class="grid md:grid-cols-3 grid-cols-1 gap-2">        
        <div class="col-span-1">
            @livewire('quick-transfer')
        </div>
        <div class="md:col-span-2">
            @livewire(\App\Filament\Widgets\BalanceHistoryChart::class)
        </div>
    </div>
</x-filament-panels::page>
