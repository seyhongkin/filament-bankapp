<div class="space-y-4">
    <h1>Card List</h1>

    @foreach ($cards as $card)
        @livewire('card-list-item', [
            'card' => $card
        ], $card->card_number)
    @endforeach
</div>
