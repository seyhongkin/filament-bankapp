<?php
namespace App\Livewire;

use App\Models\Card;
use Livewire\Component;

class CardList extends Component
{
    public function render()
    {
        return view('livewire.card-list', [
            'cards' => Card::orderByDesc('is_default')->get(),
        ]);
    }
}
