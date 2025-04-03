<?php
namespace App\Filament\Pages;

use App\Models\Card;
use App\Models\Transaction;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';

    public Collection $cards;
    public Collection $recentTransactions;

    public function mount()
    {
        $this->cards              = Card::orderByDesc('is_default')->take(2)->get();
        $this->recentTransactions = Transaction::orderByDesc('created_at')->take(3)->get();
    }
}
