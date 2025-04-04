<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\TelegramBot;
use App\Services\CardService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('telegram_bot', function(){
            return new TelegramBot();
        });

        $this->app->singleton('card_service', function(){
            return new CardService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
