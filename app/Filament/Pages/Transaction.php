<?php
namespace App\Filament\Pages;

use App\Models\Card;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class Transaction extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static string $view = 'filament.pages.transaction';

    public Collection $cards;

    public function mount()
    {
        $this->cards = Card::orderByDesc('is_default')->take(2)->get();
    }
}
