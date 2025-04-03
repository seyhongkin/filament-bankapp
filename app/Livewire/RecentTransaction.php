<?php
namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;

class RecentTransaction extends Component
{
    public Collection $recentTransactions;

    public function render()
    {
        return view('livewire.recent-transaction');
    }
}
