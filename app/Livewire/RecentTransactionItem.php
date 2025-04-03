<?php
namespace App\Livewire;

use Livewire\Component;

class RecentTransactionItem extends Component
{
    public string $title           = '';
    public string $date            = '';
    public $amount                 = 0;

    public function render()
    {
        return view('livewire.recent-transaction-item');
    }
}
