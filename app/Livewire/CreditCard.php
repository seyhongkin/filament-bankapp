<?php
namespace App\Livewire;

use Livewire\Component;

class CreditCard extends Component
{
    public bool $isDefault;

    public function render()
    {
        return view('livewire.credit-card');
    }
}
