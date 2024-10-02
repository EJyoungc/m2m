<?php

namespace App\Services;

use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramService
{
    public function sendMessage($chatId, $text)
    {
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => $text
        ]);
    }

    public function sendMenu($chatId, array $menuOptions)
    {
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Please choose an option:',
            'reply_markup' => json_encode([
                'keyboard' => $menuOptions,
                'resize_keyboard' => true,
                'one_time_keyboard' => true,
            ]),
        ]);
    }

    public function askForConfirmation($chatId, $number)
    {
        $this->sendMessage($chatId, "You entered the number {$number}. Is this correct? (yes/no)");
    }
}
