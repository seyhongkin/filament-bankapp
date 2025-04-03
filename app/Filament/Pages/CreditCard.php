<?php
namespace App\Filament\Pages;

use App\Models\Card;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class CreditCard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static string $view = 'filament.pages.credit-card';

    public Collection $cards;

    public function mount()
    {
        $this->cards = Card::orderByDesc('is_default')->get();
    }
}
