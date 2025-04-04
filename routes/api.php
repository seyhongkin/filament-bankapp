<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TelegramController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

# https://api.telegram.org/bot7819975411:AAGJs_gjnOUbQ4058cYDS1DVCa-ZOlDSTXM/setWebhook?url=https://f60a-167-179-37-254.ngrok-free.app/api/telegram/webhook/inbound
Route::prefix('telegram/webhook')->group(function(){
    Route::post('inbound', [TelegramController::class, 'inbound']);
});

