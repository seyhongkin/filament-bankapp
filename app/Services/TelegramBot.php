<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

use App\Models\User;
use App\Models\Card;

class TelegramBot{
    protected $token;
    protected $api_endpoint;
    protected $headers;

    public function __construct(){
        $this->token = config('app.telegram_token');
        $this->api_endpoint = config('app.endpoint');
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
    
    public function handleCommand($chat_id, $text){
        $command = '/check_balance';
        $response_text = "I’m sorry, but I don’t quite understand what you mean\\.";

        if($text === $command){
            $total_balance = $this->getCurrentUserBalance();
            $escaped_balance = str_replace(['.', '!', '-'], ['\\.', '\\!', '\\-'], $total_balance);
            $response_text = 'Your current account balance is *' . $escaped_balance . '$*\\. Let us know if you need any further assistance\\!';
        }
        
        $this->sendMessage($chat_id, $response_text);
    }

    // Assume that current user is the first user
    public function getCurrentUserBalance(){
        $user_id = User::first()?->id;

        $total_balance = Card::where('user_id', $user_id)->sum('balance');
        return $total_balance;
    }

    public function sendMessage($chat_id, $text){
        //https://api.telegram.org/bot{token}/sendMessage
        $url = "{$this->api_endpoint}/bot{$this->token}/sendMessage";
        cache()->put('chat_id', $chat_id, $seconds = 60 * 60);

        $result = [
            'success' => false,
            'body' => [],
        ];
        $params = [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => 'MarkdownV2'
        ];

        try {
            $response = Http::withoutVerifying()->withHeaders($this->headers)->post($url, $params);
            $result = [
                'success' => $response->ok(),
                'body' => $response->json()
            ];
        } catch (\Throwable $th) {
            $result = [
                'error' => $th->getMessage(),
                'text' => $text
            ];
        }

        \Log::info('TelegramBor->sendMessage->result', ['result' => $result]);
        return $result;
    }
}