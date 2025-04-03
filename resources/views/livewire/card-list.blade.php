<div class="space-y-4">
    <h1>Card List</h1>

    @for ($i = 0; $i < 3; $i++)
        @livewire('card-list-item')
    @endfor
</div>
