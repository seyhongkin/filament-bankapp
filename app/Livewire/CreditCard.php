<?php
namespace App\Livewire;

use Livewire\Component;

class CreditCard extends Component
{
    public bool $isDefault;
    public $balance = 0;
    public $cardHolder;
    public $validThru;
    public $cardNumber;

    public function maskCardNumber($cardNumber)
    {
        return substr($cardNumber, 0, 4) . ' **** **** ' . substr($cardNumber, -4);
    }

    public function render()
    {
        return view('livewire.credit-card');
    }
}
