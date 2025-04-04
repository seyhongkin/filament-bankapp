<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

use App\Models\User;
use App\Models\Card;

class CardService{
    //Assume that this function transfer money to someone else account
    public function transfer($amount){
        $user_id = User::first()?->id;
        $card = Card::where('user_id', $user_id)->where('is_default', true)->first();

        if($card){
            $card->update([
                'balance' => $card->balance - floatval($amount)
            ]);
        }

        if($amount > 200){
            $chat_id = cache()->get('chat_id');
            $text = '⚠️ALERT: A transfer of *$'.$amount.'* was just made from your account.';
            $response_text = str_replace(['.', '!', '-'], ['\\.', '\\!', '\\-'], $text);
            app('telegram_bot')->sendMessage($chat_id, $response_text);
        }

        \Log::info('transfer', ['amount' => $amount]);

        return $amount;
    }
}