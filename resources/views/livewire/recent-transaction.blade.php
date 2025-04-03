<div class="border rounded-xl space-y-4 p-4">
    <h1>Recent Transaction</h1>

    @foreach ($recentTransactions as $recentTransaction)
        @livewire('recent-transaction-item', [
            'title' => $recentTransaction->description,
            'date' => $recentTransaction->created_at,
            'amount' => $recentTransaction->amount
        ], $recentTransaction->transaction_id)
    @endforeach
</div>
