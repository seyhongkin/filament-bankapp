<?php
namespace App\Livewire;

use Livewire\Component;

class CardListItem extends Component
{
    public $card;

    public function maskCardNumber($cardNumber)
    {
        return substr($cardNumber, 0, 4) . ' **** **** ' . substr($cardNumber, -4);
    }

    public function render()
    {
        return view('livewire.card-list-item');
    }
}
