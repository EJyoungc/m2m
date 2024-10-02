<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram\Bot\Api;
use Telegram\Bot\Keyboard\Keyboard;

class HandleTelegramUpdates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:polling';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handles Telegram updates using long polling';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $telegram = new Api(config('telegram.bot_token'));

        $updates = $telegram->getUpdates();

        $latestUpdates = [];

        foreach ($updates as $update) {
            // Check if the update contains a message
            if ($update->has('message')) {
                $message = $update->getMessage();
                $chatId = $message->getChat()->getId();
                $text = $message->getText();
                $updateId = $update->getUpdateId();

                // Store the latest message from each chatId (overwriting previous ones)
                $latestUpdates[$chatId] = [
                    'chat_id' => $chatId,
                    'text' => $text,
                    'update_id' => $updateId
                ];
            }

            // Check if the update contains a callback query (from inline button press)
            if ($update->has('callback_query')) {
                $callbackQuery = $update->getCallbackQuery();
                $callbackData = $callbackQuery->getData();
                $chatId = $callbackQuery->getMessage()->getChat()->getId();

                // Handle the button press based on the callback_data
                if ($callbackData === 'option_1') {
                    $telegram->sendMessage([
                        'chat_id' => $chatId,
                        'text' => 'You selected Option 1!'
                    ]);
                } elseif ($callbackData === 'option_2') {
                    $telegram->sendMessage([
                        'chat_id' => $chatId,
                        'text' => 'You selected Option 2!'
                    ]);
                } elseif ($callbackData === 'option_3') {
                    $telegram->sendMessage([
                        'chat_id' => $chatId,
                        'text' => 'You selected Option 3!'
                    ]);
                }
            }
        }

        // Respond only to the latest message from each user
        foreach ($latestUpdates as $latestUpdate) {
            $chatId = $latestUpdate['chat_id'];
            $text = $latestUpdate['text'];

            // Example: Respond to the '/start' command with inline buttons
            if ($text === '/start') {
                // Create an inline keyboard with buttons
                $keyboard = Keyboard::make()
                    ->inline()
                    ->row([
                        Keyboard::inlineButton(['text' => 'Option 1', 'callback_data' => 'option_1']),
                        Keyboard::inlineButton(['text' => 'Option 2', 'callback_data' => 'option_2'])
                    ])
                    ->row([
                        Keyboard::inlineButton(['text' => 'Option 3', 'callback_data' => 'option_3'])
                    ]);

                // Send the message with buttons
                $telegram->sendMessage([
                    'chat_id' => $chatId,
                    'text' => 'Welcome to the bot! Please choose an option:',
                    'reply_markup' => $keyboard
                ]);
            } else {
                // Handle any other message here (optional)
            }
        }
    }
}
