<div class="border rounded-xl space-y-4 p-4">
    <h1>Recent Transaction</h1>
    @livewire('recent-transaction-item', [
        'title' => 'Deposit from my card',
        'date' => '28 September 2024',
        'amount' => -820
    ])
    @livewire('recent-transaction-item', [
        'title' => 'Withdraw to my card',
        'date' => '28 September 2024',
        'amount' => 1220
    ])
    @livewire('recent-transaction-item', [
        'title' => 'Withdraw to my card',
        'date' => '14 September 2024',
        'amount' => 82
    ])
</div>
