<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function inbound(Request $request){
        $chat_id = $request['message']['chat']['id'];
        $text = $request['message']['text'];

        \Log::info($chat_id);
        \Log::info($text);

        app('telegram_bot')->handleCommand($chat_id, $text);
    }
}
